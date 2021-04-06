<html lang="fr">
    <?php
        //ajout du menu
        include('./view/Component/header.php');
    ?>
<body class="bg-light">
    <?php
        //ajout du menu
        include('./view/Component/menu.php');
    ?>
    <div class="connexion card position-absolute top-50 start-50 translate-middle col-12 col-md-4 ">
        <img src="./css/img/2019_LOGO_POLE_NUM.png">
        <form action="" method="post" class="card-body">
            <label class="form-label" for="login">Login : </label>
            <input type="text" name="login" class="form-control" id="login">    
            <label class="form-label mt-2" for="pw">Mot de passe : </label>
            <input type="password" name="mdp" class="form-control" id="pw">
            <input type="submit" value="connexion" class="btn btn-primary mt-3">   
        </form>
    </div>
    <?php
        //ajout du menu
        include('./view/Component/footer.php');
    ?>
</body>