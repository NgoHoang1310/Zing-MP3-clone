<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="name" content="<?= htmlspecialchars($myjson) ?>">
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
    <link rel="stylesheet" href="../public/css/playlistPage.css">
    <link rel="stylesheet" href="../public/font/css/all.css">
    <link rel="stylesheet" href="../public/img/Anh chưa thương em đến vậy đâu.jpg">
    <link rel="stylesheet" href="../public/audio/KhongCanPhaiHuaDauEm-KhaiDang-7129808.mp3">
</head>

<body>
    <div class="row min-width position-relative container-app ">
        <div class="col-2 pe-0 ">
            <div class="left-sideBar">
               
                <div class="app-logo d-flex align-items-center justify-content-center">
                    <img style="width: 50px; height: 50px; border-radius: 50%;" src="https://cdn-icons-png.flaticon.com/512/9973/9973495.png" alt="">
                    <a class="logo-link w-75 ms-1" href="main.php?page_layout=discoverPage">Music Player</a>
                </div>

                <div class="sideBar-primary ">
                    <ul class="sideBar-primary__list">
                        <a id="discoverTab" href="../views/main.php?page_layout=discoverPage" class="sideBar-primary__item sideBar-active text-white text-decoration-none">
                            <div class="w-75 d-flex mx-auto">
                                <span><i class="fa-solid fa-compact-disc"></i></span>
                                <span class="flex-fill sideBar-primary__item--text ms-3">Khám Phá</span>
                                <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
                            </div>

                        </a>


                        <li id="chartTab" class="sideBar-primary__item  ">
                            <div class="w-75 d-flex mx-auto">
                                <span><i class="fa-solid fa-chart-simple"></i></i></span>
                                <span class="flex-fill sideBar-primary__item--text ms-3">#zingChart</span>
                                <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
                            </div>
                        </li>

                        <a id="librarySongTab" href="../views/main.php?page_layout=librarySongPage" class="sideBar-primary__item  text-white text-decoration-none ">
                            <div class="w-75 d-flex mx-auto">
                                <span><i class="fa-solid fa-bars"></i></i></span>
                                <span class="flex-fill sideBar-primary__item--text ms-3">Thư viện</span>
                                <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
                            </div>
                        </a>

                        <li class="sideBar-primary__item separate">
                            <div class="w-75 d-flex mx-auto">
                                <span class="sideBar-primary__separate"></span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="sideBar-feature">
                    <ul class="sideBar-primary__list">
                        <a href="../views/main.php?page_layout=currentListenPage" id="listenedTab" class="sideBar-primary__item  text-white text-decoration-none ">
                            <div class="w-75 d-flex mx-auto">
                                <span><i class="fa-solid fa-clock-rotate-left"></i></span>
                                <span class="flex-fill sideBar-primary__item--text ms-3">Nghe gần đây</span>
                            </div>

                        </a>

                        <a href="../views/main.php?page_layout=favouriteSongPage" id="favouriteTab" class="sideBar-primary__item  text-white text-decoration-none">
                            <div class="w-75 d-flex mx-auto">
                                <span><i class="fa-solid fa-heart"></i></span>
                                <span class="flex-fill sideBar-primary__item--text ms-3">Bài hát yêu thích</span>
                            </div>
                        </a>

                        <a href="../views/main.php?page_layout=playlistPage" id="playlistTab" class="sideBar-primary__item  text-white text-decoration-none">
                            <div class="w-75 d-flex mx-auto">
                                <span><i class="fa-solid fa-bars"></i></span>
                                <span class="flex-fill sideBar-primary__item--text ms-3">Playlist</span>
                            </div>
                        </a>

                        <a href="../views/main.php?page_layout=albumPage" id="albumTab" class="sideBar-primary__item  text-white text-decoration-none">
                            <div class="w-75 d-flex mx-auto">
                                <span><i class="fa-solid fa-layer-group"></i></span>
                                <span class="flex-fill sideBar-primary__item--text ms-3">Album</span>
                            </div>
                        </a>
                    </ul>
                </div>

                <div class="sideBar-addPlayList">
                    <div class="w-75 d-flex mx-auto">
                        <span><i class="fa-solid fa-plus"></i></span>
                        <span class="flex-fill sideBar-addPlayList__text ms-3" data-bs-toggle="modal" data-bs-target="#confirmAddPlaylist">Tạo PlayList mới</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- leftsidebar -->

        <div class="col-10 header_and_content">
            <header class="nav-header p-16">
                <div class="nav-header__controllers">
                    <div class="controllers-button me-3 p-8">
                        <div class="cotrollers-button__prev fs-2">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <div class="cotrollers-button__next fs-2">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>

                    <div class="controllers-search">
                        <input placeholder="Tìm kiếm nghệ sỹ, bài hát" type="text" class="controllers-search__input">
                    </div>
                </div>

                <div class="nav-header__personal p-8">
                    <div class="nav-header__personal--setting " data-bs-toggle="dropdown">
                        <span>
                            <i class="fa-solid fa-gear "></i>
                        </span>
                        <ul class="dropdown-menu dropdown-menu__setting">
                            <li><a class="dropdown-item dropdown-menu__setting--item d-flex justify-content-around align-items-center fs-3" href="#">
                                    <i class="fa-solid fa-brush" style="color: white;"></i>
                                    <span style="color: white;">Giao diện</span>
                                    <i class="fa-solid fa-chevron-right" style="color: white"></i>
                                </a></li>
                            <li><a class="dropdown-item dropdown-menu__setting--item d-flex justify-content-around align-items-center fs-3" href="#">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <span>Giới thiệu</span>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a></li>
                            <li><a class="dropdown-item dropdown-menu__setting--item d-flex justify-content-around align-items-center fs-3" href="#">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Liên hệ</span>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a></li>
                            <li><a class="dropdown-item dropdown-menu__setting--item d-flex justify-content-around align-items-center fs-3" href="#">
                                    <i class="fa-solid fa-handshake"></i>
                                    <span>Thỏa thuận sử dụng</span>
                                    <i class="fa-solid fa-chevron-right invisible" style="color: #7c728c;"></i>
                                </a></li>
                            <li><a class="dropdown-item dropdown-menu__setting--item d-flex justify-content-around align-items-center fs-3" href="#">
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <span>Chính sách bảo mật</span>
                                    <i class="fa-solid fa-chevron-right invisible" style="color: #7c728c;"></i>
                                </a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <div class="nav-header__personal--account" data-bs-toggle="dropdown">
                            <img src="../public/img/avatar/7680768d2115009e96ad70bd57146e74.jpg" alt="" class="personal-account__image">
                            <ul class="dropdown-menu dropdown-menu__account">
                                <li class="dropdown-item dropdown-menu__account--item d-flex align-items-center">
                                    <img src="../public/img/avatar/7680768d2115009e96ad70bd57146e74.jpg" alt="" class="dropdown-menu__account--image w-25 rounded-circle">
                                    <div class="dropdown-menu__account--info text-white ms-3">
                                        <h1 class="account-info__name w-100">Ngô Tuấn Hoàng</h1>
                                        <span class="account-info__type fs-2">Basic</span>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item dropdown-menu__account--item fs-3 text-white" href="#">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <span class="ms-3">Đăng xuất</span>
                                    </a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </header>
            <!-- header -->

            <!-- Content -->
            <div id="main" class="container-content">
                <?php
                switch ($_GET['page_layout']) {
                    case 'discoverPage': {
                            include_once('../views/discoverPage.php');
                            break;
                        }
                    case 'discoverPageAll': {
                            include_once('../views/discoverPageAll.php');
                            break;
                        }
                    case 'librarySongPage': {
                            include_once('../views/librarySongPage.php');
                            break;
                        }
                    case 'currentListenPage': {
                            include_once('../views/currentListenPage.php');
                            break;
                        }
                    case 'favouriteSongPage': {
                            include_once('../views/favouriteSongPage.php');
                            break;
                        }
                    case 'playlistPage': {
                            include_once('../views/playlistPage.php');
                            break;
                        }
                    case 'playlistDetail': {
                            include_once('../views/playlistDetail.php');
                            break;
                        }
                    case 'albumPage': {
                            include_once('../views/albumPage.php');
                            break;
                        }

                    default:
                        include_once('../views/discoverPage.php');
                        break;
                }
                ?>


            </div>
            <!-- Content -->
            <!-- modal thêm playlist -->
            <div class="modal addPlaylist fade" id="confirmAddPlaylist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-white">
                        <div class="modal-header border-bottom-0 ">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Tạo Playlist</h1>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body ">
                            <input type="text" name="playlistTitle" class="playlist-title__input" required name="playlistTitle" placeholder="Nhập tên playlist" oninput="handleInput(this,'confirmAddPlaylist')">
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary fs-3" data-bs-dismiss="modal" onclick="addPlaylist()" disabled>Tạo mới</button>
                        </div>
                    </div>
                </div>
            </div>

             <!-- modal xác nhận đổi tên playlist -->
          <div class="modal addPlaylist fade" id="confirmRenamePlaylist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-white">
                        <div class="modal-header border-bottom-0 ">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Đổi tên Playlist</h1>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body ">
                            <input type="text" name="playlistTitle" class="playlist-title__input" required name="playlistTitle" placeholder="Nhập tên playlist" oninput="handleInput(this,'confirmRenamePlaylist')">
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary fs-3" data-bs-dismiss="modal" disabled onclick="renamePlaylist()" >Đổi tên</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <footer class="d-flex player-music-center pt-3 pb-3">
            <div id="music-media" class=" col-4 d-flex text-white justify-content-around align-items-center">
                <img src="..." alt="..." class="music-control__image ms-5">
                <div class="music-control__name flex-fill ms-5">
                    <h3></h3>
                    <span>
                        <a class="music-control__name--artist" style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">,</a>
                        <a class="music-control__name--album" style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""></a>
                    </span>
                </div>
                <div class="music-control__interact fs-4">
                    <i class="loveSong fa-solid fa-heart me-3"></i>
                </div>
            </div>

            <div class="col-4 pe-5 ps-5">
                <div class="player">
                    <div class="player-control">
                        <span class="player-control__function replay btn-hover">
                            <i class="fa-solid fa-reply"></i>
                        </span>
                        <span class="player-control__function previous btn-hover">
                            <i class="fa-solid fa-backward"></i>

                        </span>
                        <span class="player-control__function play btn-hover">
                            <i class="fa-solid fa-play"></i>
                        </span>
                        <span class="player-control__function pause disable btn-hover">
                            <i class="fa-solid fa-pause"></i>
                        </span>
                        <span class="player-control__function next btn-hover">
                            <i class="fa-solid fa-forward"></i>
                        </span>
                        <span class="player-control__function random btn-hover">
                            <i class="fa-solid fa-shuffle"></i>
                        </span>
                    </div>
                    <input type="range" value="0" step="1" min="0" max="100" class="player-control__range">

                    <audio src="" class="audioSrc"></audio>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="music-control__adjust d-flex fs-4">
                    <span class="music-control__adjust--volumn d-flex align-items-center pe-5">
                        <i class="fa-solid fa-volume-high" style="color: #ffffff;"></i>
                        <input type="range" value="0.3" min="0" max="1" step="0.001" class="input-range__volume ms-3">
                    </span>
                    <span><i class="fa-solid fa-list ps-5 pt-3 pb-3 me-5" style="color: #ffffff; border-left:solid 1px #ccc;"></i></span>
                </div>
            </div>
        </footer>

    </div>
</body>
<script type="text/javascript" src="../routes/web.js"></script>
<script type="text/javascript" src="../public/js/slider.js"></script>
<script type="text/javascript" src="../public/js/SwitchTab.js"></script>
<script type="text/javascript" src="../public/js/handlePlayMusic.js"></script>
<script type="text/javascript" src="../public/js/handleLibraryTab.js"></script>
<script type="text/javascript" src="../public/js/addSong.js"></script>
<script type="text/javascript" src="../public/js/removeSong.js"></script>
<script type="text/javascript" src="../public/js/addPlaylist.js"></script>
<script type="text/javascript" src="../public/js/removePlaylist.js"></script>
<script type="text/javascript" src="../public/js/renamePlaylist.js"></script>
</html>
<!-- footer -->