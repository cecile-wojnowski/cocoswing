<div class="container">
<?php //var_dump($stages); ?>
  <ul>
    <?php foreach($stages as $data){ ?>

    <li><?= $data['start_date'] . " " . $data['name'] ?>

      <?php if(isset($_SESSION)){ ?>
      <a href="#rejoindreStage<?= $data['id'] ?>" class="modal-trigger" rel="modal:open"> Rejoindre </a>
    <?php }else{ ?>
      <a href="#connexionStage" class="modal-trigger" rel="modal:open"> Rejoindre </a>
    <?php } ?>
    </li>

    <div id="rejoindreStage<?= $data['id'] ?>" class="modal">
      <div class="modal-content">
        <h1 class="center-align"> Rejoindre un stage </h1>
          <form class="p-5 form_course center-align" action="joinTraineeship"  method="post">
          	<p>Voulez-vous participer au stage "<?= $data['name'] ?>" le <?= $data['start_date'] ?> ?</p>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

      			<button type="submit" name="button"> Oui </button>
            <button class="modal-close" type="button" name="button"> Non </button>
          </form>
        </div>
    </div>

    <div id="connexionStage" class="modal">
      <div class="modal-content">
        <div class="erreur hidden"></div>
        <form class="form_connexion" method="post">
          <div class="label_input">
            <label for="email">Adresse e-mail </label>
            <input type="text" name="email" id="email" placeholder="Saisir son adresse e-mail" required>
          </div>

          <div class="label_input">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Saisir son mot de passe" required>
          </div>

          <div class="center">
            <button type="submit" class="button_pages"> Connexion </button>
            <p>
              Nouveau ? <a class="link_inscription" href="<?= URL ?>members/inscription">Cliquez ici</a> pour vous inscrire.
            </p>
          </div>
        </form>
        </div>
    </div>

  <?php  }?>
  <ul>

</div>
