
<?php

class config {
    private static $pdo = NULL;

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try{
          self::$pdo = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
          
        }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
        }
      }
      return self::$pdo;
    }
  }

	class UtilisateurC
	{
		
		function ajouterUtilisateur($users){
			$db = config::getConnexion();
			$sql = "INSERT INTO utilisateur (username,email,password,role) VALUES (:username,:email,:password,:role)";
			try {
				$req = $db->prepare($sql);
			$req->bindValue(':username',$users->getUsername());
			$req->bindValue(':email',$users->getEmail());
			$req->bindValue(':password',$users->getPassword());
			$req->bindValue(':role',$users->getRole());

			$req->execute();
		}
		catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			

		}

		function afficherusers(){
			$db = config::getConnexion();
			$sql="SELECT * FROM utilisateur ";
			$liste=$db->query($sql);
			return $liste;
			
		}

		function supprimerusers($id){
			$db = config::getConnexion();
			$sql="DELETE FROM utilisateur where id_user= :id";
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
	        $req->execute();
	        
		}

		function modifierusers($users,$id){
			$db = config::getConnexion();
			
			$sql="UPDATE utilisateur SET username=:username,email:email,password=:password, role=:role WHERE id_user=:id";
			try{
				$req=$db->prepare($sql);
                $req->bindValue(':id',$id);
                $req->bindValue(':username',$users->getUsername());
                $req->bindValue(':email',$users->getEmail());
				$req->bindValue(':password',$users->getPassword());
				$req->bindValue(':role',$users->getRole());
				
			
				$s=$req->execute();
			}
			catch(Exception $e){
				echo("Erreur".$e->getMessage());
			}

		}

		function recuperer_users($id){
			
			$sql="SELECT * FROM utilisateur WHERE id_user=$id";
			$db = config::getConnexion();
			try{
				$req=$db->prepare($sql);
				$req->execute();
				
				$users = $req->fetch();
				return $users;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function connexionUser($email,$password){
            $sql="SELECT * FROM Utilisateur WHERE Email='" . $email . "' and Password = '". $password."'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    $message = $x['role'];
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }

	}

  ?>