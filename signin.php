<?php
 
if(isset($_POST['formsend'])){
 
 
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
 
    if(!empty($password) && !empty($cpassword) && !empty($pseudo) && !empty($email)){
 
        if ($password == $cpassword) {
            $options = [
                'cost' => 12,
            ];
 
            $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
 
            $c = $db->prepare("SELECT email FROM users WHERE email =:email");
            $c->execute(['email' => $email]);
            $result = $c->rowCount();
 
            if($result == 0){
                $q = $db->prepare("INSERT INTO users(email,pseudo,password) VALUES(:email,:pseudo,:password)");
                $q->execute([
                    'email' =>$email,
                    'pseudo' =>$pseudo,
                    'password' =>$hashpass]);
 
                echo "Le compte a été créé !";
            }else{
                echo "Un compte avec cet Email existe déjà";
            }
        }else{
            ?>
            <h3 class="mdp_invalides">Les mots de passes ne correspondent pas</h3>

            <?php

            }

        } else {
        echo "Les champs ne sont pas tous remplis";
    }
 
}
 
?>