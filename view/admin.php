<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../login/login.php');
}
include '../class/Manipulation.php';
$book = new Manipulation();
$books = $book->getListBooks();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quan ly sinh vien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col-12">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <p class="nav-link" href="#"></p>
            </li>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown">
                    <?php echo $_SESSION['user'] ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../action/changePassword.php">Change Password</a>
                </div>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../action/logoutAdmin.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            List Books
        </div>
        <form method="post">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Version</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($books as $key => $values): ?>
                        <tr>
                            <th><?php echo ++$key ?></th>
                            <td><?php echo $values['name'] ?></td>
                            <td><?php echo $values['author'] ?></td>
                            <td><?php echo $values['version_number'] ?></td>
                            <td><img src="../uploads/<?php echo $values['image'] ?>" width="80px"></td>

                            <td>
                                <?php if ($values['status'] == 1): ?>
                                    <p class="text-success">Con sach</p>
                                <?php else: ?>
                                    <p class="text-danger">Het sach</p>
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="update.php?code=<?php echo $values['code'] ?> ">Update</a>
                                <a onclick="return confirm('You definitely want to delete?')" href="../action/delete.php?code=<?php echo $values['code'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>