<?php


// error_reporting(0); 

include 'modelo.php';


$tipo = $_POST['tipo'];

// -----------------------------DATOS----------------------------- //

    if ($tipo == 'nuevoProducto') {
        
        $nombreNuevoProd = $_POST['nombreNuevoProd'];
        $referenciaNuevoProd = $_POST['referenciaNuevoProd'];
        $precioNuevoProd = $_POST['precioNuevoProd'];
        $pesoNuevoProd = $_POST['pesoNuevoProd'];
        $categoríaNuevoProd = $_POST['categoríaNuevoProd'];
        $stockNuevoProd = $_POST['stockNuevoProd'];
        
        if ($nombreNuevoProd == "" || $referenciaNuevoProd == "" || $precioNuevoProd == "" || $pesoNuevoProd == "" || $categoríaNuevoProd == "" || $stockNuevoProd == "")  {
            $html = 'info';
            echo $html;
        }else {
            $nuevoProducto=nuevoProducto($nombreNuevoProd,$referenciaNuevoProd,$precioNuevoProd,$pesoNuevoProd,$categoríaNuevoProd,$stockNuevoProd,$idUserSession);

            if ($nuevoProducto === true) {
                $html = 'success';
                echo $html;
            }else {
                $html = 'error';
                echo $html;
            }
        }
    }

    if ($tipo == 'editarDato') {
        
        $datos = $_POST['datos'];
        
        if ($datos == "")  {
            $html = 'info';
            echo $html;
        }else {
            $editarDato=editarDato($datos);

            if ($editarDato === true) {
                $html = 'success';
                echo $html;
            }else {
                $html = 'error';
                echo $html;
            }
        }

    }

    if ($tipo == 'eliminarDato') {
        
        $idEliminar = $_POST['idEliminar'];

        $eliminarDato=eliminarDato($idEliminar);

        if ($eliminarDato === true) {
            $html = 'success';
            echo $html;
        }else {
            $html = 'error';
            echo $html;
        }

    }

// -----------------------------DATOS----------------------------- //