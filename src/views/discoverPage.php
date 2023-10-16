<?php
session_start();
if (!isset($_SESSION['data']['user'])) {
    header('location: ./layouts/authLayouts/loginPage.php');
}
error_reporting(0);
?>
<div id="discoverPage" class="main-content">

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
    <div class="new_release ">
        <h3>Mới Phát Hành</h3>
        <div class="new_release-nav d-flex justify-content-between mt-5">
            <div class="new_release-nav-btn">
                <a href="../views/main.php?page_layout=discoverPage&country=ALL" id="ALL" class="new_release__btn <?php echo (($_REQUEST["country"] == 'ALL')) ? 'new-release-active' : '' ?>" onclick="fillterByCountry(this.id,this,'discoverPage.php')">TẤT CẢ</a>
                <a href="../views/main.php?page_layout=discoverPage&country=VN" id="VN" class="new_release__btn <?php echo (($_REQUEST["country"] == 'VN')) ? 'new-release-active' : '' ?>" onclick="fillterByCountry(this.id,this,'discoverPage.php')">VIỆT NAM</a>
                <a href="../views/main.php?page_layout=discoverPage&country=US" id="US" class="new_release__btn <?php echo (($_REQUEST["country"] == 'US')) ? 'new-release-active' : '' ?>" onclick="fillterByCountry(this.id,this,'discoverPage.php')">QUỐC TẾ</a>
            </div>

            <a class="new_release-nav-all fs-4 text-white d-block text-decoration-none me-5" href="../views/main.php?page_layout=discoverPageAll" onclick="navigateToAll(event, this.getAttribute('href'))">TẤT CẢ</a>
        </div>

        <div class="row new_release__list">

            <?php
            include_once('../controllers/renderView.php');
            // render playlist phần thêm playlist
            $playlist = new querySQL();
            // <!-- render bài hát ra view -->
            $discover = new querySQL();
            $result = $discover->renderToDis();
            $index = 0;
            while ($row = $result->fetch_assoc()) {
                $resultPlaylist = $playlist->renderPlaylist();
                $num_rows_playlist = mysqli_num_rows($resultPlaylist);
            ?>

                <div id="<?php echo $row['song_id'] ?>" class=" col-4 new_release__song d-flex text-white justify-content-around align-items-center mt-3" onclick="controllerMusic.clickOnSong(this.id,this)">
                    <img src="<?php echo $row['image'] ?>" alt="" class="song__image ms-5">
                    <div class="song__name flex-fill ms-5">
                        <h3><?php echo $row['title'] ?></h3>
                        <span>
                            <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['artist'] ?>,</a>
                            <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['genre'] ?></a>
                        </span>
                    </div>
                    <!-- sự kiện thêm bài hát -->
                    <div class="song__interact fs-4" onclick="event.stopPropagation()">
                        <div class="dropdown song-item">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu song-menu">
                                <li onclick="addToLib(this),toast('Đã thêm bài hát vào thư viện')" class="dropdown-item ">
                                    <button id="liveToastBtn" type="button" class="btn fs-4 text-white ">Thêm vào thư viện</button>
                                </li>
                                <li class="dropdown-item dropend">
                                    <button type="button" class="btn btn-secondary fs-4 text-white" data-bs-toggle="dropdown" aria-expanded="false">
                                        Thêm vào Playlist
                                    </button>
                                    <?php if ($num_rows_playlist > 0) { ?>
                                        <ul class="dropdown-menu song-menu ">
                                            <?php while ($rowPlaylist = $resultPlaylist->fetch_assoc()) {
                                            ?>
                                                <li><button id="<?php echo $rowPlaylist['playlist_id'] ?>" class="dropdown-item " type="button" onclick="addToPlaylist(this),toast('Đã thêm bài hát vào playlist')"><?php echo $rowPlaylist['title'] ?></button></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            <?php
                $index++;
            }

            ?>



        </div>


    </div>
</div>