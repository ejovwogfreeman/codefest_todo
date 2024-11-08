<?php

session_start();

include('config/db.php');

$id = isset($_GET['id']);

$sql = "DELETE FROM todos WHERE id = $id";
$sql_query = mysqli_query($conn, $sql);

if ($sql_query) {
    $_SESSION['msg'] = 'Todo Deleted Successfully';
    header('Location: index.php');
}
