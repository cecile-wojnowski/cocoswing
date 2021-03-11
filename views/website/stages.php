<div class="container">
<?php //var_dump($stages); ?>
  <ul>
    <?php foreach($stages as $data){

      echo "<li>" . " - " . $data['start_date'] . " " . $data['name'] . "</li>";

    }?>
  <ul>

</div>
