<?php

include  "../model/Forum.php";
include  "../controller/ForumC.php";
	$idalbum=$_GET['sup'];

	
	$ForumC= new ForumC();
	$Forum=$ForumC->recupererForum($idForum);
	?>
	
	<?php
	foreach($article as $row){
	
		echo " <form action='recuperer.php' method='post'> ";
  echo " <input type='text' name='id' value=",$row['idalbum'],"  >";
   echo "    <Label class='form-label' >TITRE:</Label> ";
      

	  echo " <input class='form-control' type='text' name='titre' value=",$row['titre'],">";
      
	  
	   
	   
       
   echo " <Label class='form-label' >PRICE: </Label> ";
       echo " <input  type='text'class='form-control' name='prix' value=",$row['prix'],">";
      


	
	
      echo "  <Label class='form-label' >image: </Label> ";
    echo "   <input type='file' id='img' name='image' accept='image/png, image/jpeg' value=",$row['image']," >";
       echo "  <br>";
     
   echo " <input class='btn btn-primary' type='submit' value='modifier' >";
   echo " <input  class='btn btn-primary' type='reset' value='Annuler'>";
   
echo "</form>";

	}
	?>
	</body>
		</html>