<?php
function afficherCours($day, $hour, $course) {

	if(isset($course[$day][$hour])) {

		if($course[$day][$hour][0] == "SOLO 1" || $course[$day][$hour][0] == "SOLO 2")
			$classe = "blue_course";
		elseif($course[$day][$hour][0] == "LINDY HOP 1")
			$classe = "yellow_course";
		elseif($course[$day][$hour][0] == "LINDY HOP 3")
			$classe = "orange_course";
		elseif($course[$day][$hour][0] == "LINDY HOP 2")
			$classe = "green_course";

		echo "<button class='$classe course'>". "<b>" . $course[$day][$hour][1] ." - ".$course[$day][$hour][2]. "</b> <br>"
		. $course[$day][$hour][0] ."</button>";
	}
}
?>

<?php include('profil_nav.php'); ?>

<h2 class="h2_compte">Planning</h2>

<div class="row">
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


<p class="center-align"><a href="#modal_cours" class="modal-trigger" rel="modal:open"> Ajouter un cours </a></p>

<div id="modal_cours" class="modal">
  <h1> Ajouter un cours </h1>
    <form class="add_course p-5"  method="post">
    	<input type="text" name="" value="" placeholder="Nom du cours">
			<input type="text" name="" value="" placeholder="Jour de la semaine">
			<input type="text" name="" value="" placeholder="Horaires">
			<input type="text" name="" value="" placeholder="Lieu">
			<textarea name="name" rows="8" cols="80" placeholder="Description du cours"></textarea>
			<button type="submit" name="button"> Ajouter </button>
    </form>
</div>
