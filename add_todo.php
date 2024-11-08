<?php
session_start();

include('partials/header.php');
include('config/db.php');

$todo = $err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['todo'])) {
        $err = 'Please enter todo';
    } else {
        $todo = htmlspecialchars($_POST['todo']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO todos (todo, date) VALUES ('$todo', '$date')";
        $sql_query = mysqli_query($conn, $sql);

        if ($sql_query) {
            $_SESSION['msg'] = 'Todo Added Successfully';
            header('Location: index.php');
        }
    }
};

?>

<div class="container mt-5">
    <form method='POST' class="border rounded p-3">
        <h3 class="text-center my-3">Add A New Todo</h3>
        <div class="mb-3">
            <label for="todo" class="form-label">Enter Your Todo</label>
            <input type="text" class="form-control" id="todo" name='todo' placeholder="Enter Your Todo">
            <small class="text-danger"><?php echo isset($err) ? $err : ''; ?></small>
        </div>
        <button class="btn btn-primary w-100">ADD TODO</button>
    </form>
</div>

<?php include('partials/footer.php') ?>