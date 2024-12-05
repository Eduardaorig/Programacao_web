<?php
include_once("configuracao.php");
include_once("configuracao/conexao.php");
include_once("model/acesso_model.php");
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

$nomeCategoria = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['nomeCategoria'])) ? $_POST['nomeCategoria'] : null;

$imagem = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['fileToUpload'])) ? $_POST['fileToUpload'] : null;

$id_categoria = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome_categoria'])) ? $_POST['nome_categoria'] : null;

$resposta = 0;

 $resposta = calcularImc($peso, $altura);
 $classificacao = classificarImc($resposta);
 $noticia = null;
 $categorias = [];
 $noticiasPorCategoria = [];

 
 timeZone();
  $data = dataAtual();
  $tituloDoSite = "BEM VINDO A INFOSPORTS!";
  $subTituloDoSite = "Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte
  preferido. <br>";

if($_GET && isset($_GET['pagina'])){
  $paginaUrl = $_GET['pagina'];
}else{
  $paginaUrl = null;
}

if($paginaUrl === "principal"){
  cadastrar($nome,$email,$peso,$altura,$resposta,$classificacao);
}elseif($paginaUrl === "contato"){
  cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem);
}elseif($paginaUrl === "noticia"){
  $nomedaImagem = upload($imagem);
  cadastrarNoticia($titulo,$nomedaImagem,$descricao,$descricao_curta, $id_categoria);
}elseif($paginaUrl === "categoria"){
  if(!verificarCategoriaDuplicada($nomeCategoria)){
    cadastrarCategoria($nomeCategoria);
}}

include_once("views/header_view.php");
  if($paginaUrl === "principal"){
    include_once("views/principal_view.php");
  }elseif($paginaUrl === "contato"){
    include_once("views/contato_view.php");
  }elseif($paginaUrl === "login"){
    
    $usuarioCadastrado = acesso::verificarLogin($login);
    if($usuarioCadastrado && acesso::validaSenha($senha, $usuarioCadastrado['senha'])   
    ){
    acesso::registrarAcessoValido($usuarioCadastrado);
      
    }

  include_once("views/login_view.php");
    
  }elseif($paginaUrl === "registro"){
      acesso::protegerTela();
      include_once("model/registro_model.php");
      $usuarioCadastrado = Registro::verificarLogin($login);
      include_once("controller/registro_controller.php");
  }elseif($paginaUrl === "noticia"){
      var_dump($_POST);die;
      acesso::protegerTela();
      $categorias = listarCategorias();
      $nomedaImagem = upload($imagem);
      include_once("views/noticia_view.php");
  }elseif($paginaUrl === "sair"){
      acesso::limparSessao();
  }elseif($paginaUrl === "categoria"){
      acesso::protegerTela();
    include_once("views/categoria_view.php");
  }elseif($paginaUrl === "detalhe"){
    if($_GET && isset($_GET['id'])){
      $idNoticia = $_GET['id'];
    }else{
      $idNoticia = 0;
    }
    $noticia = buscarNoticiaPorId($idNoticia);
    $noticiasPorCategoria = listarNoticiasPorCategoria($noticia['categoria_id']);
    include_once("views/detalhe_view.php");
  }else{
    echo "404 Página não existe!";
  }

include_once("views/footer_view.php");

?>
