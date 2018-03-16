<?php
include_once("config.php");
$uname = $_POST['uname'];
$upass = $_POST['upass'];

$query = "SELECT id_user,username,password FROM user WHERE username=:uname AND password:upass";
$stmt = $kon->prepare($query);
$stmt->bindParam(":uname",$uname);
$stmt->bindParam(":upass",$upass);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if ($stmt->rowCount() == 1) { // AND password_verify($upass,$data['password'])
session_start();
	$_SESSION['uid'] = $data['id_user']; 	
	$_SESSION['nama'] = $data['usernmae'];
	header("location:../../index.php");
}else{
	header("location:../../index.php?kanal=masuk");
}			
?>