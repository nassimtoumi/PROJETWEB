<?php
include "../Model/event.php";
include "../controller/eventC.php";
$error = "";
$id_statut=$_GET['id_statut'];
    // create user
    $event = null;
    $eventc=new forumC();
    $event1=$eventc->recupererevent($id_statut);
    // create an instance of the controller Mohamed Ali mohamed.ali@esprit.tn med med
    $id_user,$image,$dat, $text,$nb_like
   
    if (isset($_POST["modif"])) {
        foreach ($event1 as $row)  
{
           $event = new forum($_POST['id_user'],$_POST['image'],$_POST['dat'], $_POST['text'],$row['nb_like']);}
             $event->setid_statut($id_statut);
            $eventc->modifierevent($event);
            header('Location:afficherforum.php');
       
    }

    
?>
<?php
foreach ($event1 as $row)  
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>event Display</title>
</head>
    <body>
        <button><a href="afficherforum.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
               <Label>id_user: </Label>
        <br>
          <input type="number" step="1" name="id_user" value="<?php echo $row['id_user'];?>">
        <br>
             <Label>Title: </Label>
             <br>
        <input type="text" name="image" value="<?php echo $row['image'];?>">
        <br>
       <Label>dat: </Label> 
       <br>
        <input type="date" name="dat" value="<?php echo $row['dat'];?>" >
        <br>
        <Label>text: </Label> 
        <img src="<?PHP echo $row['text']; ?>"width="70" height="70">
        <br>
        <input type="file" name="text">
        <br>
      
       
  <input type="submit" name="modif" value="Envoyer" >
        </form>
    </body>
</html>
<?php
}
?>