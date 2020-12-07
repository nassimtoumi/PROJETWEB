<?php
include  "../model/forum.php";
include  "../controller/forumC.php";


	
		
	?>	
	
	
	
 
 <?php 
 if(isset($_POST['titre'])&&isset($_POST['Doc'])&&isset($_POST['image']))
 {if(!empty($_POST['titre'])&& !empty($_POST['Doc'])&& !empty($_POST['image']))
	 { $album= new forum(
$_POST['titre']
,$_POST['Doc'],

$forumc= new forumC();
$forumc->ajouterforum($forum);

	$forumC= new forumC();
$liste=$forumC->afficherforum();
header('Location:afficherForum.php');
	 }
 }


			
 
 ?>

