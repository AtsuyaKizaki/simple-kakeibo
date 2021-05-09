<?php

require_once(__DIR__ . '/dbconnect.php');
require_once(__DIR__ . '/functions.php');
ini_set( 'display_errors', 1 );

//選択されたidを取得
$id = $_GET['id'];

$sql = "DELETE FROM records WHERE id = :id ";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id , PDO::PARAM_INT);

$stmt->execute();

header('Location: ./index.php');
exit;

?>