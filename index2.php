<?php
    if(isset($_GET['error']))
    {
        echo 'login error';
    }
    if(isset($_GET['errormdp']))
    {
        echo 'mdp error';
    }
    if(isset($_GET['connect']))
    {
        echo 'connecté';
    }


?>