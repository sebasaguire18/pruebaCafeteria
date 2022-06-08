<?php

include 'conexion-bd.php';

$usernameLoging = $_POST['usernameLoging'];
$passLoging = $_POST['passLoging'];


$consultaU = " SELECT * FROM usuarios WHERE username = '$usernameLoging' AND status = 1 ";

$resultado=mysqli_query($conexion,$consultaU);
$filas=mysqli_num_rows($resultado);

if($filas==1){
    $passLoging = md5($passLoging);
    $consulta = " SELECT * FROM usuarios WHERE username = '$usernameLoging' AND pass = '$passLoging' AND status = 1 ";
    
    $resultado=mysqli_query($conexion,$consulta);
    $fila=mysqli_num_rows($resultado);
    
    if($fila==1){
    
        session_start();

        $nombre="SELECT * FROM usuarios WHERE username = '$usernameLoging'";
        
        $ejecutar_nombre=mysqli_query($conexion, $nombre);
        $mostrar_nombre=mysqli_fetch_array($ejecutar_nombre);
        $_SESSION['userID']=$mostrar_nombre['id'];
        mysqli_free_result($resultado); 
        mysqli_close($conexion);
          
        echo 'successSesion';
    }else{

        mysqli_free_result($resultado); 
        mysqli_close($conexion);     
        
        echo 'errorPassword';
        
    }   
    
}else{
    
    mysqli_free_result($resultado); 
    mysqli_close($conexion);     
    
    echo 'errorUsername';
}   


?>