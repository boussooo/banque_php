<?php 
  if(isset($_POST["modifier"]))
  {
    $id=$_POST["id"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $tel=$_POST["telephone"];
    $age=$_POST["age"];
    
    $sql="UPDATE client set prenom='$prenom',nom='$nom',telephone='$tel',age='$age' where idClient=$id";
    // die($id);

    $ok=mysqli_query($connection,$sql);
    
    header("location:index.php?page=listeclient");
    exit();
  }
  

?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-dark text-white">
      Modifier le client
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
            <label for="matricule">Téléphone</label>
            <input type="text" class="form-control" name="telephone" placeholder="telephone..." value="<?php echo $user[3]?>">
          </div>
          <div class="form-group col-md-3">
            <label for="matricule">Age</label>
            <input type="text" class="form-control" name="age" placeholder="age" value="<?php echo $user[4]?>">
          </div>

        </div>
        <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
        <button type="button" class="btn btn-secondary ml-2" onclick="window.location.href='index.php?page=listeclient'">Annuler</button>
      </form>
    </div>
  </div>
</div>
