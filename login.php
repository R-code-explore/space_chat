<?php
session_start();
if(isset($_SESSION["user"])){
    header('Location: chat.php');
    exit;
}
?>

<h1>Connexion</h1>

<form action="./login_confirm.php" method="post">
	<input type="text" name="name" id="username" placeholder="Username ici" required>
	<input type="password" name="password" id="password" placeholder="mot de passe" required>

    <button type="submit">Se connecter</button>
</form>