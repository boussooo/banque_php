<?php

if (isset($_POST["modifier"])) {
  $id = $_POST["id"];
  $code = $_POST["code"];
  $type = $_POST["type"];
  $client = $_POST["idClient"];

  // Notez que nous ne mettons pas à jour le montant ici
  $sql = "UPDATE compte SET code='$code', type='$type', idClient=$client WHERE idCompte=$id";

  $ok = mysqli_query($connection, $sql);

  header("location:index.php?page=listecompte");
  exit();
}

?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-dark text-white">
      Modifier le compte
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="form-row">
          <input type="hidden" name="id" value="<?php echo $user[0]; ?>">
          <div class="form-group col-md-3">
            <label for="nom">Code</label>
            <input type="text" class="form-control" name="code" placeholder="code" value="<?php echo $user[1] ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="montant">Montant</label>
            <input type="text" class="form-control" name="montant" placeholder="montant..." value="<?php echo $user[2] ?>" readonly>
          </div>
          <div class="form-group col-md-3">
            <label for="type">Type du compte</label>
            <select name="type" class="form-select">
              <option value="Epargne" <?php if ($user[3] == "Epargne") echo "selected"; ?>>Epargne</option>
              <option value="Espèce" <?php if ($user[3] == "Espèce") echo "selected"; ?>>Espèce</option>
            </select>
          </div>
          <div class="form-group">
            <label for="client">Client</label>
            <select class="form-control" name="idClient">
              <option value="">-- Sélectionnez un client --</option>
              <?php
              require_once("db.php");
              $result = mysqli_query($connection, "SELECT * FROM client");
              while ($row = mysqli_fetch_assoc($result)) {
                $selected = ($row['idClient'] == $user[4]) ? "selected" : "";
                echo "<option value='{$row['idClient']}' $selected>{$row['prenom']} {$row['nom']}</option>";
              }
              ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
          <button type="button" class="btn btn-secondary ml-2" onclick="window.location.href='index.php?page=listecompte'">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>