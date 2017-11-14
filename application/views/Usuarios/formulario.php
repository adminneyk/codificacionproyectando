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
                        <img class="profile-img" src="<?=base_url()?>application/asset/img/logo2.png"
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