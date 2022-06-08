<?php
    session_start();
    if($_SESSION['userID']){
        $idUserSession=$_SESSION['userID'];
?>

<!doctype html>
<html lang="es">
    <head>
        <title id="titlePage">Inicio</title>
        <?php include 'includes/link.php'; ?>
    </head>
    <body>
        <div id="app">            
            <div id="main">        
                <section id="contentNav">

                </section>
            
                <!-- Page Content  -->
                <div class="page-content" id="contentPrincipal">
                    
                </div>
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>

        <?php include 'includes/script.php'; ?>
        
    </body>
</html>

<?php
    }else{
        header("location:index.php");
    }
?>