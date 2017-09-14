<?php

/**
 * Transform DOCX to PDF, ODT, SXW, RTF, DOC, TXT, HTML or WIKI
 *
 * @category   Phpdocx
 * @package    trasform
 * @copyright  Copyright (c) Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2014.04.09
 * @link       http://www.phpdocx.com
 */

require_once dirname(__FILE__) . '/CreateDocx.inc';
@include_once dirname(__FILE__) . '/CreateChartImage.inc';
@include_once dirname(__FILE__) . '/CreateChartImageEzComponents.inc';
@include_once dirname(__FILE__) . '/CreateChartImageJpgraph.inc';

class TransformDocAdv
{

    /**
     *
     * @access private
     * @var ZipArchive
     */
    private $_allowedExtensions;

    /**
     *
     * @access private
     * @var array
     */
    private $_phpdocxconfig;

    /**
     * Construct
     *
     * @access public
     */
    public function __construct()
    {
        $this->_phpdocxconfig = PhpdocxUtilities::parseConfig();
        $this->_allowedExtensions = array('docx', 'pdf', 'odt', 'sxw', 'rtf', 'doc', 'txt', 'html', 'htm', 'wiki');
    }

    /**
     * Prepare docx before pdf transformation
     *
     * @access public
     * @param $docSource
     * @param $temdir
     * @return string
     */
    public function prepareDocx($docSource, $tempDir = null, $options)
    {
        if ($tempDir === null) {
            $tempDir = $this->getTempDirPath();
            $tempName = $tempDir . '/tempDocX_' . uniqid() . '.docx';
        } else {
            $tempName = $tempDir . '/tempDocX_' . uniqid() . '.docx';
        }
        copy($docSource, $tempName);


        if (file_exists(dirname(__FILE__) . '/RepairPDF.inc')) {
            $originalDocx = new zipArchive();
            $originalDocx->open($tempName);
            $docXML = $originalDocx->getFromName('word/document.xml');
            $numberingXML = $originalDocx->getFromName('word/numbering.xml');
            $repairedXML = RepairPDF::repairPDFConversion($docXML, $numberingXML, $options);
            $originalDocx->addFromString('word/document.xml', $repairedXML);
            //close the zip
            $originalDocx->close();
        }

        return $tempName;
    }

