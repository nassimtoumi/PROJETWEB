<?php 
include "../config.php";
class forumC{
public function afficherforum(){
			$sql="SELECT * From forum";
			$db=config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste;
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}
			
}

public function ajouterforum($article){
			$sql="insert into atelierbonus(titre,desc) values(:titre,desc)";
			$db=config::getConnexion();
			try{
			$req=$db->prepare($sql);
			
			$titre=$album->getTitre();
			$desc=$album->getDesc();
			
			
			$req->bindValue(':titre',$titre);
			$req->bindValue(':desc',$desc);
			$req->execute();
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}
			
}

 public function spprimerforum($idforum){
			$sql="DELETE FROM  form where idforum=:idforum";
			$db=config::getConnexion();
			try{
			$req=$db->prepare($sql);
			$req->bindValue(':idforum',$idforum);
			$req->execute();
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}
			
			
	
}
public function updateforum($forum)
			{
			$sql="UPDATE atelierbonus SET titre=:titre,Doc=:doc,image=:image where idarticle=".$article->getId() ." ";
			$db=config::getConnexion();
			try{
			$req=$db->prepare($sql);
			$idforum=$forum->getId();
			$titre=$forum->getforum();
			$desc=$forum->getdesc();
			
			
		  $req->bindValue(':titre',$titre);
			$req->bindValue(':desc',$desc);
			
			$req->execute();
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}
		
}
public function recupererforum($id){
			$sql="SELECT * From form where idforum=".$id."";
			$db=config::getConnexion();
			try{
				
			$liste=$db->query($sql);
			return $liste;
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}
			
}
public function chercherforum($titre){
			$sql="SELECT * From form where titre='".$titre."' ";
			$db=config::getConnexion();
			try{
				
			$liste=$db->query($sql);
			return $liste;
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}
			
}
}
?>