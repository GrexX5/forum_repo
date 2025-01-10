<?php
session_start();
//bon let's gooo

require('action/dataBase.php');

if(isset($_POST['valide_log'])){
   //verifie si tous les champs ont été bien remplies
    if(!empty($_POST['log-email']) AND !empty($_POST['log-password'])){
        //sécurise les chaps pour éviter les injections
        $email = htmlspecialchars($_POST['log-email']);
        $password = htmlspecialchars($_POST['log-password']);
        
        //vérrifie si l'user existe déja par son nom

        $checkIfUserAllreadyExist = $bdd->prepare ('SELECT * FROM users WHERE email = ?');
        $checkIfUserAllreadyExist->execute(array($email));

        if($checkIfUserAllreadyExist->rowcount()>0){
            $userInfos = $checkIfUserAllreadyExist->fetch();

            if(password_verify($password , $userInfos['password'])){
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['user_id'];
                $_SESSION['name'] = $userInfos['username'];
                $_SESSION['email'] = $userInfos['email'];

                header('location:index.php');
            }else{ $errorMsg = "Mot de passe incorrect";}
        }else{ $errorMsg = "Auccun utilisateur de ce email trouveé";}
    }else{ $errorMsg = "Veuiler remplir tous les champs";}
}    