    /**
     * Replace charts as images
     *
     * @access public
     * @param $docSource
     */
    public function replaceChartsWithImages($docSource){
        $sourceDocx = new ZipArchive();
        $sourceDocx->open($docSource);

        // if jpgraph exists use it, instead use ezComponents
        if (file_exists(dirname(__FILE__) . '/../lib/jpgraph/')) {
            $image = new CreateChartImageJpgraph();
        } else {
            $image = new CreateChartImageEzComponents();
        }

        // get the images
        $image->getChartsDocx($docSource);
        $image->parseCharts();
        $listChartImages = $image->getListImages();
        if (!is_array($listChartImages)) {
            $listChartImages = array();
        }

        // parse de docx and add the images
        $contentTypesXML = $sourceDocx->getFromName('[Content_Types].xml');

        // get the document.xml.rels file from the DOCX
        $documentRelsXML = $sourceDocx->getFromName('word/_rels/document.xml.rels');
        $documentRelsDOM = new SimpleXMLElement($documentRelsXML);
        $documentRelsDOM->registerXPathNamespace('ns', 'http://schemas.openxmlformats.org/package/2006/relationships');

        // get the document.xml file from the DOCX
        $documentXML = $sourceDocx->getFromName('word/document.xml');
        $documentDOM = new SimpleXMLElement($documentXML);

        // get the chart elements of the DOM
        $contentTypesDOM = new SimpleXMLElement($contentTypesXML);
        $contentTypesDOM->registerXPathNamespace('ns', 'http://schemas.openxmlformats.org/package/2006/content-types');
        $elementsCharts = $contentTypesDOM->xpath('ns:Override[@ContentType="application/vnd.openxmlformats-officedocument.drawingml.chart+xml"]');

        // as some nodes are removed, iterate the charts in reverse order
        //$elementsCharts = array_reverse($elementsCharts);

        // index of the image to be added to the ZIP
        $indexImage = 0;
        foreach ($elementsCharts as $value) {
            // get the attributes of the element
            $attributes = $value->attributes();

            // get the width and height and add them to the charts array
            // get the rId of the chart from the documentRels
            $relationshipChart = $documentRelsDOM->xpath('ns:Relationship[@Target="'.substr($attributes['PartName'], 6).'"]');
            $documentDOM->registerXPathNamespace('a', 'http://schemas.openxmlformats.org/drawingml/2006/main');
            $documentDOM->registerXPathNamespace('c', 'http://schemas.openxmlformats.org/drawingml/2006/chart');

            // get the a:graphicData element of the chart
            $elementAGraphicData = $documentDOM->xpath('//a:graphicData[c:chart[@r:id="'. $relationshipChart[0]->attributes()->Id . '"]]');
            $elementAGraphicData[0]['uri'] = 'http://schemas.openxmlformats.org/drawingml/2006/picture';

            //get and remove the c:chart child
            $elementAGraphicData[0]->registerXPathNamespace('c', 'http://schemas.openxmlformats.org/drawingml/2006/chart');
            $elementCChart = $elementAGraphicData[0]->xpath('//c:chart');
            //unset($elementCChart[0][0]);

            // remove the chart content keeping w:drawing tag
            $domElementAGraphicData = dom_import_simplexml($elementAGraphicData[0]);
            $picture = $this->getTemplateImage(uniqid(), $relationshipChart[0]->attributes()->Id);
            $pictureFragment = $domElementAGraphicData->ownerDocument->createDocumentFragment();
            $pictureFragment->appendXML($picture);
            $domElementAGraphicData->appendChild($pictureFragment);
            $sourceDocx->addFile($listChartImages[$indexImage], 'word/media/' . $listChartImages[$indexImage]);
             
            //Modify the Type attribute of document.xml.rels to http://schemas.openxmlformats.org/officeDocument/2006/relationships/image
            //and the Target to media/'.$listChartImages[$indexImage]
            $relsImage = $documentRelsDOM->xpath('//ns:Relationship[@Id="'. $relationshipChart[0]->attributes()->Id.'"]');
            $relsImage[0]['Type'] = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/image';
            $relsImage[0]['Target'] = 'media/' . $listChartImages[$indexImage];
            
            $indexImage++; 
        }

        // save the modified document.xml.rels file
        $docXML = $documentDOM->asXML();
        $docXML = str_replace('<pic:pic xmlns:r="http://schemas.openxmlformats.org/package/2006/relationships" xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture" xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main">', '<pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">', $docXML);
        $docXML = str_replace('<pic:pic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">', '<pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">', $docXML);
        $docXML = str_replace('<pic:pic xmlns:r="http://schemas.openxmlformats.org/package/2006/relationships" xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture"', '<pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">', $docXML);
        $sourceDocx->addFromString('word/document.xml', $docXML);
        
        // save the modified document.xml.rels file
        $relsDoc = $documentRelsDOM->asXML();
        $sourceDocx->addFromString('word/_rels/document.xml.rels', $relsDoc);
               
        // make sure that there is the associated content type "png"
        $position = strpos('Extension="png"', $contentTypesXML);
        if($position === false){
            $contentTypesXML = str_replace('</Types>',  '<Default Extension="png" ContentType="image/png"/></Types>', $contentTypesXML);
            $sourceDocx->addFromString('[Content_Types].xml', $contentTypesXML);
        }
        // close the zip
        $sourceDocx->close();

        // remove the generated images
        foreach ($listChartImages as $listChartImage) {
            unlink($listChartImage);
        }
    }

