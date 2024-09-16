<?php
  include_once("funcoes.php"); 
  $titulo= "BEM VINDO A SPORTS!";
  $subtitulo= "Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte
      preferido.";

  if($_GET && isset($_GET['pagina'])){
      $paginaUrl = $_GET['pagina'];
  } else {
      $paginaUrl = null;

  }

  include_once("header.php");

   if($paginaUrl === "principal"){
     include_once("principal.php");
    } elseif($paginaUrl === "login"){
      include_once("login.php");
    } elseif($paginaUrl === "registro"){
      include_once("registro.php");
    } elseif($paginaUrl === "contato"){
      include_once("contato.php");
    } elseif($paginaUrl === "boxe"){
      include_once("boxe.php");
    } 
    else{
      echo "error 404, página não existe";
    } 

  include_once("footer.php");
?>


