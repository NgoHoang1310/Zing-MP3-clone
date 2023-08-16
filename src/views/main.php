<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9973/9973495.png">
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/discoverPage.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/leftSideBar.css">
    <link rel="stylesheet" href="../public/font/css/all.css">
</head>
<body>
   <div class="row position-relative">
        <div class="col-2 pe-0 ">
        <div class="left-sideBar">
        <div class="app-logo d-flex align-items-center justify-content-center">
            <img style="width: 50px; height: 50px; border-radius: 50%;" src="https://cdn-icons-png.flaticon.com/512/9973/9973495.png" alt="">
            <a class="logo-link w-75 ms-1" href="">Music Player</a>
        </div>

        <div class="sideBar-primary">
            <ul class="sideBar-primary__list">
                <li class="sideBar-primary__item sideBar-active">
                    <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-compact-disc"></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3">Khám Phá</span>
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

                <li class="sideBar-primary__item">
                <div class="w-75 d-flex mx-auto" >
                    <span><i class="fa-solid fa-bars"></i></i></span>
                    <span class="flex-fill sideBar-primary__item--text ms-3" >Thư viện</span>
                    <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
                    </div>
                </li>

                <li class="sideBar-primary__item">
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
        </div>
    <!-- leftsibar -->
<div style="background-color: #170f23; height: 70px;" class=" col-10" >
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
              <input placeholder="Tìm kiếm nghệ sỹ, bài hát" type="text" class="controllers-search__input" >
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
                  <span style="color: white;" >Giao diện</span>
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
                    <img src="https://scontent-hkt1-1.xx.fbcdn.net/v/t39.30808-1/241370012_990898578360523_2877865728324212326_n.jpg?stp=cp0_dst-jpg_p60x60&_nc_cat=110&ccb=1-7&_nc_sid=2b6aad&_nc_ohc=WHdujoSL1IcAX86skm2&_nc_ht=scontent-hkt1-1.xx&oh=00_AfDEnOOOjCeChTyaRnzVEuV3SOFtxOTTmTH-L-LxmBQTCg&oe=64DDA046" alt="" class="personal-account__image" >
                    <ul class="dropdown-menu dropdown-menu__account">
                      <li class="dropdown-item dropdown-menu__account--item d-flex align-items-center">
                        <img src="https://scontent-hkt1-1.xx.fbcdn.net/v/t39.30808-1/241370012_990898578360523_2877865728324212326_n.jpg?stp=cp0_dst-jpg_p60x60&_nc_cat=110&ccb=1-7&_nc_sid=2b6aad&_nc_ohc=WHdujoSL1IcAX86skm2&_nc_ht=scontent-hkt1-1.xx&oh=00_AfDEnOOOjCeChTyaRnzVEuV3SOFtxOTTmTH-L-LxmBQTCg&oe=64DDA046" alt="" class="dropdown-menu__account--image w-25 rounded-circle">
                        <div class="dropdown-menu__account--info text-white ms-3">
                          <h1 class="account-info__name w-100" >Ngô Tuấn Hoàng</h1>
                          <span class="account-info__type fs-2" >Basic</span>
                        </div>
                      </li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item dropdown-menu__account--item fs-3 text-white" href="#">
                      <i class="fa-solid fa-right-from-bracket"></i>
                       <span class="ms-3" >Đăng xuất</span>
                      </a></li>
                    </ul>
                  </div>

                </div>
          </div>
        </header>
        <!-- header -->
        <div class="row" >
        <div class="hot_list">
        <div class="slide_show">
        <div class="slide_show__item"><img classs="slide_show__img" src="../public/img/img1.jpg" alt=""></div>
        <div class="slide_show__item"><img classs="slide_show__img" src="../public/img/img2.jpg" alt=""></div>
        <div class="slide_show__item"><img classs="slide_show__img" src="../public/img/img3.jpg" alt=""></div>
        <div class="slide_show__item"><img classs="slide_show__img" src="../public/img/img4.jpg" alt=""></div>
        <div class="slide_show__item"><img classs="slide_show__img" src="../public/img/img5.jpg" alt=""></div>
        </div>
        <button class="slide_show_pre"><i class="fa-solid fa-angle-left"></i></button>
        <button class="slide_show_next"><i class="fa-solid fa-angle-right"></i></button>
    </div> 
    <div class="new_release">
        <h3>Mới Phát Hành</h3>
        <button class="new_release__btn">TẤT CẢ</button>
        <button class="new_release__btn">VIỆT NAM</button>
        <button class="new_release__btn">QUỐC TẾ</button>
        <div class="new_release__list">
            <div class="new_release__list__item"></div>
            <div class="new_release__list__item"></div>
            <div class="new_release__list__item"></div>
        </div>
    </div>

        </div>

        </div>
    

        
<footer class="d-flex player-music-center pt-3 pb-3" >
        <div class=" col-4 d-flex text-white justify-content-around align-items-center">
          <img src="https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_webp/avatars/7/3/73383810fd150ec17baaece153c60e17_1476238829.jpg" alt="" class="music-control__image ms-5">
          <div class="music-control__name flex-fill ms-5" >
            <h3>Đường 1 chiều</h3>
            <span>
                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">Huỳnh Tú,</a>
                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">Magazing</a>
            </span>
          </div>

          <div class="music-control__interact fs-4">
          <i class="fa-solid fa-heart me-3"></i>
          <i class="fas fa-ellipsis-h"></i>
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
                    <span class="player-control__function play">
                        <i class="fa-solid fa-play"></i>
                    </span>
                    <span class="player-control__function pause disable">
                        <i class="fa-solid fa-pause"></i>
                    </span>
                    <span class="player-control__function next btn-hover">
                        <i class="fa-solid fa-forward"></i>
                    </span>
                    <span class="player-control__function random btn-hover">
                        <i class="fa-solid fa-shuffle"></i>
                    </span>
                </div>
                <input type="range" value="0" step="1" min="0" max="1000" class="player-control__range">
                <audio class="audioSrc"></audio>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center" >
            <div class="music-control__adjust d-flex fs-4">
                <span class="music-control__adjust--volumn d-flex align-items-center pe-5" >
                    <i class="fa-solid fa-volume-high" style="color: #ffffff;"></i>
                    <input type="range" value="0" min="0" max= "100" class="input-range ms-3">
                </span>
                <span><i class="fa-solid fa-list ps-5 pt-3 pb-3 me-5" style="color: #ffffff; border-left:solid 1px #ccc;" ></i></span>
            </div>
        </div>
    </footer>

   </div>
</body> 

<script type="text/javascript"  src="../public/js/main.js"></script>
</html>

        

 