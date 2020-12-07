<?php
include  "../model/Forum.php";
include  "../controller/ForumC.php"; 
$idForum=$_GET['sup'];

$Forumc= new ForumC();
$Forumc->spprimerForum($idForum);


	header('Location:afficherForum.php');

?>