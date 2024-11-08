<?php

session_start();

include('partials/header.php');
include('config/db.php');

$sql = 'SELECT * from todos ORDER BY date DESC';
$sql_query = mysqli_query($conn, $sql);
$todos = mysqli_fetch_all($sql_query, MYSQLI_ASSOC);

?>

<div class="container mt-3">
  <h2>All Todos</h2>
  <?php if (isset($_SESSION['msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><?php echo $_SESSION['msg']; ?></strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_destroy(); ?>
  <?php endif; ?>
  <ul class="list-group">
    <?php foreach ($todos as $todo): ?>
      <li
        class="list-group-item d-flex align-items-center justify-content-between">
        <span>
          <h4><?php echo $todo['todo'] ?></h4>
          <small><?php echo $todo['date'] ?></small>
        </span>
        <span>
          <a href='' class="btn btn-outline-primary">
            <i class="bi bi-pencil-square"></i>&nbsp; UPDATE
          </a>
          <a href="delete.php?id=<?php echo $todo['id'] ?>" class="btn btn-outline-danger">
            <i class="bi bi-trash"></i>&nbsp; DELETE
          </a>
        </span>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<?php include('partials/footer.php') ?>