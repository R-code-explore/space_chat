<?php

session_start();
if(!isset($_SESSION["user"])){
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
	<h1>Connexion OK</h1>

	<form action="./logout.php" method="post">
	<button type="submit">Logout</button>
	</form>

	<?php
$sqlMessage = "SELECT * FROM messages";

require_once 'connect.php';

$query = $db->prepare($sqlMessage);
$query -> execute();
$messages = $query->fetchAll();

?>

<?php foreach($messages as $message): ?>

<div class="message">
	<p class="username"><strong><?=$message["username"]?></strong></p>
	<p class="mess"><?=$message["message"]?></p>
</div>

<?php endforeach;?>
<style>
	.message{display:flex;}
	.message .mess{margin-left:10px;}
</style>

</body>
</html>