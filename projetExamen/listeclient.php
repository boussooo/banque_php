<?php
echo "<h2 class='fw-bold text-primary text-center pt-5 c-white'>Liste des Clients</h2>";
echo "<p class='text-center fw-bold'>Gérez les informations de vos clients : ajout, modification, suppression.</p>";

$sql = "SELECT * FROM client";
$utilisateurs = mysqli_query($connection, $sql);
?>


<div class="col-md-8 offset-2 pt-4">
  <a class="btn btn-warning float-end mb-3" href="index.php?page=ajoutclient">
    <i class="bi bi-plus-circle"></i> Ajouter un client
  </a>

  <table class="table table-striped table-warning" id="tableClient">
    <thead class="table-warning">
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Âge</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($u = mysqli_fetch_row($utilisateurs)): ?>
        <tr>
          <td><?= $u[0] ?></td>
          <td><?= $u[1] ?></td>
          <td><?= $u[2] ?></td>
          <td><?= $u[3] ?></td>
          <td><?= $u[4] ?></td>
          <td>
            <a href="index.php?page=modifClient&id=<?= $u[0] ?>" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="index.php?page=deletClient&id=<?= $u[0] ?>" class="btn btn-sm btn-outline-danger">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
      <?php endwhile ?>
    </tbody>
  </table>
</div>

<!-- DataTables + Bootstrap Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>