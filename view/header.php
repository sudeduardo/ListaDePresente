<?php
if(!isset($_SESSION['login'])){
session_start();}
$ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
$PATH = $ArrPATH[count($ArrPATH)-1];
 if (isset($_SESSION['login'])) {
     if($PATH==="index.php"){
      header('Location: perfil.php');
     }
 }
if(isset($_GET['logout'])){
    $logout=$_GET['logout'];
    if($logout){
       if (isset($_SESSION['login'])) {
            session_destroy();
            header('Location: index.php');
        }  else {
        header('Location: index.php');    
        }
    }
}
?>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper blue darken-2">
                <a href="index.php" class="brand-logo"> <img src="view/logo.png" width="120px" height="85px" style="display:block"> </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <?php if(!isset($_SESSION['login'])){echo '<li><a href="index.php">Home</a></li>';}?>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="listas.php">Listas</a></li>
                    <?php if(isset($_SESSION['login'])){
                        echo "<li><a href='perfil.php'>Perfil</a></li>";
                        echo "<li><a href='".$PATH."?logout=true'>Logout</a></li>";
                        }?>
                </ul>
                <ul class="side-nav" id="mobile-demo">
              <?php if(!isset($_SESSION['login'])){echo '<li><a href="index.php">Home</a></li>';}?>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="listas.php">Listas</a></li>
                     <?php if(isset($_SESSION['login'])){
                        echo "<li><a href='perfil.php'>Perfil</a></li>";
                       echo "<li><a href='".$PATH."?logout=true'>Logout</a></li>";
                        }?>
                </ul>
            </div>
        </nav>