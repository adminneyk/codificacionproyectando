    <h1>
        Edicion de Perfil
    </h1>
    <?php
    
   
    $clave = array('name'=>'clave',
                     'id'=>'clave',
                     'type'=>'password');
        echo form_open('empleados/nuevo_empleado');
        echo form_label('Clave Actual','clave');
        echo form_input($clave);echo "<bR>";
        echo form_label('Nueva Clave','clave');
        echo form_input($clave);echo "<bR>";
        echo form_label('Repetir Clave','clave');
        echo form_input($clave);echo "<bR>";
        echo form_submit('','Registrar');
        ?>
        
        <?php
        echo form_close();
    ?>