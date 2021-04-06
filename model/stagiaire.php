<?php
    class Stagiaire{
        private $id_stg;
        private $nom_stg;
        private $prenom_stg;
        private $id_session;
        //constucteur :
        public function __construct($nom_stg, $prenom_stg)
        {   $this->nom = $nom;
            $this->prenom = $prenom;           
        }
        /*-----------------------------------------------------
                Getter and Setter :
        -----------------------------------------------------*/
        //getter login
        public function getIdStg()
        {
            return $this->id_stg;
        }
        //setter login
        public function setLogin($new_id_stg)
        {
            $this->id_stg = $new_id_stg;
        }
        

        
    }

?>