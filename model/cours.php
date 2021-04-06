<?php
    class Cours{
        //attributs :
        protected $id_cour;
        protected $nom_cour;
        protected $date_cour;
        protected $id_crenaux;
        protected $id_user;
        protected $id_session;

        //constucteur :
        public function __construct($nom_cour, $date_cour, $id_crenaux)
        {   $this->nom_cour = $nom_cour;
            $this->date_cour = $date_cour;
            $this->id_crenaux= $id_crenaux;          
        }
        /*-----------------------------------------------------
                Getter and Setter :
        -----------------------------------------------------*/
        //getter id_cour
        public function getIdCour()
        {
            return $this->id_cour;
        }
        //setter id_cour
        public function setIdCour($new_id_cour)
        {
            $this->id_cour = $new_id_cour;
        }
        //getter nom_cour
        public function getNomCour()
        {
            return $this->nom_cour;
        }
        //setter nom_cour
        public function setNomCour($new_nom_cour)
        {
            $this->nom_cour = $new_nom_cour;
        }
        //getter date_cour
        public function getDateCour()
        {
            return $this->date_cour;
        }
        //setter date_cour
        public function setdateCour($new_date_cour)
        {
            $this->date_cour = $new_date_cour;
        }
        //getter id_crenaux_horaire_cour
        public function getIdCrenauxCour()
        {
            return $this->id_crenaux;
        }
        //setter id_crenaux_horaire_cour
        public function setIdCrenauxCour($new_id_crenaux)
        {
            $this->id_crenaux = $new_id_crenaux;
        }
        //getter id_user
        public function getIdUser()
        {
            return $this->id_user;
        }
        //setter id_user
        public function setIdUser($new_id_user)
        {
            $this->id_user = $new_id_user;
        }
        //getter id_session
        public function getIdSession()
        {
            return $this->id_session;
        }
        //setter id_session
        public function setIdSession($new_id_session)
        {
            $this->id_user = $new_id_session;
        }    
    }
?>