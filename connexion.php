<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="fr" class="connect">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo-Forum.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
<!-- Database -->
<?php include 'includes/database.php'; ?>

<!-- Menu de naviguation -->
<?php include 'includes/menu-nav.php' ?>

    <div class="titre">Le NF Forum</div>

<!-- ------------------CONNEXION--------------------------->
<?php if (isset($_SESSION['email']) && (isset($_SESSION['pseudo']))) {
        ?>
        <h2 class="connection">Connecté en tant que <?= $_SESSION['pseudo']; ?></h2>
        <a class="btn-connect" href="espace-membre/index.php">
            Espace-membre
        </a>
        <br>
        <br>
        <br>
        <?php
    }else{
        echo "<h2 class='connection'>Veuillez vous connectez</h2>";

    }

    ?>

<div class="connexion">
    <h2 class="connexion">Connexion</h2>

    <form method="post">
        <input class="form" type="email" name="lemail" placeholder="Email" required><br>
        <input class="form" type="text" name="lpseudo" placeholder="Pseudo" required><br>
        <input class="form" type="password" name="lpassword" id="lpassword" placeholder="Mot de passe" required><br>
        <br>
        <input class="form" type="submit" name="formlogin" id="formlogin" value="Connexion">
        <br>
        <br>
    </form>
    <br>

    <?php include 'includes/login.php'; ?>

</div>
<!--  ------------------Inscription----------------------->
<div class="inscription">
    <h2 class="inscription">Inscription</h2>
 
    <form method="post">
        <input type="email" name="email" placeholder="Email" required class="form"><br>
        <input type="text" name="pseudo" placeholder="Pseudo" required class="form"><br>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required class="form"><br>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirmation du mot de passe" required class="form"><br>
        <br>
        <input type="submit" name="formsend" id="formsend" value="Inscription" class="form">
        <br>
        <br>
    </form>

    <?php include 'includes/signin.php'; ?>
</div>
</body>
</html>
