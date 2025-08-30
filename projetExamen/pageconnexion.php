
<?php
// connexion est le nom du boutton
        if(isset($_POST["connexion"]))
        {
            $login=$_POST["login"];
            $mdp=$_POST["motdepasse"];

            $sql="SELECT * FROM utilisateur where login='$login' AND mdp='$mdp'";
            
            // execution de la requete
            require_once("db.php");
            $result=mysqli_query($connection,$sql);

            //var_dump($result);

            
             if(mysqli_num_rows($result) > 0)
            {
               $ligne = mysqli_fetch_row($result); 
                // var_dump($ligne);

                $_SESSION["prenom"] = $ligne[1];
                $_SESSION["nom"] = $ligne[2];

              // die("reuissi");
                header("location:index.php?page=home");
            }
               else 
                 $erreur = "Login ou mot de passe incorrect";
        }


?>
<?php if (isset($erreur)) : ?>
  <div class="alert alert-danger">
    <?= $erreur ?>
  </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion TawfiqBank</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('image.png');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #div1 {
          background: transparent;
             /* background-color: rgba(238, 238, 238, 1);  */
            padding: 3em;
            border-radius: 15px;
            box-shadow: 0 4px 17px rgba(243, 194, 20, 1);
            width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 1em;
            color: wheat;
        }

        label {
            font-weight: 500;
            margin-top: 1em;
        }
        

        .form-control {
            border-radius: 8px;
            padding: 0.6em;
            margin-bottom: 1em;
            /* background: transparent; */

        }

        .btn-success {
            width: 100%;
            border-radius: 8px;
            padding: 0.7em;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div id="div1">
        <h1><strong>Bienvenue sur TawfiqBank</strong></h1>
        <form action="" method="POST">
            <label>Login</label>
            <input type="text" name="login" class="form-control" autocomplete="off">

            <label>Mot de passe</label>
            <input type="password" name="motdepasse" class="form-control" autocomplete="off">

            <button type="submit" name="connexion" class="btn btn-success mt-3">Se connecter</button>
        </form>
    </div>

</body>
</html>
