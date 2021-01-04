<?php
	class participe1{
		
        private $name =null;
        private $Prename=null;
        private $birthday=null;
		  private $gender=null;
		    private $email=null;
			  private $phone=null;
   
		
		public function __construct($name,$Prenom, $birthday,$gender,$email,$phone){
            $this->name=$name;
            $this->Prenom=$Prenom;
		$this->birthday=$birthday;  
$this->gender=$gender;
$this->email=$email;
$this->phone=$phone;
}
           
		
        
		public function getname(){
			return $this->name;
		}
		public function getPrenom(){
			return $this->Prenom;
		}
        public function getbirthday(){
			return $this->birthday;
		}
		public function getgender(){
			return $this->gender;
		}
		public function getemail(){
			return $this->email;
		}
		public function getphone(){
			return $this->phone;
		}
       

    
		public function setname($name){
			$this->name=$name;
		}
		public function setPrenom($Prenom){
			$this->Prenom=$Prenom;
        }
        public function setbirthday($birthday){
			$this->birthday=$birthday;
        }
		public function setgender($gender){
			$this->gender=$gender;
        }
		
		public function setemail($email){
			$this->email=$email;
        }
		public function setphone($phone){
			$this->phone=$phone;
        }
        
	}


?>