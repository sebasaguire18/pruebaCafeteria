<?php
session_start();

if($_SESSION['userID']){
    $idUserSession = $_SESSION['userID'];

    // insertar nuevo producto
    function nuevoProducto($nombreNuevoProd,$referenciaNuevoProd,$precioNuevoProd,$pesoNuevoProd,$categoríaNuevoProd,$stockNuevoProd,$idUserSession){
        include 'conexion-bd.php';

        $id = uniqid();

        $nuevoProd = mysqli_query($conexion,"INSERT INTO productos (prod_id,prod_nombre,prod_ref,prod_precio,prod_peso,prod_cat,prod_stock,prod_usuario) 
                                    VALUES('$id','$nombreNuevoProd','$referenciaNuevoProd',$precioNuevoProd,$pesoNuevoProd,'$categoríaNuevoProd',$stockNuevoProd,'$idUserSession')");
        
        if ($nuevoProd) {
            return true;
        }else {
            return false;
        }
    }

    // editar producto
    function editarProd($idProducto,$nombreNuevoProdE,$referenciaNuevoProdE,$precioNuevoProdE,$pesoNuevoProdE,$categoríaNuevoProdE,$stockNuevoProdE){
        include 'conexion-bd.php';

        $editarProducto = mysqli_query($conexion,"UPDATE productos SET prod_nombre = '$nombreNuevoProdE', prod_ref = '$referenciaNuevoProdE', prod_precio = $precioNuevoProdE, prod_peso = $pesoNuevoProdE, prod_cat = '$categoríaNuevoProdE', prod_stock = $stockNuevoProdE WHERE prod_id = '$idProducto'");
        
        if ($editarProducto) {
            return true;
        }else {
            return false;
        }
    }

    function eliminarProducto($idEliminar){
        include 'conexion-bd.php';

        $eliminarProd = mysqli_query($conexion,"UPDATE productos SET prod_status = 0 WHERE prod_id = '$idEliminar'");
        
        if ($eliminarProd) {
            return true;
        }else {
            return false;
        }
    }

}else {
    header("location: index.php");
}
?>