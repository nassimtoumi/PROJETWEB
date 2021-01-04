<?php
	class event{
		private $id =null;
        private $nom =null;
        private $date=null;
        private $Description=null;
   
		
		public function __construct($nom,$date, $Description){
            $this->nom=$nom;
            $this->date=$date;
		$this->Description=$Description;                                     }
           
		public function getid(){
			return $this->id;
        }
        
		public function getNom(){
			return $this->nom;
		}
		public function getdate(){
			return $this->date;
		}
        public function getDescription(){
			return $this->Description;
		}
       

        public function setId($id){
			$this->id=$id;
		}
		public function setNom($nom){
			$this->nom=$nom;
		}
		public function setdate($date){
			$this->date=$date;
        }
        public function setDescription($Description){
			$this->Description=$Description;
        }
        
       
}

?>