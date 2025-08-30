<?php
echo "<h2 class='fw-bold text-primary text-center pt-5'>Liste des utilisateurs</h2>";
echo "<p class='text-center fw-bold'>Gérez les utilisateurs du système avec leurs informations de connexion.</p>";


$sql = "SELECT * FROM utilisateur";
$utilisateurs = mysqli_query($connection, $sql);
?>

<div class="col-md-8 offset-2 pt-4">
  <a class="btn btn-warning float-end mb-3" href="index.php?page=ajoutuser">
    <i class="bi bi-person-plus-fill"></i> Ajouter un utilisateur
  </a>

  <table class="table table-striped table-warning " id="tableUser">
    <thead class="table-warning">
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Login</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($u = mysqli_fetch_row($utilisateurs)): ?>
        <tr>
          <td><?= $u[0] ?></td>
          <td><?= $u[1] ?></td>
          <td><?= $u[2] ?></td>
          <td><?= $u[3] ?></td>
          <td><?= $u[4] ?></td>
          <td><?= $u[5] ?></td>
          <td>
            <a href="index.php?page=modifUser&id=<?= $u[0] ?>" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="index.php?page=deletUser&id=<?= $u[0] ?>" class="btn btn-sm btn-outline-danger">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap Icons + DataTables -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
