<p class="sectionTitle" id="backToTop"><?= $titulo ?></p>
    <p class="sectionDescription"><?= $subtitulo ?></p>
    <section class="gridContainer">
      <div class="mainContent">

        <?php
          foreach (listarNoticias() as $noticias):
        ?>


        <a class="pag-link" href="<?= $noticias["link"] ?>">
          <div class="categoryCard">
            <img src="<?= $noticias["img"]?>" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle"><?= $noticias["titulo"]?></p>
            <p class="mainCategoryCardDescription"><?= $noticias["text"]?></p>
          </div>
        </a>
        <?php endforeach 
        ?>

      </div>
      <aside class="sidebar">
        <div class="sidebarContent">
          <div class="IMC">
            <p>INDICE DE MASSA CORPORAL (IMC)</p>
            <label for="#peso">Peso (KG)</label>
            <input id="peso" type="text" placeholder="Digite o peso...">
            <label for="#altura">Altura (M)</label>
            <input id="altura" type="text" placeholder="Digite a altura...">
            <button class="btnCalcular">Calcular</button>
      </aside>

    </section>

    <footer class="footer">
      <span>Info Sports</span>
      <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
    </footer>
  </div>
  <script src="scripts/imc.js"></script>
  <script src="scripts/temaescuro.js"></script>
  <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>