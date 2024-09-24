<?php
/*
* listar noticias
*/
function listarNoticias(){
    $listarNoticias[0] = array(
        "link" => "boxe.html",
        "img" => "imagens/boxe.jpg", 
        "titulo" => "BOXE", 
        "text" => "Descubra a força interior e a técnica impecável necessárias para se
              destacar no ringue. Desafie-se a superar seus
              limites físicos e mentais enquanto aprende os segredos deste esporte de combate emocionante"
    );
    
    $listarNoticias[1] = array(
        "link" => "crossfit.html",
        "img" => "imagens/crossfit.jpg",
        "titulo" => "CROSSFIT",
        "text" => "Entre na arena do crossfit e desafie seu corpo em um treinamento
              intenso e variado que irá transformar sua força,
              resistência e condicionamento físico. Supere seus limites e alcance novos patamares de desempenho"
    );
    
    $listarNoticias[2] = array(
        "link" => "esportesnaneve.html",
        "img" => "imagens/esportesNaNeve.jpg",
        "titulo" => "ESPORTES NA NEVE",
        "text" => "Sinta a adrenalina das montanhas cobertas de neve enquanto desliza
              pelas encostas em esportes como esqui e snowboard.
              Prepare-se para a emoção de voar sobre a neve e dominar as pistas"
    );
    
    $listarNoticias[3] = array(
        "link" => "basquete.html",
        "img" => "imagens/basquete.jpg",
        "titulo" => "BASQUETE",
        "text" =>"Drible, passe, arremesse! Junte-se ao emocionante mundo do basquete e
              experimente a empolgação de jogar em equipe,
              competir em partidas acirradas e fazer cestas incríveis"
    );

    $listarNoticias[4] = array(
        "link" => "corrida.html",
        "img" => "imagens/corrida.jpg",
        "titulo" => "CORRIDA",
        "text" =>"Calce seus tênis e sinta a energia pulsante das corridas. Desafie-se
              em diferentes distâncias, supere obstáculos e
              descubra os benefícios incríveis para a saúde e o bem-estar que a corrida proporciona"
    );
    
    $listarNoticias[5] = array(
        "link" => "surf.html",
        "img" => "imagens/surf.jpg",
        "titulo" => "SURF",
        "text" =>"Sinta a liberdade e a conexão com o mar enquanto desliza pelas ondas
              no surf. Experimente a emoção de pegar a onda
              perfeita, domine as técnicas e mergulhe no estilo de vida descontraído e vibrante do surf"
    );

    $listarNoticias[6] = array(
        "link" => "trilha.html",
        "img" => "imagens/trilha.jpg",
        "titulo" => "TRILHA",
        "text" =>"Aventure-se pelos caminhos menos percorridos e descubra a beleza da
              natureza enquanto se desafia em trilhas
              emocionantes. Deixe a rotina para trás e explore novos horizontes ao ar livre"
    );
    
    $listarNoticias[7] = array(
        "link" => "tenis.html",
        "img" => "imagens/tenis.jpg",
        "titulo" => "TÊNIS",
        "text" =>"Experimente a elegância e a velocidade do tênis, um esporte que
              combina habilidade, estratégia e agilidade. Jogue com
              paixão, vença com classe e desfrute da competição saudável em quadra"
    );
    
   

    

    return $listarNoticias;
}

function calcularImc($peso, $altura){   
    $resposta = 0;
    if($peso && $altura){
        $resposta = $peso / ($altura * $altura);
    }
    return round ($resposta,2);
}

function imcBuscarPorId($id)
{
    $pdo = Database::conexao();
    $sql = "SELECT * FROM imc WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

function cadastrar($nome,$email,$peso,$altura,$imc,$classificacao)
  {
    if (!$nome || !$email || !$peso || !$altura || !$imc || !$classificacao){return;}
      $sql = "INSERT INTO `imc` (`nome`,`email`,`peso`,`altura`,`imc`,`classificacao`)
      VALUES(:nome,:email,:peso,:altura,:imc,:classificacao)";

      $pdo = Database::conexao();
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':peso', $peso);
      $stmt->bindParam(':altura', $altura);
      $stmt->bindParam(':imc', $imc);
      $stmt->bindParam(':classificacao', $classificacao);
      $result = $stmt->execute();
      return ($result)?true:false;
  }

  function classificarImc($imc){
      if($imc <= 16){
          return "magreza grave;";
      }elseif($imc > 16 && $imc <= 17){
          return "magreza moderada";
      }elseif($imc > 17 && $imc <= 18.5){
          return "magreza leve";
      }elseif($imc >= 18.6 && $imc<= 24.9){
          return "Peso Ideal";
      }elseif($imc >= 25 && $imc <= 29.9 ){
           "Sreturnobrepeso";
      }elseif($imc >= 30 && $imc <= 34.9){
          return "Obesidade";
      }elseif($imc >= 30 && $imc <= 34.9){
          return "Obesidade grau 1";
      }elseif($imc >= 35 && $imc <= 39.9){
          return "Obesidade grau 2 ou severa";
      }elseif($imc >= 40){
          return "Obesidade grau 3 ou morbida";
      }
  }