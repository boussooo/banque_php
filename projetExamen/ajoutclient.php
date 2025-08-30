<?php
// ce submit est le nom du boutton

if(isset($_POST["submit"]))
{
    $prenom=$_POST["prenom"];
    $nom=$_POST["nom"];
    $tel=$_POST["telephone"];
    $age=$_POST["age"];
var_dump("$prenom,$nom");
    $sql="INSERT INTO client(idClient,prenom,nom,telephone,age)  values(NULL,'$prenom','$nom','$tel','$age')";
    $ok=mysqli_query($connection,$sql);

    header("location:index.php?page=listeclient");

}

?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-primary text-white">Ajouter un nouveau client</div>
    <div class="card-body">
      <form action="#" method="post">
        <div class="form-group">
          <label for="prenom">Prenom</label>
          <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prenom" name="prenom" required>
        </div>
        <br>
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom" required>
        </div>
        <br>
        <div class="form-group">
             <label for="telephone">Telephone :</label>
             <input type="tel" id="telephone" name="telephone" pattern="[0-9]{9}" placeholder="771234567" required>
        </div>
        <br>
        <div class="form-group">
           <label for="description">Age</label>
           <input type="number" id="age" name="age" min="1"  required>
           <small>Vous devez avoir minimum 1 an</small>
        </div>
        <br>
        <br>
        <button type="reset" class="btn btn-danger" name="reset" onclick="window.location.href='index.php?page=listeclient'">Annuler</button>
        <button type="submit" class="btn btn-success" name="submit">Ajouter</button>
      </form>
    </div>
  </div>
</div>
