<?php 
include "../Controller/forumC.php";
require_once '../Model/forum.php';
$id_statut=$_GET['id_statut'];
$forumc = new forumC();
$forumc->supprimerforum($id_statut);
header('location:afficherforum.php');
?>