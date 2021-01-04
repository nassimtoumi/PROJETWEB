<?PHP
	
     if (!isset(self::$pdo)) {
		try{
        self::$pdo = new PDO('mysql:host=localhost;dbname=teest', 'root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
		self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
	$utilisateurC=new UtilisateurC();
	$listeUsers=$utilisateurC->afficherUtilisateurs();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="wusernameth=device-wusernameth, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		<button><a href="connexion.php">Ajouter un Utilisateur</a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>username</th>
				<th>first_name</th>
				<th>last_name</th>
				<th>Email</th>
				<th>day_of_birth</th>
				<th>phone_number</th>
				<th>country</th>
				<th>picture</th>
				<th>password</th>
				
			</tr>

			<?PHP
				foreach($listeUsers as $user){
			?>
				<tr>
					<td><?PHP echo $user['username']; ?></td>
					<td><?PHP echo $user['first_name']; ?></td>
					<td><?PHP echo $user['last_name']; ?></td>
					<td><?PHP echo $user['email']; ?></td>
					<td><?PHP echo $user['day_of_birth']; ?></td>
					<td><?PHP echo $user['phone_number']; ?></td>
					<td><?PHP echo $user['country']; ?></td>
					<td><?PHP echo $user['picture']; ?></td>
					<td><?PHP echo $user['password']; ?></td>
				
					<td>
						<form method="POST" action="supprimerUtilisateur.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $user['id_user']; ?> name="id_user">
					
						</form>
					</td>
					<td>
						<a href="modifierUtilisateur.php ?id_user=<?PHP echo $user['id_user']; ?>"> Modifier </a>
					</td>
					<td>

					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
