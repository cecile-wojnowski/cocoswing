<div class="container">
  <div class="row">
    <button class="btn"> Planning </button>
    <button class="btn"> Niveaux </button>
    <button class="btn"> Tarifs </button>
    <button class="btn"> Salles </button>
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
            <h1>Planning 2020 - 2021</h1>
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

  <div class="row section">
    <h1>Les niveaux</h1>
    <h2>Lindy Hop</h2>
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
    <h2>Charleston</h2>
  </div>

  <div class="row">

  </div>
</div>
