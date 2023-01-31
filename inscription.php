<?php
session_start();
if(isset($_SESSION["user"])){
    header('Location: chat.php');
    exit;
}
?>

<h1>Inscription au space_chat</h1>

<form action="./singin_confirm.php" method="post">
    <input type="text" name="name" id="name" placeholder="Un username juste là" required>
    <input type="password" name="password" id="password" required>

    <button type="submit">S'inscrire</button>
</form>