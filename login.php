<?php 
	if (isset($_POST['formlogin'])) 
	{
		$lemail = $_POST['lemail'];
    	$lpseudo = $_POST['lpseudo'];
    	$lpassword = $_POST['lpassword'];

    	if (!empty($lemail) && !empty($lpseudo) && !empty($lpassword)) 
    	{
    		$q = $db->prepare("SELECT * FROM users WHERE email = :email");
    		$q->execute(['email' => $lemail]);
    		$result = $q->fetch();

    		if ($result == true) {

    			if(password_verify($lpassword, $result['password']))
    			{
    				echo "Connexion en cours...";
                    header('Location: espace-membre/index.php');

    				$_SESSION['email'] = $result['email'];
    				$_SESSION['pseudo'] = $result['pseudo'];
    			}else{
    				echo "Le mot de passe n'est pas correct";
    			}

    		}else{
    			echo "Le compte portant l'email " . $lemail . " n'existe pas";
    		}
    	}else{
    		echo "Veuillez compléter l'ensemble des champs";
    	}
	}
?>