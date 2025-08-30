<?php
include("db.php"); 
// ce submit est le nom du boutton

if(isset($_POST["submit"]))
{
    $prenom=$_POST["prenom"];
    $nom=$_POST["nom"];
    $tel=$_POST["telephone"];
    $email=$_POST["email"];
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
  // controler l email
      //filter_var() est une fonction PHP intégrée qui permet de valider ou nettoyer des données, comme des emails, des URLs, des entiers, etc.
      // Ici, FILTER_VALIDATE_EMAIL est un filtre prédéfini qui vérifie que le texte est une vraie adresse email 
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "Adresse email invalide.";
    }else{
             $sql="INSERT INTO utilisateur(idUser,prenom,nom,telephone,email,login,mdp)  values(NULL,'$prenom','$nom','$tel','$email','$login','$mdp')";
    $ok=mysqli_query($connection,$sql);
    header("location:index.php?page=listeuser");
    }

}

?>

<div class="card col-md8 offset-2 mt-5">
    <div class="card-header bg-success">Ajouter un user</div>
    <div class="card-body">

            <!-- Affichage de l'erreur -->
        <?php if (!empty($erreur)) : ?>
            <div class="alert alert-danger">
                <?php echo $erreur; ?>
            </div>
        <?php endif; ?>

        <form action="#" method="post">
                <label for="">Prenom</label>
                <input type="text" class="form-control" name="prenom" required>
                <br>
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" required>
                <br>
                <label for="">Telephone</label>
                <input type="text" class="form-control" name="telephone" pattern="[0-9]{9}" placeholder="771234567" required>
                <br>
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="ex: aaaa@gmail.com" required>
                <br>
                <label for="">Login</label>
                <input type="text" class="form-control" name="login" required>
                <br>
                <label for="">Mot de passe</label>
                <input type="text" class="form-control" name="mdp" required>
                <br>

                <br>
                <button type="reset" class="btn btn-danger" name="reset" onclick="window.location.href='index.php?page=listeuser'">Retour</button>
                <button type="submit" class="btn btn-success" name="submit">Ajouter</button>
        </form>

    </div>

</div>