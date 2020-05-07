<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    include '../class/Manipulation.php';
    $check = new Manipulation();

    if ($_REQUEST['currentPassword'] != $check->checkPass($_SESSION['user'])) {
        $error['currentPassword'] = "Incorrect password";
    } elseif ($_REQUEST['currentPassword'] == $_REQUEST['newPassword']) {
        $error['newPassword'] = "The old password cannot match the new password";
    } else {
        $currentPass = $_REQUEST['currentPassword'];
    }
    if ($_REQUEST['newPassword'] != $_REQUEST['reNewPassword']) {
        $error['reNewPassword'] = 'Re new password other new password';
    } else {
        $newPass = $_REQUEST['newPassword'];
        $reNewPass = $_REQUEST['reNewPassword'];
    }
    $check->changePass($newPass,$_SESSION['user']);

    unset($_SESSION['user']);
    header('location: ../login/login.php');
}
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
</div>
<div class="container">
    <div class="col-5">
        <form method="post">
            <div class="form-group">
                <label>Current password</label>
                <input type="password" class="form-control" name="currentPassword">
                <?php if (isset($error['currentPassword'])): ?>
                    <?php echo $error['currentPassword'] ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>New password</label>
                <input type="password" class="form-control" name="newPassword">
                <?php if (isset($error['newPassword'])): ?>
                    <?php echo $error['newPassword'] ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Enter the password</label>
                <input type="password" class="form-control" name="reNewPassword">
                <?php if (isset($error['reNewPassword'])): ?>
                    <?php echo $error['reNewPassword'] ?>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="changePass">Change Password</button>
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
