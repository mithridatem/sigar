<?php
    testConnexion();
    function testConnexion(){
        if(isset($_POST['login']) AND isset($_POST['mdp']) 
        AND !empty($_POST['login']) AND !empty($_POST['mdp']))
        {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            $nom = "";
            $prenom="";       
            //création d'un nouvel objet utilisateur  
            $util = new Utilisateur($nom, $prenom,$login, $mdp);
            //fonction encodage mot de passe
            $mdp = $util->cryptMdp($mdp);
            //enregistrement du mot de passe
            $util->setMdp($mdp);                        
            //récupération du mdp utilisateur
            $mdp = $util->getMdp();
            try
            {
                //connexion à la base de données
                include('utils/connectBdd.php');
                //requete pour stocker le contenu de toute la table
                $reponse = $bdd->query('SELECT * FROM utilisateur WHERE login_user = "'.$login.'" AND mdp_user="'.$mdp.'"');
                //boucle pour parcourir et afficher le contenu de chaque ligne de la table
                while ($donnees = $reponse->fetch())
                {   
                    //test si le login et le mot de passe sont valide si ok affichage du login et du password
                    if($login == $donnees['login_user'] AND $mdp == $donnees['mdp_user'])
                    {   
                        $nomUser = $donnees['nom_user'];
                        $prenom= $donnees['prenom_user'];
                        $logreq = $donnees['login_user'];
                        $mdpreq = $donnees['mdp_user'];
                        
                        //stockage de l'id utilisateur
                        $idutilsat = $donnees['id_user'];
                        //$_SESSION['id']= $idutilsat;
                        //echo "login = $login et le mdp = $mdp";
                        session_destroy();
                        session_start();
                        $_SESSION['login'] = $logreq;
                        $_SESSION['mdp'] = $mdpreq;
                        $_SESSION['nom'] = $nomUser;
                        $_SESSION['id'] = $idutilsat;
                        $_SESSION['connected'] = true;
                        echo '<br>';
                        echo 'login connecté : '.$_SESSION['login'];
                        echo '<br>';
                        echo 'mot de passe connecté : '.$_SESSION['mdp'];
                        echo '<br>';
                        echo 'nom connecté : '.$_SESSION['nom'];
                        echo '<br>';
                        echo 'id connecté : '.$_SESSION['id'];
                    }
                               
                }
                //le compte n'existe pas !!!
               if(!isset($logreq)){
                    header("Location: index.php?error=1");
                }
                //mot de passe incorrect !!!
                if(!isset($mdpreq)){
                    header("Location: index.php?error=1");
                }                           
            }
            catch(Exception $e)
            {   //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            } 
        }
    }
?>