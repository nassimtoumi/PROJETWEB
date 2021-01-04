<?PHP
	include "../config.php";
	require_once '../Model/forum.php';
    require_once '../Model/reply.php';
	class ForumC {
		
		function afficherforum(){
			
			$sql="SELECT * FROM forum";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function ajouterforum($Forum){
			$sql="INSERT INTO forum (id_user,image,dat,text,nb_like)
			VALUES (:id_user,:image,:dat,:text,:nb_like)";
			$db = config::getConnexion();
			try{
				$req=$db->prepare($sql);
				$id_user=$forum->getid_user();
				$image=$Forum->getimage();
				$dat=$Forum->getdat();
                $text=$Forum->gettext();
                $nb_like=$Forum->getnb_like();
            $req->bindValue(':id_user',$id_user);	    
            $req->bindValue(':image',$image);
			$req->bindValue(':dat',$dat);			
			$req->bindValue(':text',$text);
			$req->bindValue(':nb_like',$nb_like);
			$req->execute();	
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}

			}
			function modifierforum($Forum){
			$sql="UPDATE forum SET id_user=:id_user ,image=:image, dat=:dat, id_replay=:id_replay ,text=:text ,nb_like=:nb_like whstatut";
			$db = config::getConnexion();
			try{
				$req=$db->prepare($sql);
				$id_statut=$Forum-statut();
				$id_user=$Forum->getid_user();
				$image=$Forum->getimage();
				$dat=$Forum->getdat();
				$id_replay=$Forum->getid_replay();
                $text=$Forum->gettext();
                $nb_like=$Forum->getnb_like();
				$req->bindValue(':id_statut',$id_statut);	
            $req->bindValue(':id_user',$id_user);	    
            $req->bindValue(':image',$image);
			$req->bindValue(':dat',$dat);			
			$req->bindValue(':id_replay',$id_replay);
			$req->bindValue(':text',$text);
			$req->bindValue(':nb_like',$nb_like);
			$req->execute();
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}		
		}
	
	////
		function recupererforum($id_statut){
			
			$sql="SELECT * FROM forum id_statut=".$id_statut."";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function supprimerforum($id_statut)
		{
          
         $sql="DELETE FROM forum id_statut=".$id_statut."";
            $db = config::getConnexion();
			try{
				$req=$db->prepare($sql);
				$req->bindValue(':id_statut',$id_statut);
			$req->execute();
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}		


		}

		function rechercherforum($image){
			
			$sql="SELECT * FROM forum where image='".$image."'";
			$db = config::getConnexion();
			try{
				$liste1 = $db->query($sql);
				return $liste1;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function participerevestatut($id_statut){
			$sql="UPDATE forum SET nb_like=nb_like+1 id_statut=".$id_statut."";
			$db = config::getConnexion();
			try{
				$req=$db->prepare($sql);

			$req->execute();
			}
			catch(Exception $e){
				die('Erreur:' .$e->getMessage());
			}		
		}
		
		
}
?>