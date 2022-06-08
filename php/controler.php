<?php


// error_reporting(0); 

include 'modelo.php';


$tipo = $_POST['tipo'];

// -----------------------------PRODUCTOS----------------------------- //

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

    if ($tipo == 'editarProducto') {
        
        $idProducto = $_POST['idProducto'];
        $nombreNuevoProdE = $_POST['nombreNuevoProdE'];
        $referenciaNuevoProdE = $_POST['referenciaNuevoProdE'];
        $precioNuevoProdE = $_POST['precioNuevoProdE'];
        $pesoNuevoProdE = $_POST['pesoNuevoProdE'];
        $categoríaNuevoProdE = $_POST['categoríaNuevoProdE'];
        $stockNuevoProdE = $_POST['stockNuevoProdE'];
        
        if ($nombreNuevoProdE == "" || $referenciaNuevoProdE == "" || $precioNuevoProdE == "" || $pesoNuevoProdE == "" || $categoríaNuevoProdE == "" || $stockNuevoProdE == "")  {
            $html = 'info';
            echo $html;
        }else {
            $editarProd=editarProd($idProducto,$nombreNuevoProdE,$referenciaNuevoProdE,$precioNuevoProdE,$pesoNuevoProdE,$categoríaNuevoProdE,$stockNuevoProdE);

            if ($editarProd === true) {
                $html = 'success';
                echo $html;
            }else {
                $html = 'error';
                echo $html;
            }
        }

    }

    if ($tipo == 'eliminarProducto') {
        
        $idEliminar = $_POST['idEliminar'];

        $eliminarProducto=eliminarProducto($idEliminar);

        if ($eliminarProducto === true) {
            $html = 'success';
            echo $html;
        }else {
            $html = 'error';
            echo $html;
        }

    }

// -----------------------------PRODUCTOS----------------------------- //

// -----------------------------VENTA----------------------------- //

    if ($tipo == 'nuevaVenta') {
        
        $productoAVender = $_POST['productoAVender'];
        $cantidadProdVender = $_POST['cantidadProdVender'];
        
        if ($productoAVender == "" || $cantidadProdVender == "")  {
            $html = 'info';
            echo $html;
        }else {
            $nuevaVenta=nuevaVenta($productoAVender,$cantidadProdVender,$idUserSession);

            if ($nuevaVenta === true) {
                $html = 'success';
                echo $html;
            }else if ($nuevaVenta === false) {
                $html = 'error';
                echo $html;
            }else {
                $html = 'stock';
                echo $html;
            }
        }
    }

// -----------------------------VENTA----------------------------- //