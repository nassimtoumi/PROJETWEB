<?php
	class forum{
		private $id_statut;
        private $id_user;
        private $image;
        private $dat;
        private $text;
        private $nb_like;
		public function __construct($id_user,$image,$dat, $text,$nb_like){
            $this->id_user=$id_user;
            $this->image=$image;
            $this->dat=$dat;
            $this->text=$text;
            $this->nb_like=$nb_like;
        }

        public function getid_statut(){
            return $this->id_statut;
        }
        public function getid_user(){
            return $this->id_user;
        }
        public function getimage(){
            return $this->image;
        }
        public function getdat(){
            return $this->dat;
        }
        public function gettext(){
            return $this->text;
        }
        public function getnb_like(){
            return $this->nb_like;
        }


        public function setid_statut($id_statut){
            $this->id_statut=$id_statut;
        }

        public function setid_user($id_user){
            $this->id_user=$id_user;
        }
        public function setimage($image){
            $this->image=$image;
        }
        public function setdat($dat){
            $this->dat=$dat;
        }
        public function settext($text){
            $this->text=$text;
        }
        public function setnb_like($nb_like){
            $this->nb_like=$nb_like;
        }
}

?>