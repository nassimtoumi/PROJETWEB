<?php
 class Album {
     private $idarticle;
      private $titre;
	 private $doc;
	 private $image;
	 
 
    public function __construct($titre,$doc,$image){
		
		
		$this->titre=$titre;
		$this->doc=$doc;
		$this->image=$image;
		
		
		}
		
		
 
      
		public function setId($idarticle)
		{
			$this->idarticle=$idarticle;
		}
		
		public function setTitre($titre)
		{
			$this->titre=$titre;
		}
		
		public function setPrix($doc)
		{
			$this->doc=$doc;
		}
		
		public function setImage($image)
		{
			$this->image=$image;
		}
		
		
	
 
		public function getId(){
			return $this->idarticle;
		}
	
		public function getTitre(){
			return $this->titre;
		}
		public function getDoc(){
			return $this->doc;
		}
		public function getImage(){
			return $this->image;
		}
		
	
	
}

?>