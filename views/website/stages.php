<div class="container">
<?php //var_dump($stages); ?>
<table class="centered highlight">
  <thead>
    <th>Date</th>
    <th>Nom du stage</th>
    <th></th>
  </thead>

  <tbody>
    <?php foreach($stages as $data){ ?>
    <tr>
      <td><?=  $data['start_date'] ?> </td>
      <td> <?= $data['name'] ?> </td>
      <td>
        <?php if(!empty($_SESSION)){ ?>
        <a href="#rejoindreStage<?= $data['id'] ?>" class="modal-trigger" rel="modal:open"> Rejoindre </a>
        <?php }else{ ?>
        <a href="#connexionStage" class="modal-trigger" rel="modal:open"> Rejoindre </a>
        <?php } ?>


    <div id="rejoindreStage<?= $data['id'] ?>" class="modal">
      <div class="modal-content">
        <h1 class="center-align"> Rejoindre un stage </h1>
          <form class="p-5 form_course center-align" action="joinTraineeship"  method="post">
          	<p>Voulez-vous participer au stage "<?= $data['name'] ?>" le <?= $data['start_date'] ?> ?</p>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

      			<button class="m-top-5 btn background-blue font-size-18" type="submit" name="button"> Oui </button>
            <button class="m-top-5 m-left-5 modal-close btn background-blue font-size-18" type="button" name="button"> Non </button>
          </form>
        </div>
    </div>

    <div id="connexionStage" class="modal">
      <div class="modal-content">
        <div class="erreur hidden"></div>
        <p class="center">Connectez-vous pour vous inscrire à un stage.</p>
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
              Nouveau ? <a class="blue_link" href="<?= URL ?>members/inscription">Cliquez ici</a> pour vous inscrire.
            </p>
          </div>
        </form>
        </div>
    </div>
  </td>
  </tr>
  <?php  }?>
  </table>
</div>
