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
function selectProductos($status=false){
    include 'conexion-bd.php';

    if ($status) {
        $seleccionarPorductos = mysqli_query($conexion," SELECT * FROM productos WHERE prod_status = $status ");
    }else {
        $seleccionarPorductos = mysqli_query($conexion," SELECT * FROM productos WHERE prod_status = 1");
    }
    ?>
            <option value="0" selected>Elegir producto...</option>
    <?php
        while ($productos = mysqli_fetch_array($seleccionarPorductos)) {
    ?>
            <option value="<?php echo $productos['prod_id'] ?>"><?php echo $productos['prod_id'] .' - '. $productos['prod_nombre']?></option>
    <?php 
        }
}

// consulta SQL del producto más vendido
function prodMasVendido(){
    include 'conexion-bd.php';
    
    // $consulaProdMasVendido = ($conexion,"SELECT * FROM ");
}

// consulta SQL del producto con más stock
function prodMasStock(){
    include 'conexion-bd.php';
    
        
}
?>