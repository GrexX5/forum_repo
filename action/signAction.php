<?php
//bon let's gooo

require('action/dataBase.php');

if(isset($_POST['valide_sign'])){
   //verifie si tous les champs ont été bien remplies
    if(!empty($_POST['sign-name']) AND !empty($_POST['sign-email']) AND !empty($_POST['sign-password'])){
        //sécurise les chaps pour éviter les injections
        $name = htmlspecialchars($_POST['sign-name']);
        $email = htmlspecialchars($_POST['sign-email']);
        $password = password_hash($_POST['sign-password'], PASSWORD_DEFAULT);
        
        //vérrifie si l'user existe déja par son nom

        $checkIfUseerAllreadyExist = $bdd->prepare ('SELECT username, email FROM users WHERE username = ? AND email = ?');
        $checkIfUseerAllreadyExist->execute(array($name, $email));

        $chechIfEmailAlreadyExist = $bdd->prepare ('SELECT email FROM users WHERE email = ?');
        $chechIfEmailAlreadyExist->execute([$email]);

        //sinon l'inserer

        if($checkIfUseerAllreadyExist->rowcount() == 0 AND $chechIfEmailAlreadyExist->rowcount() == 0){
            $insertUserInDB = $bdd->prepare ('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
            $insertUserInDB->execute( array($name, $email, $password));

            //Reccupère les infos de l'user pour l'authentifier

            // $getUserInfo = $bdd->prepare ('SELECT user_id, username, email FROM users WHERE username = ? AND email = ?');
            // $getUserInfo->execute(array($name, $email));
            // $userInfo = $getUserInfo->fetch();
            
            //authentification

            // $_SESSION['auth'] = true;
            // $_SESSION['id'] = $userInfo['user_id'];
            // $_SESSION['name'] = $userInfo['username'];
            // $_SESSION['email'] = $userInfo['email'];


        }else{
            $errorMsg = "Cet utilisateur existe deja";
        }
     
    }else{
        $errorMsg = "Veuiller remplir tous les champs";
    }
}