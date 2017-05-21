<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->userdata('id_usuario')== "") {
     redirect(base_url().'login');
}

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$urlactual="http://" . $host . $url;
$url= str_replace(base_url(),"", $urlactual);
$controlador[0] = explode("/", $url);
$controlador = $controlador[0][0];

if(in_array($controlador, $this->session->userdata('permisos')) == FALSE){
    redirect(base_url().'home');
}


?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Proyectando</title>
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?=base_url()?>application/asset/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=base_url()?>application/asset/css/estilos.css">
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

       <script src="http://www.jqueryscript.net/demo/Export-Html-Table-To-Excel-Spreadsheet-using-jQuery-table2excel/src/jquery.table2excel.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default navbar-inverse" role="navigation" >
                        <div class="navbar-header" id="fondo">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                            </button> <a class="navbar-brand" href="<?= base_url()?>home">Proyectando</a>
                        </div>