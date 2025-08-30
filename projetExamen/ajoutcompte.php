<?php
// ce submit est le nom du boutton
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
if(isset($_POST["submit"]))
{
    $id=$_POST["id"];
    $code=$_POST["code"];
    $montant=$_POST["montant"];
    $type=$_POST["type"];
    $idClient=$_POST["idClient"];

      if ($montant < 10000) {
        $erreur = "Le montant doit être supérieur ou égal à 10 000.";
    } else {
        $sql = "INSERT INTO compte(idCompte, code, montant, type, idClient) values(NULL, '$code', '$montant', '$type', '$idClient')";
        $ok = mysqli_query($connection, $sql);
        header("Location: index.php?page=listecompte");
        exit();
    }


  /*  $sql="INSERT INTO compte(idCompte,code,montant,type,idClient)  values(NULL,'$code','$montant','$type','$idClient')";
    $ok=mysqli_query($connection,$sql);

    header("location:index.php?page=listecompte");  */

}

?>

<div class="card col-md-8 offset-2 mt-5">
    <div class="card-header bg-success text-white">Ajouter un compte</div>
    <div class="card-body">
                <!--  Message d'erreur ici -->
                <?php if (!empty($erreur)) : ?>
                <div class="alert alert-danger">
                <?php echo $erreur; ?>
                </div>
                <?php endif; ?>

        <form action="#" method="post">
            <label for=""></label>
            <input type="text" class="form-control" name="id" hidden>
            <br>
            <label for="">Code</label>
            <input type="text" class="form-control" name="code" required>
            <br>

            <label for="">Montant</label>
            <input type="number" class="form-control" name="montant" required>
            <br>

            <label for="type_compte">Type de compte</label>
            <select class="form-control" name="type" required>
              <option value="">-- Sélectionnez un type de compte --</option>
              <option value="Epargne">Epargne</option>
              <option value="Epsèce">Espèce</option>
            </select>
            <br>

            <label for="">idClient</label>
            <select name="idClient" class="form-control" required>
                <option value="">-- Sélectionnez un client --</option>
                <?php
                    require_once("db.php");
                            $result = mysqli_query($connection, "SELECT * FROM client");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['idClient']}'>{$row['idClient']} {$row['prenom']} {$row['nom']}</option>";
                            }
                ?>
            </select>
            <br>
            <div class="d-flex justify-content-between">
                <button type="reset" class="btn btn-danger" name="reset"onclick="window.location.href='index.php?page=listecompte'">Retour</button>
                <button type="submit" class="btn btn-success" name="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>
