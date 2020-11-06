<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9a44ab6cf.js" crossorigin="anonymous"></script>

    <?php include('includes/liens_css.php'); ?>
  </head>

  <body>
    <?php include("includes/header.php"); ?>
    <div class="img_header">
      <section class="img_index"></section>
    </div>
    <main>
      <h1 class="h1_margin_bottom"> Mon compte </h1>

      <nav>
        <ul class="liste_compte">
          <li><a class="a_compte" href="mon_profil.php"> Mes informations </a></li>
          <li><a class="a_compte" href="adhesion.php"> S'inscrire à un cours </a></li>
          <li><a class="a_compte" href="planning.php"> Voir le planning </a></li>
          <li><a class="a_compte" href="mes_cours.php"> Mes demandes en attente </a></li>
          <li><a class="a_compte" href="historique_paiements.php"> Mes paiements </a></li>
        </ul>
      </nav>

      <h2 class="h2_compte">Agenda des cours</h2>

      <table>
  			<thead>
  				<tr>
  					<th> </th>
    					<th scope="col"> Lundi </th>
    					<th scope="col"> Mardi </th>
    					<th scope="col"> Mercredi </th>
    					<th scope="col"> Jeudi </th>

  				</tr>
  			</thead>

  			<tbody>
  				<tr>
  					<th scope="row"> 9h </th>
    					<td>  </td>
    					<td>  </td>
    					<td>  </td>
    					<td>  </td>
  				</tr>
  				<tr>
  					<th scope="row"> 10h </th>
    					<td>  </td>
    					<td> </td>
    					<td>  </td>
              <td>  </td>

  				</tr>
  				<tr>
  					<th scope="row"> 11h </th>
    					<td> </td>
    					<td></td>
    					<td>  </td>
              <td>  </td>
  				</tr>
  				<tr>
  					<th scope="row"> 12h </th>
    					<td class="pause_dejeuner" rowspan="2" colspan="4">  </td>
  				</tr>
  				<tr>
  					<th scope="row"> 13h </th>
  				</tr>
  				<tr>
  					<th scope="row"> 14h </th>
    					<td>  </td>
    					<td> </td>
    					<td>  </td>
    					<td>  </td>
  				</tr>
  				<tr>
  					<th scope="row"> 15h </th>
            <td>  </td>
            <td> </td>
            <td>  </td>
            <td>  </td>

  				</tr>
  				<tr>
  					<th scope="row"> 16h </th>
            <td>  </td>
            <td> </td>
            <td>  </td>
            <td>  </td>

  				</tr>
  				<tr>
  					<th scope="row"> 17h </th>
            <td>  </td>
            <td> </td>
            <td>  </td>
            <td>  </td>

  				</tr>
  				<tr>
  					<th scope="row"> 18h </th>
            <td>  </td>
            <td> </td>
            <td>  </td>
            <td>  </td>

  				</tr>
  			</tbody>
  		</table>
  		<a href="#"> Ajouter un cours</a>

    </main>
  </body>
</html>
