<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/temaescuro.css">
  <?php if($paginaUrl === "principal"):?>
    <link rel="stylesheet" href="css/index.css">
    <title>InfoSports</title>
  <?php endif ?>
  <?php if($paginaUrl === "login"):?>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/validacao.css">
    <?php endif ?>  
  <?php if($paginaUrl === "registro"):?>
    <link rel="stylesheet" href="css/registro.css">
    <title>Registro</title>
  <?php endif ?>
  <?php if($paginaUrl === "contato"):?>
    <title>Contato</title>
    <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="css/validacao-contato.css">
    <script>src="scripts/contato.js"</script>
    <?php endif ?>
    
           
      
  <script src="scripts/header.js" defer></script>
  <script src="scripts/validacao.js" defer></script>
</head>

<body>
  <div <?php if($paginaUrl === "contato"){'class= "body-bg"';}else{'class= "container"';}?>>
    <header class="header">
      <a class="logo" href="<?= "http://localhost/ed/infoSports/?pagina=principal" ?>">InfoSports</a>
      <div class="headerBtnGroup">
        <button class="navBtn"><a href="<?= "http://localhost/ed/infoSports/?pagina=login" ?>">Login</a></button>
        <button class="navBtn"><a href="<?= "http://localhost/ed/infoSports/?pagina=registro" ?>">Registro</a></button>
        <button class="navBtn"><a href="<?= "http://localhost/ed/infoSports/?pagina=contato" ?>">Contato</a></button>
        <div>
          <input type="checkbox" class="check" id="chk"/>

          <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="bola"></div>
          </label>
        </div>
      </div>
      <div class="hamburguer-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </header>