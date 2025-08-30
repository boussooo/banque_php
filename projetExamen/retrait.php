<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $compte = $_POST['compte_id'];
    $montant = floatval($_POST['montant']);
    
    // Vérification du solde
    $check = mysqli_query($connection, "SELECT montant FROM compte WHERE idCompte = $compte");
    $solde = mysqli_fetch_assoc($check)['montant'];
    
    if ($montant <= $solde) {
        // Création de la transaction
        mysqli_query($connection, "INSERT INTO transactions (type_trans, montant, date, statut, idCompte) 
                                  VALUES ('retrait', $montant, NOW(), 'Validé', $compte)");
        
        // Mise à jour du solde
        mysqli_query($connection, "UPDATE compte SET montant = montant - $montant WHERE idCompte = $compte");
        
        echo "<div class='alert alert-success'>Retrait effectué avec succès</div>";
    } else {
        mysqli_query($connection, "INSERT INTO transactions (type_trans, montant, date, statut, idCompte) 
                                  VALUES ('Retrait', $montant, NOW(), 'Echoué', $compte)");
        echo "<div class='alert alert-danger'>Solde insuffisant</div>";
    }
}

// Récupération des comptes
$comptes = mysqli_query($connection, "SELECT * FROM compte");
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Retrait d'argent</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group mb-3">
                    <label>Compte:</label>
                    <select name="compte_id" class="form-control" required>
                        <option value="">-- Sélectionner --</option>
                        <?php while($c = mysqli_fetch_assoc($comptes)): ?>
                            <option value="<?= $c['idCompte'] ?>">
                                #<?= $c['code'] ?> - <?= $c['montant'] ?> Fr
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label>Montant:</label>
                    <input type="number" name="montant" class="form-control" step="0.01" min="0.01" required>
                </div>
                <button type="button" class="btn btn-secondary mt-3 bg-danger" onclick="window.location.href='index.php?page=transactions'">Retour</button>
                <button type="submit" class="btn btn-primary mt-3">Effectuer le retrait</button>
            </form>
        </div>
    </div>
</div>
