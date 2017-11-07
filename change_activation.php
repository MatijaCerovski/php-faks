<?php
require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

if(!isset($_GET['id'])){
	die('no user id');
}



$id = $_GET['id'];

$currentLoggedInId = $_SESSION['user']['id'];

if($currentLoggedInId === $id) {
	die('you can not block yourself');
}


// get users
$sql = 'SELECT is_active FROM users WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$users = $stmt->fetch();

$isActive = $users['is_active'] === '1' ? '0' : '1';


$sql = 'UPDATE users SET is_active = :is_active WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':is_active', $isActive);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: index.php');
die;
?>