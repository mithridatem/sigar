<?php    
    //vue
    include('view/viewConnexion.php');
    //model
    include('model/utilisateur.php');
    //ajout util
    include('utils/testConnexion.php');
    if(isset($_GET['error']) == 1)
    {   $test2 = "login incorrect";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test2.'"
        </script>';     
        //echo '<script>alert("mot de passe incorrect !!!")</script>';
    }
    else if(isset($_GET['error']) == 2)
    {   $test1 = "le compte n\existe pas";
        echo '<div class="alert  alert-warning" role="alert"></div>
        </div>';
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$test1.'"
        </script>';
        //echo '<script>alert("le compte n\'existe pas !!!")</script>';
    }
    else{
        echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = ""
        </script>';
        //echo '<script>alert("le compte n\'existe pas !!!")</script>';
    }  
    
?>