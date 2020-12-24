<?php
function afficherCours($day, $hour, $course) {

	if(isset($course[$day][$hour])) {

		if($course[$day][$hour] == "Solo 1" || $course[$day][$hour] == "Solo 2")
			$classe = "blue_course";
		elseif($course[$day][$hour] == "Lindy Hop 1")
			$classe = "yellow_course";
		elseif($course[$day][$hour] == "Lindy Hop 3")
			$classe = "orange_course";
		elseif($course[$day][$hour] == "Lindy Hop 2")
			$classe = "green_course";

		echo "<button class='$classe'>" . $course[$day][$hour] ."</button>";

	}
}
?>

<?php include('profil_nav.php'); ?>

<h2 class="h2_compte">Agenda des cours</h2>

<div class="row">
	<div class="col s7 m7 offset-m2">
		<table class="centered">
			<thead>
				<tr>
					<th> </th>
					<th scope="col"> Lundi </th>
					<th scope="col"> Mardi </th>
					<th scope="col"> Mercredi </th>
					<th scope="col"> Jeudi </th>
					<th scope="col"> Vendredi </th>
				</tr>
			</thead>

			<tbody>

				<tr>
					<th scope="row"> 14h </th>
					<td class="lundi"><?php afficherCours("lundi", "14", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "14", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "14", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "14", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "14", $course); ?> </td>
				</tr>
				<tr>
					<th scope="row"> 15h </th>
					<td class="lundi"><?php afficherCours("lundi", "15", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "15", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "15", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "15", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "15", $course); ?> </td>

				</tr>
				<tr>
					<th scope="row"> 16h </th>
					<td class="lundi"><?php afficherCours("lundi", "16", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "16", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "16", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "16", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "16", $course); ?> </td>

				</tr>
				<tr>
					<th scope="row"> 17h </th>
					<td class="lundi"><?php afficherCours("lundi", "17", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "17", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "17", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "17", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "17", $course); ?> </td>

				</tr>
				<tr>
					<th scope="row"> 18h </th>
					<td class="lundi"><?php afficherCours("lundi", "18", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "18", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "18", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "18", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "18", $course); ?> </td>
				</tr>

				<tr>
					<th scope="row"> 19h </th>
					<td class="lundi"><?php afficherCours("lundi", "19", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "19", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "19", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "19", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "19", $course); ?> </td>
				</tr>

				<tr>
					<th scope="row"> 20h </th>
					<td class="lundi"><?php afficherCours("lundi", "20", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "20", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "20", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "20", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "20", $course); ?> </td>
				</tr>

				<tr>
					<th scope="row"> 21h </th>
					<td class="lundi"><?php afficherCours("lundi", "21", $course); ?></td>
					<td class="mardi"> <?php afficherCours("mardi", "21", $course); ?> </td>
					<td class="mercredi"> <?php afficherCours("mercredi", "21", $course); ?></td>
					<td class="jeudi"> <?php afficherCours("jeudi", "21", $course); ?> </td>
					<td class="vendredi"> <?php afficherCours("vendredi", "21", $course); ?> </td>
				</tr>

				<tr>
					<th scope="row"> 22h </th>
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
<a href="#"> Ajouter un cours</a>
