<?php 

// dar formato a una fecha, sí se le pasa el segundo parametro regresa la fecha con la hora
function formatoAFecha($fecha,$hora=false){
        
    date_default_timezone_set('America/Bogota');

    if ($hora) {
        $mes = array("","Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre");

        $fechaCF=date('d',strtotime($fecha)) . " de " . $mes[date('n',strtotime($fecha))] . " de " . date('Y',strtotime($fecha)) . " a las " . date('g:i a',strtotime($fecha));

        return $fechaCF;
        
    }else {
        $mes = array("","Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre");

        $fechaCF=date('d',strtotime($fecha))." de ". $mes[date('n',strtotime($fecha))] . " de " . date('Y',strtotime($fecha));

        return $fechaCF;
    }
}

// dar formato a un precio COP
function formatoAPrecio($precio){
        
    $precioCF='$ '.number_format($precio,0,",",".");

    return $precioCF;
}

// crear select
function selectDatos($status=false){
    include 'conexion-bd.php';

    if ($status) {
        $seleccionarDatos = mysqli_query($conexion," SELECT * FROM datbla WHERE tabla_status = $status ");
    }else {
        $seleccionarDatos = mysqli_query($conexion," SELECT * FROM datbla WHERE tabla_status = 1");
    }
    ?>
            <option value="0" selected>Datos</option>
    <?php
        while ($datos = mysqli_fetch_array($seleccionarDatos)) {
    ?>
            <option value="<?php echo $datos['datos_id'] ?>"><?php echo $datos['datos_nombre']?></option>
    <?php 
        }
}

?>