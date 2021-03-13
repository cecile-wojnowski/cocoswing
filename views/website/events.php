<div class="container">
  <section class="actu_fb">
    <p class="center-align"> Voir notre page Facebook <a class="blue_link" href="https://www.facebook.com/cocoswingmarseille/">Coco Swing Marseille</a>. </p>
    <table class="centered highlight">
      <thead>
        <th>Date</th>
        <th>Evénement</th>
        <th>Lieu</th>
      </thead>

      <tbody>
        <?php
        for($i = 0; $i < 5 ; $i++) { ?>
          <tr>
            <td>
              <?php
              if(!empty($events[$i]['start_time'])){
                echo "Le " . $events[$i]['start_time'];
              }
              if(!empty($events[$i]['end_time'])){
                echo " jusqu'à ". $events[$i]['end_time'];
              }
               ?>
            </td>
            <td><?= $events[$i]['name'] ?></td>
            <td><?= $events[$i]['place']['name'] ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </section>
</div>
