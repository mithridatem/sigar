<?php 
    class Admin extends Utilisateur
    {   
        //attributs :        
        private $id_role = 2;        
        //constucteur
        public function __construct($log, $mdp, $nom)
        {
            $this->login = $log;
            $this->mdp = $mdp;
            $this->nom = $nom;
        }
        //getter login
        public function getLogin()
        {
            return $this->login;
        }
        //setter login
        public function setLogin($new_login)
        {
            //la variable s'écrit sans le $ : login
            $this->login = $new_login;
        }
        //getter mdp
        public function getMdp(){
            return $this->mdp;
        }
        //setter mdp
        public function setMdp($new_mdp){
            //la variable s'écrit sans le $ : mdp 
            $this->mdp = $new_mdp;
        }
        //getter nom
        public function getNom(){
            return $this->nom;
        }
        //setter nom
        public function setNom($new_nom){
            $this->nom = $new_nom;
        }

        //fonction encodage mot de passe en md5
        public function cryptMdp($mdp){
            //suppression injection sql en js
            $mdp = htmlspecialchars($mdp);
            //retour encodage en md5
            return md5($mdp);
        }        
        //fonction affichage des informations
        public function showUser($nom, $login, $mdp){
            echo 'le nom est : '.$nom.' le login est : '.$login.' et le mot de passe est 
            : '.$mdp.'';
        }             
        //fonction affichage des erreurs 
        public function showError($login, $mdp){
            echo 'Veuillez saisir un login et un mot de passe';
        }
        //fonction insertion d'un utilisateur en BDD
        public function createUser($nom,$login,$mdp, $bdd){                                 
            //préparation de la requête SQL
            $req = $bdd->prepare('INSERT INTO utilisateur(nom_user, login_user, mdp_user) 
            VALUES (:nom_user,:login_user, :mdp_user)');
            //éxécution de la requête SQL
            $req->execute(array(
            'nom_user' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $nom),
            'login_user' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $login),
            'mdp_user' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $mdp),                                                                   
            ));                        
            echo '<p>le compte : '.$nom.' à était ajouté ! </p>';
            //fermeture de la connexion à la bdd
            $req->closeCursor();                          
        } 
    }
?>