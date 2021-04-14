<?php    
    //test si les variables existent et si elle ne sont pas vides
    if(isset($_POST['nom']) AND isset($_POST['prenom']) 
    AND isset($_POST['login']) AND isset($_POST['mdp']) 
    AND !empty($_POST['nom']) AND !empty($_POST['prenom'])
    AND !empty($_POST['login']) AND !empty($_POST['mdp']))
    {
        $nom = $_POST['nom']; 
        $prenom = $_POST['prenom']; 
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
                
        //création d'un nouvel objet utilisateur  
        $util = new Utilisateur($nom, $prenom, $login, $mdp );
        //fonction encodage mot de passe
        $mdp = $util->cryptMdp($mdp);
        //enregistrement du mot de passe
        $util->setMdp($mdp);          
        //fonction affichage du compte utilisateur créé.
        //$util->showUser($nom, $prenom, $login, $mdp);
        //récupération du nom utilisateur 
        $nom = $util->getNom();
        //récupération du login utilisateur
        $login = $util->getLogin();
        //récupération du mot de passe utilisateur
        $mdp = $util->getMdp();
        //vérification de l'objet utilisateur
        //var_dump($util);
        try 
        {      
            //insertion de l'utilisateur en BDD 
            $util->createUser2($nom, $prenom, $login, $mdp, $bdd); 
                      
        }
        catch(Exception $e)
        {   //affichage d'une exception
            die('Erreur : '.$e->getMessage());
        }            
    }
    
?>       