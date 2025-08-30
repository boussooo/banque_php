<?php
// Code pour déposer de l'argent
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $compte = $_POST['idCompte'];
    $montant = floatval($_POST['montant']);

    // Insertion dans transactions
    $sql = "INSERT INTO transactions (type_trans, montant, date, statut, idCompte) 
            VALUES ('depot', $montant, NOW(), 'Validé', $compte)";
    mysqli_query($connection, $sql);

    // Mise à jour du solde du compte
    mysqli_query($connection, "UPDATE compte SET montant = montant + $montant WHERE idCompte = $compte");


    echo "<div class='alert alert-success'>Dépôt effectué avec succès.</div>";
}

// Récupération des comptes
$comptes = mysqli_query($connection, "SELECT * FROM compte");
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            Dépôt d'argent
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>Compte</label>
                    <select name="idCompte" class="form-control" required>
                        <option value="">-- Sélectionnez un compte --</option>
                        <?php while ($c = mysqli_fetch_assoc($comptes)): ?>
                            <option value="<?= $c['idCompte'] ?>">
                                #<?= $c['code'] ?> - <?= $c['montant'] ?> Fr
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Montant</label>
                    <input type="number" name="montant" class="form-control" step="0.01" min="0.01" required>
                </div>
                <button type="button" class="btn btn-secondary mt-3 bg-danger" onclick="window.location.href='index.php?page=transactions'">Retour</button>
                <button type="submit" class="btn btn-primary mt-3">Effectuer le dépôt</button>
            </form>
        </div>
    </div>
</div>