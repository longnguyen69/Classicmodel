<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../login/login.php');
}

include '../class/Manipulation.php';

$objBook = new Manipulation();
$update = $objBook->getBook($_REQUEST['code']);
$categoriesID = $objBook->showCategories();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
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
            Edit Book
        </div>
        <div class="card-body">
            <form method="post" action="../action/updateBook.php?code=<?php echo $_REQUEST['code']?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Book Name </label>
                    <input type="text" class="form-control" name="name" value="<?php echo $update['name'] ?>">
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" class="form-control" name="author" value="<?php echo $update['author'] ?>">
                </div>
                <div class="form-group">
                    <label>Publish</label>
                    <input type="text" class="form-control" name="date" value="<?php echo $update['publish'] ?>">
                </div>
                <div class="form-group">
                    <label>Version</label>
                    <input type="text" class="form-control" name="version" value="<?php echo $update['version_number'] ?>">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $update['price'] ?>">
                </div>
                <div class="form-group">
                    <label>Categories</label>
                    <select class="custom-select" name="categoryID">
                        <?php foreach ($categoriesID as $category): ?>
                            <option
                                <?php if ($category['id'] == $update['category_id']): ?>
                                    selected
                                <?php endif; ?>
                                    value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">

                    <input type="radio" value="1" name="status"
                    <?php if ($update['status'] == 1) { ?>
                        <?php echo 'checked' ?>
                    <?php }?>
                    >Con Hang
                    &emsp;
                    <input type="radio" value="0" name="status"
                        <?php if ($update['status'] == 0) { ?>
                            <?php echo 'checked' ?>
                        <?php }?>
                    >Het Hang

                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img src="../uploads/<?php echo $update['image']?>" width="70px" alt="no display">
                    <input type="file" class="form-control" name="image" value="<?php echo $update['image']?>">
                </div>

                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
        </div>

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
