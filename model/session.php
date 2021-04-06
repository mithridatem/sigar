<?php
    class Session{
        private $id_session;
        private $nom_session;
        //constructeur :
        public function __construct($nom_session)
        {   $this->nom_session = $nom_session;          
        }
        /*-----------------------------------------------------
                Getter and Setter :
        -----------------------------------------------------*/
        //getter id_session
        public function getIdSession()
        {
            return $this->id_session;
        }
        //setter id_session
        public function setIdSession($new_id_session)
        {
            $this->id_session = $new_id_session;
        }
        //getter nom_session
        public function getNomSession()
        {
            return $this->nom_session;
        }
        //setter nom_session
        public function setNomSession($new_nom_session)
        {
            $this->nom_session = $new_nom_session;
        }


    }
?>