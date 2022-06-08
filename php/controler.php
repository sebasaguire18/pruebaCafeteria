<?php


// error_reporting(0); 

include 'modelo.php';


$tipo = $_POST['tipo'];

// -----------------------------DATOS----------------------------- //

    if ($tipo == 'nuevaDato') {
        
        $datos = $_POST['datos'];
        
        if ($datos == "")  {
            $html = 'info';
            echo $html;
        }else {
            $nuevaDato=nuevaDato($datos);

            if ($nuevaDato === true) {
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