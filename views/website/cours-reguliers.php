<div class="container">
  <div class="row">
    <button class="btn"> Planning </button>
    <button class="btn"> Niveaux </button>
    <button class="btn"> Tarifs </button>
    <button class="btn"> Salles </button>
  </div>

  <div id="modal_inscription" class="modal">
    <div class="modal-content font-size-16">
      <p class="center-align"><b>Ton inscription annuelle à Coco Swing Marseille comprend :</b></p>
      <ul>
        <li><i class="material-icons tiny">chevron_right</i> <b>35 cours hebdomadaires</b> d’1h15 tout au long de l’année. <b>Du 7 SEPTEMBRE au 1er JUILLET (inclus)</b></li>
        <li><i class="material-icons tiny">chevron_right</i> des <b>vidéos récaps</b> des cours & des <b>playlists inspirantes</b></li>
        <li><i class="material-icons tiny">chevron_right</i> <b>15 minutes de pratique encadrée</b> incluses à chaque cours en mélangeant les niveaux</li>
        <li><i class="material-icons tiny">chevron_right</i> <b>Des soirées, des pratiques, des swinguettes, des impromptus</b> tout au long de l’année dans des lieux chaleureux</li>
        <li><i class="material-icons tiny">chevron_right</i> une <b>communauté joyeuse</b>, stimulante et pleine d’amitiés</li>
        <li><i class="material-icons tiny">chevron_right</i> <b>des profs enthousiasmants et passionnés</b> qui t’accompagnent du début à la fin</li>
        <li><i class="material-icons tiny">chevron_right</i> des <b>tarifs préférentiels</b> sur les soirées et les stages de Coco Swing Marseille</li>
        <li><i class="material-icons tiny">chevron_right</i> une <b>réduction de 40%</b> sur le 2e cours</li>
        <li><i class="material-icons tiny">chevron_right</i> des <b>moments de joie</b> et de vie belle dans l’esprit authentique des Cocos : Tambouilles des vacances, fête de fin d’année…</li>
      </ul>

      <p class="center-align"><b>L’adhésion à l’association Coco Swing Marseille</b> : 10€ (indispensable) </p>
      <p class="center-align"><a href="<?= URL ?>members/inscription"> Créer un compte </a></p>
    </div>
  </div>