    /**
     * Transform DOCX to PDF, ODT, SXW, RTF, DOC, TXT, HTML or WIKI
     * Transforms all documents supported by OpenOffice
     *
     * @access public
     * @param $docSource
     * @param $docDestination
     * @param string $tempDir
     * @param array $options :
     *      · method : 'direct' (default), 'script' ; 'direct' method uses
     *                  passthru and 'script' uses a external script.
     *                  If you're using Apache and 'direct' doesn't work use 'script'
     *      · 'odfconverter' : true (default) or false. Use odf-converter.
     *      · 'debug' : false (default) or true. It shows debug information about the plugin conversion
     * @param string $version 32, 64 or null (default). If null autodetect
     * @return void
     */
    public function transformDocument($docSource, $docDestination, $tempDir = null, $options = array(), $version = null)
    {
        // get the file info
        $sourceFileInfo = pathinfo($docSource);
        $sourceExtension = $sourceFileInfo['extension'];
        
        if (!isset($options['method'])) {
            $options['method'] = 'direct';
        }
        if (!isset($options['odfconverter'])) {
            $options['odfconverter'] = true;
        }
        if (!isset($options['debug'])) {
            $options['debug'] = false;
        }

        $destination = explode('.', $docDestination);
        $extension = strtolower(array_pop($destination));
        if (!in_array($extension, $this->_allowedExtensions)) {
            PhpdocxLogger::logger('The chosen extension is not supported', 'fatal');
        }

        if ($sourceExtension == 'docx') {
            // set path to OdfConverter: 32-bit or 64-bit
            $odfconverterPath = '';
            // set outputstring for debugging
            $outputDebug = '';
            if (PHP_OS == 'Linux') {
                if (!$options['debug']) {
                    $outputDebug = ' > /dev/null 2>&1';
                }
                if ($version == '32') {
                    $odfconverterPath = '/../lib/OdfConverter/32/OdfConverter';
                } elseif ($version == '64') {
                    $odfconverterPath = '/../lib/OdfConverter/64/OdfConverter';
                } else {
                    // detect if 32bit or 64bit
                    if (PHP_INT_SIZE * 8 == 64) {
                        $odfconverterPath = '/../lib/OdfConverter/64/OdfConverter';
                    } else {
                        $odfconverterPath = '/../lib/OdfConverter/32/OdfConverter';
                    }
                }
            } elseif (substr(PHP_OS, 0, 3) == 'Win' || substr(PHP_OS, 0, 3) == 'WIN') {
                if (!$options['debug']) {
                    $outputDebug = ' > nul 2>&1';
                }
                $odfconverterPath = '/../lib/OdfConverter/Windows/OdfConverter.exe';
            }

            $newDocx = $this->prepareDocx($docSource, $tempDir, $options);

            if (file_exists(dirname(__FILE__) . '/CreateChartImage.inc')) {
                $this->replaceChartsWithImages($newDocx);
            }

            if ($tempDir === null) {
                $tempDir = $this->getTempDirPath();
                $tempDoc = $tempDir . '/tempOdt_' . uniqid() . '.odt';
            } else {
                $tempDoc = $tempDir . '/tempOdt_' . uniqid() . '.odt';
            }

            if ($options['method'] == 'script') {
                passthru('php ' . dirname(__FILE__) . '/../lib/convert.php -s ' . $newDocx . ' -t ' . $tempDoc . ' -d ' . $docDestination . ' -o ' . $options['odfconverter'] . ' -p ' . $odfconverterPath . $outputDebug);
            } else {
                if ($extension != 'rtf' && $options['odfconverter']) {
                    passthru(dirname(__FILE__) . $odfconverterPath . ' /I ' . $newDocx . ' /O ' . $tempDoc . $outputDebug);
                } else {
                    copy($docSource, $tempDoc);
                }
                // How to start OpenOffice in headless mode: lib/openoffice/openoffice.org3/program/soffice -headless -accept="socket,host=127.0.0.1,port=8100;urp;" -nofirststartwizard';
                passthru('java -jar ' . dirname(__FILE__) . '/../lib/openoffice/jodconverter-2.2.2/lib/jodconverter-cli-2.2.2.jar ' . $tempDoc . ' ' . $docDestination . $outputDebug);
            }

            CleanTemp::clean($tempDoc);
            CleanTemp::clean($newDocx);
        } else {
            if ($options['method'] == 'script') {
                passthru('php ' . dirname(__FILE__) . '/../lib/convert.php -s ' . $docSource . ' -d ' . $docDestination . $outputDebug);
            } else {
                // How to start OpenOffice in headless mode: lib/openoffice/openoffice.org3/program/soffice -headless -accept="socket,host=127.0.0.1,port=8100;urp;" -nofirststartwizard';
                passthru('java -jar ' . dirname(__FILE__) . '/../lib/openoffice/jodconverter-2.2.2/lib/jodconverter-cli-2.2.2.jar ' . $docSource . ' ' . $docDestination . $outputDebug);
            }
        }
    }

    /**
     * To add support of sys_get_temp_dir for PHP versions under 5.2.1
     *
     * @access private
     * @return string
     */
    private function getTempDirPath()
    {
        if ($this->_phpdocxconfig['settings']['temp_path']) {
            return $this->_phpdocxconfig['settings']['temp_path'];
        }
        if (!function_exists('sys_get_temp_dir')) {

            function sys_get_temp_dir()
            {
                if ($temp = getenv('TMP')) {
                    return $temp;
                }
                if ($temp = getenv('TEMP')) {
                    return $temp;
                }
                if ($temp = getenv('TMPDIR')) {
                    return $temp;
                }
                $temp = tempnam(__FILE__, '');
                if (file_exists($temp)) {
                    unlink($temp);
                    return dirname($temp);
                }
                return null;
            }

        } else {
            return sys_get_temp_dir();
        }
    }

}
