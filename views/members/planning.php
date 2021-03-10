<?php
function afficherCours($day, $hour, $course) {
	if(isset($course[$day][$hour])) {
		//var_dump($course);
		?>
		<button href="#modal_see_course<?= $course[$day][$hour]['id'] ?>" type="button"
			class='course_color course modal-trigger' id='<?= $course[$day][$hour]['id'] ?>'
			style="background-color: <?= $course[$day][$hour]['color'] ?>">
			<b><?= $course[$day][$hour]['start_time'] ?> - <?= $course[$day][$hour]['end_time'] ?></b>
			<br><?= $course[$day][$hour]['type_dance'] ?>
		</button>

		<!-- Modal affichant le détail d'un cours -->
		<?php if($_SESSION['admin'] == 1){ ?>
		<div id="modal_see_course<?= $course[$day][$hour]['id'] ?>" class="modal modal_courses">
		  <h1> <?= $course[$day][$hour]['dance_name'] ?> </h1>
		    <form action="manageCourse" class="p-5 form_course form_course_modifier" method="post" id="modifier_cours_<?= $course[$day][$hour]['id'] ?>">
					<div class="row">
						<div class="col s6 m6">
						<select name="type_dance" required>
							<option value="" disabled selected><?= $course[$day][$hour]['dance_name'] ?></option>
							<option value="solo">Solo </option>
							<option value="lindy_hop">Lindy Hop</option>
						</select>
						</div>

						<div class="col s6 m6">
						<select name="level" required>
							<option value="" disabled selected><?= $course[$day][$hour]['level'] ?></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						</div>

					<div class="row">
						<div class="col s6 m6">
							<input value="<?= ucfirst($course[$day][$hour]['day']) ?>" type="text" name="day" placeholder="Jour de la semaine" required>
						</div>
						<div class="col s6 m6">
							<input value="<?= $course[$day][$hour]['address'] ?>" type="text" name="address" placeholder="Lieu" required>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s6 m6">
							<label> Heure de début</label>
							<input value="<?= $course[$day][$hour]['start_time'] ?>" type="time" name="start_time" placeholder="Heure de début" required>
						</div>
						<div class="input-field col s6 m6">
							<label> Heure de fin</label>
							<input value="<?= $course[$day][$hour]['end_time'] ?>" type="time" name="end_time" placeholder="Heure de fin" required>
						</div>
					</div>

					<div class="row">
						<div class="col s8 m8 offset-m2">
							<textarea name="description" rows="8" cols="80" placeholder="Description du cours" required>
								<?php if ($course[$day][$hour]['description'] != NULL) {
									echo $course[$day][$hour]['description'];
								} ?>
							</textarea>
						</div>
					</div>
					<input type="hidden" name="id" value="<?= $course[$day][$hour]['id'] ?>">
					<button type="button" name="update_course"> Modifier </button>
					<button type="button" name="delete_course" class="delete_course">Supprimer</button>
		    </form>
			</div>

		<?php }elseif($_SESSION['admin'] == 0 AND $_SESSION['member'] == 1){ ?>
			<div id="modal_see_course<?= $course[$day][$hour]['id'] ?>" class="modal modal_courses">

				<h1> <?= $course[$day][$hour]['dance_name'] ?> </h1>
				 <form action="joinCourse" class="p-5 form_course" method="post" id="modifier_cours_<?= $course[$day][$hour]['id'] ?>">
					 <div class="row">
						 <div class="col s6 m6">
						 <select name="type_dance" disabled>
							 <option value="" disabled selected><?= $course[$day][$hour]['dance_name'] ?></option>
							 <option value="solo">Solo </option>
							 <option value="lindy_hop">Lindy Hop</option>
						 </select>
						 </div>

						 <div class="col s6 m6">
						 <select name="level" disabled>
							 <option value="" disabled selected><?= $course[$day][$hour]['level'] ?></option>
							 <option value="1">1</option>
							 <option value="2">2</option>
							 <option value="3">3</option>
						 </select>
						 </div>

					 <div class="row">
						 <div class="col s6 m6">
							 <input value="<?= ucfirst($course[$day][$hour]['day']) ?>" type="text" name="day" placeholder="Jour de la semaine" disabled>
						 </div>
						 <div class="col s6 m6">
							 <input value="<?= $course[$day][$hour]['address'] ?>" type="text" name="address" placeholder="Lieu" disabled>
						 </div>
					 </div>

					 <div class="row">
						 <div class="input-field col s6 m6">
							 <label> Heure de début</label>
							 <input value="<?= $course[$day][$hour]['start_time'] ?>" type="time" name="start_time" placeholder="Heure de début" disabled>
						 </div>
						 <div class="input-field col s6 m6">
							 <label> Heure de fin</label>
							 <input value="<?= $course[$day][$hour]['end_time'] ?>" type="time" name="end_time" placeholder="Heure de fin" disabled>
						 </div>
					 </div>

					 <div class="row">
						 <div class="col s8 m8 offset-m2">
							 <textarea name="description" rows="8" cols="80" placeholder="Description du cours"disabled>
								 <?php if ($course[$day][$hour]['description'] != NULL) {
									 echo $course[$day][$hour]['description'];
								 } ?>
							 </textarea>
						 </div>
					 </div>
					 <input type="hidden" name="id" value="<?= $course[$day][$hour]['id'] ?>">
					 <button type="submit" name="join_course_btn"> Rejoindre le cours </button>
				 </form>
			</div>
		</div>
	<?php }else{ ?>
		<div id="modal_see_course<?= $course[$day][$hour]['id'] ?>" class="modal">
			<h1> Inscription impossible </h1>
			<p>Vous devez être adhérent pour participer à nos cours.</p>
			<p><a href="<?= URL ?>members/adhesion"> C'est par ici ! </a></p>
		</div>
	<?php
		}
	}
}
?>
<?php include('profil_nav.php'); ?>

