<?php
include "../Controller/forumC.php";
$forumc=new forumC();
$listeforum=$forumc->afficherforum();
   
?>
<style>
<?php
include ('style/styleindex.css');
include ('style/stylepublication.css');
?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sporthub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</head>

<body>

    <hr>
		<button><a href="ajouter forum.php">Ajouter un forum</a></button>
<hr>

			<?PHP
			    $i=0;
				foreach($listeforum as $forum){
					$i++;
			?>      <div>
			        <?PHP echo "forum".$i;?>
					<img src="<?PHP echo $forum['image']; ?>"width="70" height="70">
					<br>
					<?PHP echo $forum['text']; ?>
					<?PHP echo $forum['dat']; ?>

						<a href="supprimerforum.php?id_statut=<?PHP echo $forum['id_statut']; ?>"> Supprimer </a>
						<a href="modifierforum.php?id_statut=<?PHP echo $forum['id_statut']; ?> "> Modifier </a>
						<br><form method="GET" action="modifierUtilisateur.php">
						<input type="hidden" value=1 name="id">
						<button type="submit"><a href="participerforum.php?id_statut=<?PHP echo $forum['id_statut']; ?>">participer</a></button>
						</form>
				</div>
			<?PHP
				}
			?>
		
	</body>
</html>