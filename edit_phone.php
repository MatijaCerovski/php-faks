<?php
require_once 'head.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!isset($_POST['id']) || !isset($_POST['brand']) || !isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['stock'])) {
        die('id or brand or name or price or stock not set');
    }

    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = 'UPDATE phones SET brand = :brand, name = :name, price = :price, stock = :stock WHERE id = :id';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->execute();

    header('Location: phones.php');
    die;
}

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

if(!isset($_GET['id'])){
  die('no phone id');
}

$id = $_GET['id'];

// get users
$sql = 'SELECT id, brand, name, price, stock FROM phones WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$phone = $stmt->fetch();

?>



<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Add user</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="edit_phone.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden"  value="<?= $phone['id'] ?>" name="id" />
                  <label for="brand">Brand</label>
                  <input type="text" class="form-control form-control-lg rounded-0" name="brand"
                         id="brand" required="" value="<?= $phone['brand'] ?>">
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name"
                         class="form-control form-control-lg rounded-0" id="name" value="<?= $phone['name'] ?>">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" name="price" min="0"
                         class="form-control form-control-lg rounded-0" id="price" value="<?= $phone['price'] ?>">
                </div>
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="number" name="stock" min="0"
                         class="form-control form-control-lg rounded-0" id="stock" value="<?= $phone['stock'] ?>">
                </div>
                <button type="submit" class="btn btn-success float-right">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
