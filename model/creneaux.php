<?php
    class Creneaux{
        //attributs :
        protected $id_creneaux;
        protected $nom_creneaux;

        //constucteur :
        public function __construct($nom_creneaux)
        {   $this->nom_creneaux = $nom_creneaux;                    
        }
        /*-----------------------------------------------------
                Getter and Setter
        -----------------------------------------------------*/
        //getter id_creneaux
        public function getIdCreneaux()
        {
            return $this->id_creneaux;
        }
        //setter id_creneaux
        public function setIdCreneaux($new_id_creneaux)
        {
            $this->id_creneaux = $new_id_creneaux;
        }
        //getter nom_creneaux
        public function getNomCreneaux()
        {
            return $this->nom_creneaux;
        }
        //setter nom_creneaux
        public function setNomCreneaux($new_nom_creneaux)
        {
            $this->nom_creneaux = $new_nom_creneaux;
        }


    }
?>