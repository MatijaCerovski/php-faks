<?php
require_once 'head.php';
if(!isset($_GET['id'])) {
  die('there is no ID parameter');
}

$id = (int)$_GET['id'];

$sql = 'DELETE FROM phones WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: phones.php');
die();
