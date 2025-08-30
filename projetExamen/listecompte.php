<?php
// echo "<h1>liste compte </h1>";
// Chargement des comptes
$sql = "SELECT * FROM compte";
$utilisateurs = mysqli_query($connection, $sql);
?>
<!-- <style>
  .c-white{
    color: wheat;
  }
</style> -->
<div class="text-center mb-4 pt-5">
  <h2 class="fw-bold text-primary">Liste des comptes bancaires</h2>
  <p class="fw-bold">Consultez, modifiez ou supprimez les comptes clients en toute simplicité.</p>
</div>
<div class="col-md-8 offset-2">
  <a class="btn btn-warning float-end mb-3" href="index.php?page=ajoutcompte">
    <i class="bi bi-plus-circle"></i> Ajouter un compte
  </a>

  <table class="table table-warning table-striped" id="tableCompte">
    <thead class="table-warning">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Code</th>
        <th scope="col">Montant(frcfa)</th>
        <th scope="col">Type</th>
        <th scope="col">idClient</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($u = mysqli_fetch_row($utilisateurs)): ?>
        <tr>
          <td><?php echo $u[0]; ?></td>
          <td><?php echo $u[1]; ?></td>
          <td><?php echo $u[2]; ?></td>
          <td><?php echo $u[3]; ?></td>
          <td><?php echo $u[4]; ?></td>
          <td>
            <a href="index.php?page=modifCompte&id=<?php echo $u[0]; ?>" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="index.php?page=deletCompte&id=<?php echo $u[0]; ?>" class="btn btn-sm btn-outline-danger">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Styles & scripts -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
