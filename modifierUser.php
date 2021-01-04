<?php
    include "../controller/eventC.php";
    include_once '../Model/event.php';

	$eventC = new eventC();
	$error = "";

	if (
        isset($_POST["nom"]) && 
        isset($_POST["date"]) &&
        isset($_POST["Description"])
    ){
		if (
            !empty($_POST["nom"]) && 
            !empty($_POST["date"]) && 
            !empty($_POST["Description"])
        ) {
            $user = new event(
                $_POST['nom'],
                $_POST['date'], 
                $_POST['Description']
               
            );
            
            $eventC->modifierevent($user, $_GET['id']);
            //header('Location:afficherevents.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier event</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="afficherevents.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['id'])){
				$user = $eventC->recupererevent1($_GET['id']);
				
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td rowspan='3' colspan='1'>Fiche Personnelle</td>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20" value = "<?php echo $user->Nom; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date:
                        </label>
                    </td>
                    <td><input type="text" name="date" id="date" maxlength="20" value = "<?php echo $user->date; ?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="Description">Description:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Description" id="Description"  value = "<?php echo $user->Description; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
	</body>
</html>