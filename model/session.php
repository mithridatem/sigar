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
        /*-----------------------------------------------------
                            fonctions :
        -----------------------------------------------------*/
        public function createSession($nom_session){
            //connexion à la base de données
            include('utils/connectBdd.php');
            //requete pour stocker le contenu de toute la table
            $reponse = $bdd->query('SELECT * FROM classe WHERE nom_session = "'.$nom_session.'" LIMIT 1');
            //boucle pour parcourir et afficher le contenu de chaque ligne de la table classe classe
            while ($donnees = $reponse->fetch())
            {   
                //test si le login existe
                if($nom_session == $donnees['nom_session'])
                {   
                    $sessionExist=1;                                  
                }                                              
            }
            if(isset($sessionExist)){
                header("Location: createSession.php?sessionerror"); 
            }
            if(!isset($userExist)){
                //connexion à la base de données
                include('utils/connectBdd.php');
                //préparation de la requête SQL
                $req = $bdd->prepare('INSERT INTO utilisateur(nom_user, prenom_user, login_user, mdp_user, id_role) 
                VALUES (:nom_user, :prenom_user, :login_user, :mdp_user, :id_role)');
                //éxécution de la requête SQL
                $req->execute(array(
                'nom_user' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $nom),
                'prenom_user' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $prenom),
                'login_user' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $login),
                'mdp_user' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $mdp),
                'id_role' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", 1),                                                                   
                ));
                $mss = 'le compte : '.$nom.' '.$prenom.' à était ajouté !!!';
                //echo 'console.log("message erreur")';
                echo '<div class="alert  alert-warning" role="alert"></div>
                    </div>';
                echo '<script>
                console.log("message erreur")
                let divToast = document.querySelector(".alert")             
                divToast.innerHTML = "'.$mss.'"
                </script>';
                //fermeture de la connexion à la bdd
                $req->closeCursor();    
            }                                  
        }
    }
?>