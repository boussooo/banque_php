<?php 
  if(isset($_POST["modifier"]))
  {
    $id=$_POST["id"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $tel=$_POST["telephone"];
    $mail=$_POST["email"];
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
    $sql="UPDATE utilisateur set prenom='$prenom',nom='$nom',telephone='$tel',email='$mail',login='$login',mdp='$mdp' where idUser=$id";
    // die($id);

    $ok=mysqli_query($connection,$sql);
    // var_dump($ok);
    header("location:index.php?page=listeuser");
  }
  
?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-dark text-white">
      Modifier l'Utilisateur
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="id"></label>
            <input type="text" class="form-control" name="id" value="<?php echo $user[0]?>" hidden>
          </div>
          <div class="form-group col-md-3">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php echo $user[1]?>">
          </div>
          <div class="form-group col-md-3">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" placeholder="Prénom" value="<?php echo $user[2]?>">
          </div>
          <div class="form-group col-md-3">
            <label for="prenom">Téléphone</label>
            <input type="text" class="form-control" name="telephone" placeholder="numero téléphone" value="<?php echo $user[3]?>">
          </div>
          <div class="form-group col-md-3">
            <label for="prenom">Email</label>
            <input type="text" class="form-control" name="email" placeholder="votre email" value="<?php echo $user[4]?>">
          </div>
          <div class="form-group col-md-3">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login" placeholder="Nom d'utilisateur" value="<?php echo $user[5]?>">
          </div>
          <div class="form-group col-md-3">
            <label for="mdp">Passeword</label>
            <input type="text" class="form-control" name="mdp" placeholder="Passeword..." value="<?php echo $user[6]?>">
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
        <button type="button" class="btn btn-secondary ml-2" onclick="window.location.href='index.php?page=listeuser'">Annuler</button>
      </form>
    </div>
  </div>
</div>
