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

    // function editarDato($datos){
    //     include 'conexion-bd.php';

    //     if ($datos == "") {
    //         $editarDato = mysqli_query($conexion,"UPDATE tabla SET tabla_id = '$datos'");
            
    //         if ($editarDato) {
    //             return true;
    //         }else {
    //             return false;
    //         }
    //     }
    // }

    // function eliminarDato($idEliminar){
    //     include 'conexion-bd.php';

    //     $eliminarDato = mysqli_query($conexion,"UPDATE tabla SET tabla_status = 0 WHERE tabla_id = '$idEliminar'");
        
    //     if ($eliminarDato) {
    //         return true;
    //     }else {
    //         return false;
    //     }
    // }

}else {
    header("location: index.php");
}
?>