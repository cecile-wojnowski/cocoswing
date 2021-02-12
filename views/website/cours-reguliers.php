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
            <h1>Planning</h1>
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
    </div>

  <div class="section">

  </div>

  <div class="section">

  </div>

  <div class="section">

  </div>
</div>