<h2 class="center-align h2_compte">Planning</h2>

<div class="row">
	<p class="center-align">Pour vous inscrire à un cours il suffit de cliquer sur l'un d'eux.</p>
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

<?php if($_SESSION['admin'] == 1): ?>
<p class="center-align"><a href="#modal_cours" class="modal-trigger" rel="modal:open"> Ajouter un cours </a></p>
<?php endif; ?>
<!-- Modal d'ajout de cours -->
<div id="modal_cours" class="modal modal_courses">
  <h1 class="center-align"> Ajouter un cours </h1>
    <form class="p-5 form_course center-align" action="<?= URL ?>administration/addCourse"  method="post">
			<div class="row">
				<div class="col s6 m6">
					<select name="type_dance">
						<option value="" disabled selected>Choisir le type de danse</option>
						<option value="solo">Solo </option>
						<option value="lindy_hop">Lindy Hop</option>
					</select>
				</div>

				<div class="col s6 m6">
					<select name="level">
						<option value="" disabled selected>Choisir le niveau du cours</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</div>

				<div class="row">
					<div class="col s6 m6">
						<input type="text" name="day" placeholder="Jour de la semaine" required>
					</div>
					<div class="col s6 m6">
						<input type="text" name="address" placeholder="Lieu">
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6 m6">
						<label> Heure de début</label>
						<input type="time" name="start_time" placeholder="Heure de début" required>
					</div>
					<div class="input-field col s6 m6">
						<label> Heure de fin</label>
						<input type="time" name="end_time" placeholder="Heure de fin" required>
					</div>
				</div>

				<div class="row">
					<div class="col s8 m8 offset-m2">
						<textarea name="description" rows="8" cols="80" placeholder="Description du cours"></textarea>
					</div>
				</div>

			<button type="submit" name="button"> Ajouter </button>
    </form>
	</div>
</div>
