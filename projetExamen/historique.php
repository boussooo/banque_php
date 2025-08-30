<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<?php
require_once("db.php");
//  SHOW COLUMNS FROM transactions;
// SELECT t.idTransaction, t.type_trans, t.montant, t.date, t.idCompte
// FROM `transactions` t
// JOIN compte c ON t.idCompte = c.idCompte
// ORDER BY t.date DESC
$sql = "
    SELECT * FROM transactions;
";

$result = mysqli_query($connection, $sql);
// die("$result");

if (!$result) {
    die("<div class='alert alert-danger'>Erreur SQL : " . mysqli_error($connection) . "</div>");
}
?>

<div class="container mt-5">
    <div class="text-center mb-4 pt-5">
  <h2 class="fw-bold text-primary">Liste des transactions bancaires</h2>
  <p class="fw-bold">Consultez l'historique de transactions.</p>
</div>

    <table class="table table-striped  table-warning">
        <thead class="table-warning">
            <tr>
                <th>ID Transaction</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Date Transaction</th>
                <th>idCompte</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['idTransaction'] ?></td>
                    <td><?= $row['type_trans'] ?></td>
                    <td><?= number_format($row['montant'], 0, ',', ' ') ?> Fr</td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['idCompte'] ?></td>
                    <td><?= $row['statut'] ?></td>
                </tr>
            <?php } ?>
            <?php
            if (mysqli_num_rows($result) == 0) {
                echo "<div class='alert alert-warning'>Aucune transaction trouvée.</div>";
            }
            ?>
        </tbody>
    </table>
        <button type="button" class="btn btn-secondary m-3 bg-danger" onclick="window.location.href='index.php?page=transactions'">Retour</button>

</div>