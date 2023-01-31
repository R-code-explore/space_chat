<?php

//Verification de l'envois du form

if(!empty($_POST)){
    //Verification du remplissage des champs
    if(isset($_POST["name"], $_POST["password"])
    && !empty($_POST["name"]) && !empty($_POST["password"])
    ){
        //Formulaire complet

        //protection données
        $nom = strip_tags($_POST["name"]);
        
        //Hash du mdp
        $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);
        $role = "user";

        //Enregistrement de BD

        require_once './connect.php';

        $sql = "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, :name, '$pass')";

        $query = $db->prepare($sql);

        $query->bindValue(":name", $nom, PDO::PARAM_STR);

        $query->execute();

        header('Location: ./login.php');

    }else{
        die("formulaire incomplet");
    }
}