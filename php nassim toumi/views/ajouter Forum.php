<?php
    include "../Model/forum.php";
    include "../Controller/forumC.php";

    $error = "";

    // create event
    $forum= null;
    $forumC = new forumC();
   if (isset($_POST["ajout"]))
     {
       
        $forum= new forum($_POST['id_user'],$_POST['image'],$_POST['dat'], $_POST['text'],$_POST['nb_like']);
            $forumC->ajouterforum($forum);
            //header('Location:afficher forum.php');
        
        var_dump($forum);
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Display</title>
</head>
    <body>
        <button><a href="afficher forum.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
               <Label>id_user: </Label>
        <br>
          <input type="number" step="1" name="id_user" >
        <br>
             <Label>image: </Label>
             <br>
        <input type="file" name="image" >
        <br>
       <Label>dat: </Label> 
       <br>
        <input type="date" name="dat" >
        <br>
        <Label>text: </Label> 
        <br>
        <input type="text" name="text">
        <br>
        <Label>nb_like: </Label>
        <input type="text" name="nb_like" >
        <br>
      
       
  <input type="submit" name="ajout" value="Envoyer" >
        </form>
    </body>
</html>