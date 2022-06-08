<?php
    session_start();
    error_reporting(0);
    
    if($_SESSION['userID']){
        $idUserSession=$_SESSION['userID'];
  	    header("location: welcome.php");

    }else{

?>
<!doctype html>
<html lang="es">
    <head>
        <title>Inicio</title>

        <?php include 'includes/link.php'; ?>

    </head>
    <body>
        <div class="rwg hvh-100 w-100 jfy-ctn-center alg-itm-center">
            <div class="g-reg-7 g-reg-xl-7 g-reg-lg-7 g-reg-md-5 hvh-100 dp-flex jfy-ctn-center alg-itm-center bg-secondary" id="span-logo">
                <h0 class="txt-white txt-center"><b>Software Cafetería</b></h0>
            </div>
            <div class="g-reg-14 g-reg-xl-7 g-reg-lg-7 g-reg-md-9 g-reg-sm-14 dp-flex jfy-ctn-center alg-itm-center">
                <div class="bg-trs-6 w-60 bdr-4 pdx-4" id="box-sesion">
                    <form id="formInicioSesion">
                        <div class="ruler-title">
                            <h3>Iniciar Sesión</h3>
                        </div>
                        <div class="ruler-input mgt-4">
                            <input type="email" id="usernameLoging" class="ruler-input_child-lg bg-trs-6" placeholder="Email" autocomplete="off">
                            <span class="txt-danger dp-none" id="spanUsernameLoging"> Por favor ingresa un email valido</span>
                            <span class="txt-danger dp-none" id="spanUsernameLogingError">Email no encontrado</span>
                        </div>
                        <div class="ruler-input mgb-4">
                            <input type="password" id="passLoging" class="ruler-input_child-lg bg-trs-6" placeholder="Contraseña" autocomplete="off">
                            <span class="txt-danger dp-none" id="spanPassLoging">Por favor ingresa la contraseña</span>
                            <span class="txt-danger dp-none" id="spanPassLogingError">Contraseña erronea</span>
                        </div>
                        <div class="ruler-link">
                            <a id="olvidoPassword" onclick="changeForm('olvidoPass')" class="ruler-link_child">¿Olvidó la contraseña?</a>
                        </div>
                        <div class="ruler-button">
                            <a id="btnIniciarSesion" type="submit" class="ruler-button_child-lg ruler-button-block bg-primary txt-white">Validar</a>
                        </div>
                    </form>
                </div>
                <div class="dp-none bg-trs-6 w-60 bdr-4 pdx-4" id="box-olvidoPass">
                    <form id="formRegistroUsuario">
                        <div class="ruler-title">
                            <h3>Recuperar Cuenta</h3>
                        </div>
                        <div class="ruler-input mgy-6">
                            <input type="email" id="email" class="ruler-input_child-lg bg-trs-6" placeholder="Email" autocomplete="off">
                        </div>
                        <div class="ruler-button">
                            <a class="ruler-button_child-lg ruler-button-block bg-primary txt-white" type="submit">Enviar</a>
                        </div>
                    </form>
                    
                    <div class="ruler-link dp-flex jfy-ctn-end">
                        <a id="btnRegistrarCuenta" onclick="changeForm('ini')" class="ruler-link_child">Iniciar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include 'includes/script.php'; ?>
    </body>
</html>

<?php
    }
?>