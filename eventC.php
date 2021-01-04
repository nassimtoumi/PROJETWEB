<?PHP
	include "../config.php";
	require_once '../Model/event.php';

	class eventC {
		
		function ajouterevent($event){
			$sql="INSERT INTO event (nom, date, Description) 
			VALUES (:nom,:date,:Description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $event->getNom(),
					'date' => $event->getdate(),
					'Description' => $event->getDescription()

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherevents(){
			
			$sql="SELECT * FROM event";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerevent($id){
			$sql="DELETE FROM event WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierevent($event, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE event SET 
						nom = :nom, 
						date = :date,
						Description = :Description
						
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $event->getNom(),
					'date' => $event->getdate(),
					'Description' => $event->getDescription(),
					
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererevent($id){
			$sql="SELECT * from event where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererevent1($id){
			$sql="SELECT * from event where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>