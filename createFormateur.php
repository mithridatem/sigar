<?php
    //ajout de la vue
    include('view/viewCreateFormateur.php');
    //ajout du model
    include('model/utilisateur.php');
    //ajout util
    include('utils/connectBdd.php');
    //ajout api
    include('api/createFormateur.php');
    //test login vide
    
    if(isset($_GET['cpterror'])){
        $mess = "le compte existe déja !!!";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$mess.'"
        </script>';
    }
    //sinon
    elseif(!isset($_POST['nom']) OR !isset($_POST['prenom']) 
    OR !isset($_POST['login']) OR !isset($_POST['mdp']) 
    OR empty($_POST['nom']) OR empty($_POST['prenom'])
    OR empty($_POST['login']) OR empty($_POST['mdp']))
    {   
        //variable nom utilisateur à vide
        $nom = "";
        //variable prenom utilisateur à vide
        $prenom = "";
        //variable login à vide
        $login = "";
        //variable mot de passe à vide
        $mdp = "";        
        //nouvel utilisateur  
        $util = new Utilisateur($nom, $prenom, $login, $mdp);
        //affichage des erreurs
        $util->showError($nom, $prenom, $login, $mdp);        
    }
?>