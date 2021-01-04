<?php
    include_once '../Model/event.php';
    include_once 'eventC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new eventC();
    if (
        isset($_POST["nom"]) && 
        isset($_POST["date"]) &&
        isset($_POST["description"])
    ) {
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["date"]) && 
            !empty($_POST["description"])
        ) {
            $user = new event($_POST['nom'], $_POST['date'],  $_POST['description']);
            $userC->ajouterevent($user);
            header('Location:afficherevent.php');
        }
        else
            $error = "Missing information";
    

    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherevents.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">

                <tr>
                    <td rowspan='3' colspan='1'>Les evenements</td>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date:
                        </label>
                    </td>
                    <td><input type="text" name="date" id="date" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="description">Description:
                        </label>
                    </td>
					 <td><input type="text" name="description" id="date" maxlength="20"></td>
                    
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>