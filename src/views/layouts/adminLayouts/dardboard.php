<?php
    session_start();
    if (isset($_SESSION['data'])) {
        unset($_SESSION['data']);
    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9973/9973495.png">
    <link rel="stylesheet" href="../../../public/font/css/all.css">
    <link rel="stylesheet" href="../../../public/css/adminCss/baseAdmin.css">
    <link rel="stylesheet" href="../../../public/css/adminCss/master.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="app">
        <?php
        include_once('../adminLayouts/header.php');
        ?>
        <div class="row d-flex">
            <?php
            include_once('../adminLayouts/sidebar.php');
            ?>
            <div class="col-10 main">
                <div class="content">
                    hello
                </div>
            </div>
        </div>

    </div>
</body>

</html>