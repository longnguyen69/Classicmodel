<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col-12">
        <div class="hed">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <p class="nav-link" href="#"></p>
                </li>
                <?php if (isset($_SESSION['user'])): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $_SESSION['user'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="action/logoutAdmin.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login/login.php">Login</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
        <!--        -------------------------------------------------->

        <?php if (isset($_SESSION['user'])): ?>
            <button type="button" class="btn btn-outline-primary">Add Information</button>
        <?php endif; ?>

        <!--        ------------------------------>

        <br>
        <br>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Birthday</th>
                <th scope="col">Sex</th>
                <?php if (isset($_SESSION['user'])): ?>
                    <th scope="col">Action</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>01/01/2020</td>
                <td>Male</td>
                <?php if (isset($_SESSION['user'])): ?>
                    <td>
                        <button type="button" class="btn btn-outline-success">Update</button>
                        <button type="button" class="btn btn-outline-secondary">Delete</button>
                    </td>
                <?php endif; ?>
            </tr>

            </tbody>
        </table>
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
