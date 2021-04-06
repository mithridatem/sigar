<html lang="fr">
    <?php   
        //ajout du menu
        include('./view/Component/header.php');
    ?>
<body>
    <?php
        //ajout du menu
        include('./view/Component/menu.php');
    ?>
    <div class="container d-flex flex-column mt-3">
        <h2 class="mx-auto display-6">Créer un compte formateur</h2>
        <div class="createUser">
            <form action="" method="post" class="d-flex flex-column align-items-start">
                <label class="form-label mt-1">Nom : </label>
                <input type="text" name="nom" class="form-control">
                <label class="form-label mt-1">Prénom : </label>
                <input type="text" name="prenom" class="form-control">
                <label class="form-label mt-1">Login : </label>
                <input type="text" name="login" class="form-control">    
                <label class="form-label mt-1">Mot de passe : </label>
                <input type="text" name="mdp" class="form-control">
                <input type="submit" value="créer" class="btn btn-primary mt-4 align-self-end">   
            </form>
        </div>
    </div>    
    
    <?php
        //ajout du menu
        include('./view/Component/footer.php');
    ?>
    
</body>
