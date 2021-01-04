<?PHP
	include "../config.php";
	require_once 'participe1.php';

	class participe {
		
		function ajouteparticipe($participe){
			$sql="INSERT INTO participant (name, Prenom, birthday,gender,email,phone) 
			VALUES (:name, :Prenom, :birthday,:gender,:email,:phone)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'name' => $participe->getname(),
					'Prenom' => $participe->getPrenom(),
					'birthday' => $participe->getbirthday(),
					'gender' => $participe->getgender(),
					'email' => $participe->getemail(),
					'phone' => $participe->getphone()

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
	}
	?>