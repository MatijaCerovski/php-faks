<?php
require_once 'head.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') {

  if(!isset($_POST['email'])) {
    die('email not set');
  }

  $id = $_POST['id'];
  $email = $_POST['email'];
  $firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];

  $sql = 'UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name WHERE id = :id';

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':first_name', $firstName);
  $stmt->bindParam(':last_name', $lastName);
  $stmt->execute();

  header('Location: index.php');
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
	die('no user id');
}

$id = $_GET['id'];

// get users
$sql = 'SELECT id, email, first_name, last_name FROM users WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch();

?>



<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Add user</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="edit.php" autocomplete="off">
                <div class="form-group">
                  <input type="hidden"  value="<?= $user['id'] ?>" name="id" />
                  <label for="email">Email</label>
                  <input type="email" class="form-control form-control-lg rounded-0" name="email"
                  id="email" required="" value="<?= $user['email'] ?>">
                </div>
                <div class="form-group">
                  <label for="first-name">First name</label>
                  <input type="text" name="first-name"
                  class="form-control form-control-lg rounded-0" id="first-name" value="<?= $user['first_name'] ?>">
                </div>
                <div class="form-group">
                  <label for="last-name">Last name</label>
                  <input type="text" name="last-name"
                  class="form-control form-control-lg rounded-0" id="last-name" value="<?= $user['last_name'] ?>">
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