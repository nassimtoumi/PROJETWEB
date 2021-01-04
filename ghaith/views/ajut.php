<?php
include_once '../model/Utilisateur.php';
include_once '../controller/UtilisateurC.php';



$error = "";

// create user
$user = null;

// create an instance of the controller
$userC = new UtilisateurC();

        $user = new Utilisateur(
            $_POST['username'],
            $_POST['email'],
            $_POST['password'],
            $_POST['role']
        );
        $userC->ajouterUtilisateur($user);
     
        


         
session_start();

$message="";
$userC = new UtilisateurC();





       
         $_SESSION['e'] = $_POST["email"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur




       
        
          header('Location:../../me/views/ajouterabonnement2.php');
        
    




        
 


?>