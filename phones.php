<?php
require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

// get phones
$sql = 'SELECT id, brand, name, price, stock FROM phones';
$stmt = $db->prepare($sql);
$stmt->execute();
$phones = $stmt->fetchAll();
?>

<div class="container content-wrapper">
  <a href="add_phone.php"><span class="oi oi-plus"></span></a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Brand</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($phones as $phone): ?>
        <tr class="<?= $phone['stock'] == '0' ? 'inactive' : '' ?>">
          <th scope="row"><?= $phone['id'] ?></th>
          <td><?= $phone['brand'] ?></td>
          <td><?= $phone['name'] ?></td>
          <td><?= $phone['price'] ?></td>
          <td><?= $phone['stock'] ?></td>
          <td>
            <a href="edit_phone.php?id=<?= $phone['id'] ?>"><span class="oi oi-pencil"></span></a>
            <a href="delete_phone.php?id=<?= $phone['id'] ?>"><span class="oi oi-delete"></span></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

<?= $footer ?>
