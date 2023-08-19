<!-- <?php
ob_start();
session_start();
include_once('../model/connectDB.php');
 ?>
<?php
$sql = "SELECT * FROM Songs";
$result =$conn->query($sql);
$i=0;

while($row[$i] = $result->fetch_assoc()){
    $myarr = array($row[$i]);
    array_push($myarr);
    $i++;
}

$myjson = json_encode($row);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="name" content="<?=htmlspecialchars($myjson) ?>" >
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9973/9973495.png">
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/discoverPage.css">
    <link rel="stylesheet" href="../public/css/libraryPage.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/leftSideBar.css">
    <link rel="stylesheet" href="../public/font/css/all.css">
    <link rel="stylesheet" href="/src/public/img/Có em chờ.jpg">
    <link rel="stylesheet" href="/src/public/audio/CoEmCho-MINMrA-4928332.mp3">
</head>
<body>
   <div class="row min-width position-relative container-app ">
        <div class="col-2 pe-0 " >
        <div class="left-sideBar">
        <div class="app-logo d-flex align-items-center justify-content-center">
            <img style="width: 50px; height: 50px; border-radius: 50%;" src="https://cdn-icons-png.flaticon.com/512/9973/9973495.png" alt="">
            <a class="logo-link w-75 ms-1" href="">Music Player</a>
        </div>

        <div class="sideBar-primary ">
            <ul class="sideBar-primary__list">
                <li class="sideBar-primary__item sideBar-active">
                    <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-compact-disc"></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3"><a href="../views/discoverPage.php">Khám Phá</a></span>
                    <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
                    </div>
                   
                </li>


                <li class="sideBar-primary__item">
                <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-chart-simple"></i></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3" >#zingChart</span>
                    <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
                    </div>
                </li>

                <li class="sideBar-primary__item ">
                <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-bars"></i></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3" ><a href="../views/LibrarySongPage.php">Thư viện</a></span>
                    <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
                    </div>
                </li>
                
                <li class="sideBar-primary__item separate">
                <div class="w-75 d-flex mx-auto" >
                   <span class="sideBar-primary__separate" ></span>
                   </div>
                </li>
            </ul>
        </div>

         <div class="sideBar-feature">
            <ul class="sideBar-primary__list">
                <li class="sideBar-primary__item ">
                    <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-clock-rotate-left"></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3">Nghe gần đây</span>
                    </div>
                   
                </li>

                <li class="sideBar-primary__item">
                <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-heart"></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3" >Bài hát yêu thích</span>
                    </div>
                </li>

                <li class="sideBar-primary__item">
                <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-bars"></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3" >Playlist</span>
                    </div>
                </li>

                <li class="sideBar-primary__item">
                <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-layer-group"></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3" >Album</span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="sideBar-addPlayList">
        <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-plus"></i></span>
                    <span class="flex-fill sideBar-addPlayList__text ms-3" >Tạo PlayList mới</span>
                    </div>
        </div>
     </div>
        </div> -->