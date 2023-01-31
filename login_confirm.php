<?php

if(!empty($_POST)){
    if(isset($_POST["name"], $_POST["password"])
    && !empty($_POST["name"] && !empty($_POST["password"]))
    ){
        
        //Connexion a la db
        require_once './connect.php';

        $sql = "SELECT * FROM `users` WHERE `username` = :name";

        $query = $db->prepare($sql);

        $query->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
        
        $query->execute();

        $user = $query->fetch();

        if(!$user){
            die("Utilisateur inexistant");
        }
        
        //user existant, verification mot de passe

        if(!password_verify($_POST["password"], $user["password"])){
            die("mot de passe incorrect");
        }else{
            echo "ok";
        }

        //User et mot de passe corrects
        //Ouverture de session PHP

        session_start();
        //Stock dans $_SESSION les infos users
        
        $_SESSION["user"] = [
            "id" => $user["id"],
            "username" => $user["username"]
        ];

        //redirection vers page compte

        header('Location: ./chat.php');

    }
}

?>