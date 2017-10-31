<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bienvenido a Proyectando</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?=base_url()?>application/asset/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <style>
            .form-signin
            {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading, .form-signin .checkbox
            {
                margin-bottom: 10px;
            }
            .form-signin .checkbox
            {
                font-weight: normal;
            }
            .form-signin .form-control
            {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .form-signin .form-control:focus
            {
                z-index: 2;
            }
            .form-signin input[type="text"]
            {
                margin-bottom: -1px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }
            .form-signin input[type="password"]
            {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
            .account-wall
            {
                margin-top: 20px;
                padding: 40px 0px 20px 0px;
                background-color: #f7f7f7;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            }
            .login-title
            {
                color: #555;
                font-size: 18px;
                font-weight: 400;
                display: block;
            }
            .profile-img
            {
                width: 96px;
                height: 96px;
                margin: 0 auto 10px;
                display: block;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
            }
            .need-help
            {
                margin-top: 10px;
            }
            .new-account
            {
                display: block;
                margin-top: 10px;
            }
        </style>
        <script language="javascript" src="<?=base_url()?>application/asset/jquery/jquery-3.2.1.js"></script>
        

        <div class="container">

            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">

                    <h1 class="text-center login-title">Ingresar a Proyectando</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="data:image/png;base64,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"
                             alt="">
        <?php
                        $arrayform = array("class"=>"form-signin" ,"id" => "form");  
                        $arrayusuario=array("class"=>"form-control",
                                            "id"=>"usuario",
                                            "name"=>"usuario",
                                            "placeholder"=>"Usuario",
                                            "required" => "required",
                                            "pattern"=>"[a-zA-Z]{5,30}",
                                            "title"=>"Campo de Solo Letras");
                        $arrayclave=array("class"=>"form-control",
                                            "id"=>"clave",
                                            "name"=>"clave",
                                            "type"=>"password",
                                            "placeholder"=>"Clave",
                                            "required" => "required",
                                            "pattern"=>"[A-Za-z0-9]{5,30}",
                                            "title"=>"Campo AlfaNumerico");
                        $arrayboton=array("class"=>"btn btn-lg btn-primary btn-block");
                        
                        
                        echo form_open(base_url().'Login/validar',$arrayform);
                        echo form_error('usuario', '<div class="alert alert-danger">', '</div>');
                        echo form_input($arrayusuario);
                        echo form_error('clave', '<div class="alert alert-danger">', '</div>');
                        echo form_input($arrayclave);
                        echo form_submit('botonSubmit', 'Ingresar' ,$arrayboton);
                        echo form_close();
                        ?>
                        <?php
$this->load->view('Genericas/mensajes');
?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>