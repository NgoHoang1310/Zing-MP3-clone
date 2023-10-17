<?php
session_start();
if (isset($_SESSION['data']['user'])) {
    unset($_SESSION['data']);
}
error_reporting(0);
include('../../../controllers/admin/crudMusic.php');
include('../../../controllers/admin/crudUser.php');
$arrUser = array();
$resultUser = $user->getAllUser();
$arrMusic = array();
$resultMusic = $music->getAllMusic();
while (($row_1 = $resultUser->fetch_assoc())) {
    array_push($arrUser, $row_1);
}
while (($row_2 = $resultMusic->fetch_assoc())) {
    array_push($arrMusic, $row_2);
}
$adminQuantity = 0;
$userQuantity = 0;
foreach ($arrUser as $item) {
    if ($item['Role'] == 1) {
        $adminQuantity++;
    } else {
        $userQuantity++;
    }
}
$songOutStanding = $music->songOutStanding()->fetch_assoc()['title'];
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
                <h1 id="header">
                    MUSIC PLAYER
                </h1>
                <div class="content d-flex">
                    <div class="col-6 darhBoard-Music">
                        <div class="darhBoard-Music__Container">
                            <h1 class="text-white text-center pt-3">Tổng số bài hát</h1>
                            <span class="quantity music-quantity"><?php echo count($arrMusic) ?></span>
                            <h3 class="text-white text-center pt-3">Bài hát mới nhất</h3>
                            <span class="quantity music-quantity"><?php print_r($arrMusic[0]['title']) ?></span>
                            <h3 class="text-white text-center pt-3">Nghe nhiều nhất</h3>
                            <span class="quantity music-quantity"><?php echo $songOutStanding ?></span>
                        </div>
                    </div>
                    <div class="col-6 darhBoard-User">
                        <div class="darhBoard-User__Container">
                            <h1 class="text-white text-center pt-3">Tổng số người dùng</h1>
                            <span class="quantity music-quantity"><?php echo count($arrUser) ?></span>
                            <h3 class="text-white text-center pt-3">Admin</h3>
                            <span class="quantity music-quantity"><?php echo $adminQuantity ?></span>
                            <h3 class="text-white text-center pt-3">User</h3>
                            <span class="quantity music-quantity"><?php echo $userQuantity ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>