<?php
require_once 'head.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!isset($_POST['brand']) || !isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['stock'])) {
        die('brand or name or price or stock not set');
    }

    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = 'INSERT INTO phones (brand, name, price, stock) VALUES
            (:brand, :name, :price, :stock)';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->execute();

    header('Location: phones.php');
    die;
}


echo $head;
echo $header;
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Add phone</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="add_phone.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden" name="id" />
                  <label for="brand">Brand</label>
                  <input type="text" class="form-control form-control-lg rounded-0" name="brand"
                         id="brand" required="">
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name"
                         class="form-control form-control-lg rounded-0" id="name" required="">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" name="price" min="0" 
                         class="form-control form-control-lg rounded-0" id="price" required="">
                </div>
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="number" name="stock" min="0" 
                         class="form-control form-control-lg rounded-0" id="stock">
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