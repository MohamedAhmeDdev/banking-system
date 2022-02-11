<?php
require "./db.php";

$id = $_POST['id'] ??null;
if(!$id){
    header('location:account.php');
    exit;
}

$statement = $pdo->prepare("DELETE FROM accounts WHERE accountID= :id");
$statement->bindValue(":id", $id);
$statement->execute();
header("location:account.php");
?> 