<?php
require_once 'head.php';

$url = 'http://taco-randomizer.herokuapp.com/random/';

$data = file_get_contents($url);
$data = json_decode($data, true);

echo $head;
echo $header;

?>

<div class="container content-wrapper">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data as $key => $value): ?>
        <tr class="<?= $phone['stock'] == '0' ? 'inactive' : '' ?>">
          <td><?= $value['name'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

<?= $footer ?>
