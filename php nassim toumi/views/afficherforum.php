<?php
include  "../model/article.php";
include  "../controller/articleC.php";
$articleC= new articleC();
$liste=$articleC->afficherarticle();

?>

<html>
 <head>
   <title></title>
   
   <link rel="stylesheet"
	href="../resources/assets/plugins/bootstrap/css/bootstrap.min.css" />
	
	<link rel="stylesheet" href="../resources/assets/css/main.css"/>
<link rel="stylesheet" href="../resources/assets/css/theme2.css"/>
 </head>
 <body>
 <div class="card-body">
                                <div class="table-responsive">
                                    
									</head>
									</body>

 <h2>MUSIC</h2>
 <form action="chercheralbum.php" method="post">
  <input type="text" name="rech" >
   <input class="btn btn-primary" type="submit" value="rechercher" >
</form>
 <?php
 $i=0;
 foreach($liste as $row){
	echo "<table >";
	//echo "<form action='supprimeralbum.php' method='post'>";
	echo "<tr>";
	echo "<td>";
	$i++ ; 
	echo "<Label > album: ",  $i ," </Label>";
	echo "</td>";

  echo "<td>";
	echo "<img src='",$row['image'], "' width='100'height='100' />";
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>";
	echo "<Label >",$row['prix'],"dt </Label>";
	echo "</td>";

	echo "<td>";
		echo "<a  href='supprimeralbum.php?sup=" , $row['idalbum'] , " '> supprimer </a>";
echo "<a  href='modifieralbum.php?sup=" , $row['idalbum'] , " '> update </a>";

	//echo "  <input class='btn btn-primary' type='submit' value='supprimer' >";
	echo "<input type='text' name='sup' value= " , $row['idalbum'] ," hidden >";
	echo "</td>";
 echo "</tr> ";
 //echo"</form>";
 echo "</table>" ;
 echo "<br>" ;
 echo"<br>";
 }

?>


 </html>
 
 
 
 
 
	
		
		<html>
 <head>
   <title></title>
   
   <link rel="stylesheet"
	href="../resources/assets/plugins/bootstrap/css/bootstrap.min.css" />
	
	<link rel="stylesheet" href="../resources/assets/css/main.css"/>
<link rel="stylesheet" href="../resources/assets/css/theme2.css"/>
 </head>
 <body class="font-montserrat">
 


<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">NEW ALBUM</h3>
                            </div>
                            <div class="card-body">
                                
                                <div class="form-group">
                                   
								   <form action="" method="post">
  
       <Label class="form-label" >title: </Label> 
        <input class="form-control" type="text" name="titre">
        <br>
        <Label class="form-label" >price: </Label> 
        <input type="text" name="prix" class="form-control">
        <br>
	
       <Label class="form-label" >image: </Label> 
      <input type="file" id="img" name="image" accept="image/png, image/jpeg" >
        <br>
     
  <input class="btn btn-primary" type="submit" value="Ajouter" >
   
</form>
								   
                                </div>
								
                                
                            </div>
                        </div>
					 </div>
			    </div>
			 </div>
</div>
 </body>
 </html>
 
 <?php 
 
if(isset($_POST['titre'])&&isset($_POST['prix'])&&isset($_POST['image']))
 {if(!empty($_POST['titre'])&& !empty($_POST['prix'])&& !empty($_POST['image']))
	 { $album= new Album(
$_POST['titre']
,$_POST['prix'],
$_POST['image']);
$articlec= new articleC();
$articlec->ajouterarticle($article);

	$articleC= new articleC();
$liste=$articleC->afficherarticle();
header('Location:afficherarticle.php');
	 }
 }
			
 
 ?>