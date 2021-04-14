<?php    
    //vue
    include('view/viewConnexion.php');
    //model
    include('model/utilisateur.php');
    //ajout util
    include('utils/testConnexion.php');
    //test login vide
    if(isset($_GET['logerror']))
    {  
        $test0 = "Veuiller saisir un login !!!";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test0.'"
        </script>';
    }
    //test mot de passe vide
    if(isset($_GET['nomdperror']))
    {  
        $test4 = "Veuiller saisir un mot de passe !!!";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test4.'"
        </script>';       
    }    
    //test connexion
    if(isset($_GET['connect']))
    {   
        session_start();
        $test = "connecté !!!!!!!!";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test.'"
        </script>';
        if(isset($_SESSION['connected'])){
            echo 'connected';
            echo '<br>';
            //test affichage du nom du compte connecté (debug)
            echo ''.$_SESSION['nom'].'';
        }
        else{
            echo 'pas de connection !!!';
        } 
    }
    //test mot de passe incorrect
    if(isset($_GET['mdperror']))
    {   $test1 = "mot de passe incorrect!!!!!!!!!!!!!!!!!";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test1.'"
        </script>';       
    }
    //test compte incorrect
    if(isset($_GET['cpterror']))
    {   $test2 = "le compte n'existe pas !!!!!!!!!!!!!!!!!!!!";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test2.'"
        </script>';    
    }

?>