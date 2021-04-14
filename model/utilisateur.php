<?php 
    class Utilisateur
    {   
        //attributs :
        protected $id_user;
        protected $nom;
        protected $prenom;
        protected $login;
        protected $mdp;
        protected $id_role;        
        //constucteur :
        public function __construct($nom, $prenom, $log, $mdp)
        {   $this->nom = $nom;
            $this->prenom = $prenom;
            $this->login = $log;
            $this->mdp = $mdp;
            $this->id_role =1;            
        }
        /*-----------------------------------------------------
                Getter and Setter :
        -----------------------------------------------------*/
        //getter id_user
        public function getIdUser()
        {
            return $this->id_user;
        }
        //setter login
        public function setIdUser($new_id_user)
        {
            $this->id_user = $new_id_user;
        }
        //getter login
        public function getLogin()
        {
            return $this->login;
        }
        //setter login
        public function setLogin($new_login)
        {
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
        //getter prenom
        public function getPrenom(){
            return $this->prenom;
        }
        //setter prenom
        public function setPrenom($new_prenom){
            $this->prenom = $new_prenom;
        }
        //getter id_role
        public function getId_role(){
            return $this->id_role;
        }
        //setter id_role
        public function setId_role($new_id_role){
            $this->id_role = $new_id_role;
        }

        //fonction encodage mot de passe en md5
        public function cryptMdp($mdp){
            //suppression injection sql en js
            $mdp = htmlspecialchars($mdp);
            //retour encodage en md5
            return md5($mdp);
        }        
        //fonction affichage des informations
        public function showUser($nom, $prenom, $login, $mdp){
            $mess= "Formateur ajouté à la BDD : <br>Nom : '.$nom.' Prenom : '.$prenom.' 
            Login : '.$login.' Mot De Passe : '.$mdp.'";
            echo "$mess";
        }             
        //fonction affichage des erreurs 
        public function showError($nom, $prenom, $login, $mdp){
            $mess = 'Veuillez saisir un nom, un prénom, un login et un mot de passe';
            echo '<div class="alert  alert-warning" role="alert"></div>
                    </div>';
            echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$mess.'"
            </script>';            
        }
        //fonction insertion d'un utilisateur en BDD
        public function createUser($nom, $prenom, $login, $mdp, $bdd){                                 
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
            $test = 'le compte : '.$nom.' '.$prenom.' à était ajouté !!!';
            echo '<div class="alert  alert-warning" role="alert"></div>
                    </div>';
            echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test.'"
            </script>';
            //fermeture de la connexion à la bdd
            $req->closeCursor();                          
        } 
    }
?>