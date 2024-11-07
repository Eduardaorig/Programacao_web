<?php
include_once("configuracao.php");
include_once("configuracao/conexao.php");
include_once("funcoes.php");

$nome = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['nome'])) ? $_POST['nome'] : null;

$sobrenome = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['sobrenome'])) ? $_POST['sobrenome'] : null;

$email = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['email'])) ? $_POST['email'] : null;

$peso = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['peso'])) ? $_POST['peso'] : null;

$altura = ($_SERVER["REQUEST_METHOD"] == "POST"
 && !empty($_POST['altura'])) ? $_POST['altura'] : null;

$telefone = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['telefone'])) ? $_POST['telefone'] : null;

$mensagem = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['mensagem'])) ? $_POST['mensagem'] : null;

$login = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['login'])) ? $_POST['login'] : null;

@$senha = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty(criptografia($_POST['senha']))) ? criptografia($_POST['senha']) : null;

$titulo = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['titulo'])) ? $_POST['titulo'] : null;

$descricao = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['descricao'])) ? $_POST['descricao'] : null;

$descricao_curta = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['descricao_curta'])) ? $_POST['descricao_curta'] : null;

$imagem = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['imagem'])) ? $_POST['imagem'] : null;
$resposta = 0;
 
 $resposta = calcularImc($peso, $altura);
 $classificacao = classificarImc($resposta);
 $noticia = null;
 
//  var_dump($resposta); 
 timeZone();
  $data = dataAtual();
  $tituloDoSite = "BEM VINDO A INFOSPORTS!";
  $subTituloDoSite = "Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte
  preferido. <br>".$data;

if($_GET && isset($_GET['pagina'])){
  $paginaUrl = $_GET['pagina'];
}else{
  $paginaUrl = null;
}

if($paginaUrl === "principal"){
  cadastrar($nome,$email,$peso,$altura,$resposta,$classificacao);
}elseif($paginaUrl === "registro"){
  cadastrarRegistro($nome, $email, $telefone,$login,$senha);
}elseif($paginaUrl === "contato"){
  cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem);
}elseif($paginaUrl === "cadastrar-noticia"){
  cadastrarNoticia($titulo,$imagem,$descricao,$descricao_curta);
}

include_once("views/header_view.php");
  if($paginaUrl === "principal"){
    include_once("views/principal_view.php");
  }elseif($paginaUrl === "contato"){
    include_once("views/contato_view.php");
  }elseif($paginaUrl === "login"){
    include_once("views/login_view.php");

    $usuarioCadastrado = verificarLogin($login);
    if($usuarioCadastrado && validaSenha($senha, $usuarioCadastrado['senha'])   
    ){
      registrarAcessoValido($usuarioCadastrado);

    }

    
  }elseif($paginaUrl === "registro"){
      protegerTela();
    include_once("views/registro_view.php");
  }elseif($paginaUrl === "cadastrar-noticia"){
      protegerTela();
    include_once("views/noticia_view.php");
  }elseif($paginaUrl === "sair"){
    limparSessao();
  }elseif($paginaUrl === "detalhe"){
    if($_GET && isset($_GET['id'])){
      $idNoticia = $_GET['id'];
    }else{
      $idNoticia = 0;
    }
    $noticia = buscarNoticiaPorId($idNoticia);
    include_once("views/detalhe_view.php");
  }
  else{
    echo "404 Página não existe!";
  }

include_once("views/footer_view.php");

?>