<?php
function afficherCours($day, $hour, $course){
  if(isset($course[$day][$hour])) {
		?>
		<button href="#modal_see_course<?= $course[$day][$hour]['id'] ?>" type='submit'
			class='course_color course modal-trigger' id='<?= $course[$day][$hour]['id'] ?>'
			style="background-color: <?= $course[$day][$hour]['color'] ?>">
			<b><?= $course[$day][$hour]['start_time'] ?> - <?= $course[$day][$hour]['end_time'] ?></b>
			<br><?= $course[$day][$hour]['type_dance'] ?>
		</button>
<?php }
  }
		?>

  <div class="row">
    <h1 class="center-align font-size-30">Planning 2020 - 2021</h1>
  	<table class="centered" id="planning">
  		<thead>
  			<tr>
  				<th scope="col"> Lundi </th>
  				<th scope="col"> Mardi </th>
  				<th scope="col"> Mercredi </th>
  				<th scope="col"> Jeudi </th>
  				<th scope="col"> Vendredi </th>
  			</tr>
  		</thead>

  		<tbody>
  			<tr> <!-- 14h -->
  				<td class="lundi"><?php afficherCours("lundi", "14", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "14", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "14", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "14", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "14", $course); ?> </td>
  			</tr>

  			<tr> <!-- 15h -->
  				<td class="lundi"><?php afficherCours("lundi", "15", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "15", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "15", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "15", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "15", $course); ?> </td>
  			</tr>

  			<tr> <!-- 16h -->
  				<td class="lundi"><?php afficherCours("lundi", "16", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "16", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "16", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "16", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "16", $course); ?> </td>
  			</tr>

  			<tr> <!-- 17h -->
  				<td class="lundi"><?php afficherCours("lundi", "17", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "17", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "17", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "17", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "17", $course); ?> </td>
  			</tr>

  			<tr> <!-- 18h -->
  				<td class="lundi"><?php afficherCours("lundi", "18", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "18", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "18", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "18", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "18", $course); ?> </td>
  			</tr>

  			<tr> <!-- 19h -->
  				<td class="lundi"><?php afficherCours("lundi", "19", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "19", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "19", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "19", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "19", $course); ?> </td>
  			</tr>

  			<tr> <!-- 20h -->
  				<td class="lundi"><?php afficherCours("lundi", "20", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "20", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "20", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "20", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "20", $course); ?> </td>
  			</tr>

  			<tr> <!-- 21h -->
  				<td class="lundi"><?php afficherCours("lundi", "21", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "21", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "21", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "21", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "21", $course); ?> </td>
  			</tr>

  			<tr> <!-- 22h -->
  				<td class="lundi"><?php afficherCours("lundi", "22", $course); ?></td>
  				<td class="mardi"> <?php afficherCours("mardi", "22", $course); ?> </td>
  				<td class="mercredi"> <?php afficherCours("mercredi", "22", $course); ?></td>
  				<td class="jeudi"> <?php afficherCours("jeudi", "22", $course); ?> </td>
  				<td class="vendredi"> <?php afficherCours("vendredi", "22", $course); ?> </td>
  			</tr>
  		</tbody>
  	</table>
  </div>

  <div class="center">
    <button href="#modal_inscription" class="modal-trigger background-orange text_red bold font-size-18">Je m'inscris</button>
  </div>

  <div class="row section">
    <h1 class="center-align font-size-30">Les niveaux</h1>
    <h2 class="text_orange">Lindy Hop</h2>
    <div class="col s4 m4">
      <img class="responsive-img" src="../ressources/img/lindy1.jpg" alt="Lindy1">
      <h3 class="center-align font-size-20 bold">Lindy 1</h3>
      <p class="justify font-size-16">
        Te voici arrivé.e sur le seuil du bonheur, prêt.e pour le grand Bounce en avant ?
        Ici on commence de zéro. Tout ce qu’il te faut, c’est savoir à peu près mettre un pied devant l’autre (et encore !).
        Ce cours t’apportera tous les fondamentaux pour swinguer avec plaisir et confiance sur le parquet.
      </p>
      <p class="justify font-size-16 m-top-5"> <b> Le swing out ? </b> “Euh, le quoi ? “</p>
    </div>
    <div class="col s4 m4">
      <img class="responsive-img" src="../ressources/img/lindy2.jpg" alt="Lindy2">
      <h3 class="center-align font-size-20 bold">Lindy 2</h3>
      <p class="justify font-size-16">
        Tu as ton shoo’pada bien dans les pattes. Cela fait entre 1 an et 6 mois que tu apprends le swing.
        Tu sais danser en 6 temps et en 8 temps. Sur la piste, tu as pas mal de choses à raconter :
        Tuck-turn, Pass-by, Send out, 2 ou 3 manières de kicker ensemble.
        Tu connais même 1 ou 2 footworks que tu sais mettre pile là où ça claque.
      </p>
      <p class="justify font-size-16 m-top-5">
        <b>Le swing out ?</b> “Oui je l’ai abordé et j’ai plus ou moins bien mon swing out basique.
        Je sens la liberté de dingue et les énergies de ouf qui s’en dégagent
        mais pour l’instant je suis en confort en restant simple. J’ai hâte de continuer ma découverte du swing.”
      </p>
    </div>
    <div class="col s4 m4">
      <img class="responsive-img" src="../ressources/img/lindy3.jpg" alt="Lindy3">
      <h3 class="center-align font-size-20 bold">Lindy 3</h3>
      <p class="justify font-size-16">
        Ici commence l’approfondissement de ton Swing. Ce cours se fonde sur des bases solides notamment sur ton meilleur Swing out.
        Tu vas apprendre des mouv’ qui claquent, explorer d’autres rythmiques, prendre ta liberté de danseuse ou de danseur,
        tu vas changer ta posture juste pour voir. Tu vas aller plus loin dans le soin à apporter à ton ou ta partenaire.
        Tu vas commencer à nuancer ta danse pour donner à voir la musique.
      </p>
      <p class="justify font-size-16 m-top-5">
        <b>Le Swing out ?</b> “La meilleure invention du monde ! Je commence à avoir un basique à mon style
        mais j’aimerais y mettre plus ou moins de piquant, parfaire mon groove et mes déplacements.”
      </p>
    </div>

  </div>

  <div class="row">
    <h2 class="text_orange">Solo Jazz - Charleston</h2>
    <div class="col s3 m3">
      <img class="responsive-img" src="../ressources/img/solo1.jpg" alt="Solo1">
    </div>
    <div class="col s3 m3">
      <h3 class="center-align font-size-20 bold">Solo 1</h3>
      <p class="justify font-size-16">
        Voici un cours de première découverte du Solo Jazz. On pose le rythme,
        on y met du swing, on apprend tout un répertoire de pas authentiques et à la fin on mélange le tout voire on improvise !
        Et le “oui mais moi je n’ai pas le sens du rythme” sera de l’histoire ancienne !
      </p>
    </div>
    <div class="col s3 m3">
      <img class="responsive-img" src="../ressources/img/solo2.jpg" alt="Solo2">
    </div>
    <div class="col s3 m3">
      <h3 class="center-align font-size-20 bold">Solo 2</h3>
      <p class="justify font-size-16">
        Un cours de Solo Jazz où l’on se met un peu plus au défi. Le rythme est déjà posé, tu sais groover,
        kicker, glisser, stomper et tu as un petit répertoire de steps.
        Le moment est venu pour toi de faire plus finement corps avec la musique,
        de complexifier tes pas et de développer ton sens de l’improvisation.
      </p>
    </div>
  </div>

  <div class="row section">
    <h1 class="center-align font-size-30">Les tarifs</h1>
    <div class="col s12 m12">
      <img class="responsive-img" src="../ressources/img/tarifs1.png" alt="tarifs">
    </div>
    <div class="col s12 m12">
      <img class="responsive-img" src="../ressources/img/tarifs2.png" alt="tarifs">
    </div>
    <p class="font-size-16 center-align"> <b>Tarif réduit</b> :
      Il s’applique aux bénéficiaires du RSA ainsi qu’aux chômeurs et étudiants à faibles ressources sur justificatif.
    </p>
    <p class="font-size-16 center-align">
      <b>Paiement en trois fois sans frais</b> : c’est possible, il suffit de nous le demander.
    </p>
  </div>

  <div class="row section">
    <h1 class="center-align font-size-30">Les salles</h1>
    <p class="center-align font-size-16">
      <a href="https://www.facebook.com/La-Fabrica-109998292449652/">La Fabrica </a> :
      8 Lieutenant Meschi, 13005 –
      <a href="https://www.google.com/maps/place/La+Fabrica/@43.2951621,5.399602,17z/data=!3m1!4b1!4m5!3m4!1s0x12c9bf5c5f86d005:0x68b07583ef4d7b95!8m2!3d43.2951582!4d5.401796">Lien maps</a>
    </p>

    <p class="center-align font-size-16">CMA Velten : 16 Bernard du bois, 13001 –
      <a href="https://www.google.com/maps/place/Coco+Velten/@43.3016625,5.3745073,17z/data=!3m1!4b1!4m5!3m4!1s0x12c9c1bf2289f61d:0xdafaf9b132cb48bb!8m2!3d43.3016586!4d5.3767013">Lien maps</a>
    </p>

    <p class="center-align font-size-16">
      <a href="https://wereso-marseille.fr/">Weréso</a> :
      Gare Saint Charles (entrée côté Université), 13001 –
      <a href="https://www.google.com/maps/place/wer%C3%A9so+Marseille+Saint-Charles/@43.3038861,5.3768371,17z/data=!3m1!4b1!4m5!3m4!1s0x12c9c19afbeb6c05:0xe1db6f0b5df24a07!8m2!3d43.3038861!4d5.3790258">Lien maps</a>
    </p>
  </div>
</div>
