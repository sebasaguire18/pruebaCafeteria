<?php
session_start();

if($_SESSION['userID']){
    $idUserSession = $_SESSION['userID'];

    // DATOS
    function nuevaDato($datos){
        include 'conexion-bd.php';

        $id = uniqid();

        $nuevaDato = mysqli_query($conexion,"INSERT INTO tabla (tabla_id) 
                                    VALUES('$datos')");
        
        if ($nuevaDato) {
            return true;
        }else {
            return false;
        }
    }

    function editarDato($datos){
        include 'conexion-bd.php';

        if ($datos == "") {
            $editarDato = mysqli_query($conexion,"UPDATE tabla SET tabla_id = '$datos'");
            
            if ($editarDato) {
                return true;
            }else {
                return false;
            }
        }
    }

    function eliminarDato($idEliminar){
        include 'conexion-bd.php';

        $eliminarDato = mysqli_query($conexion,"UPDATE tabla SET tabla_status = 0 WHERE tabla_id = '$idEliminar'");
        
        if ($eliminarDato) {
            return true;
        }else {
            return false;
        }
    }

}else {
    header("location: index.php");
}
?>