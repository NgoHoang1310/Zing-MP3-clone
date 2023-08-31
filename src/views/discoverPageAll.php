<!-- content -->
<div class="main-content">
    <div class="library-header">
        <span class="library-header__text text-white d-flex align-items-center">
            <h1 style="font-size: 40px; font-weight: 700;">Mới phát hành</h1>
            <span class="library-header__icon-play ms-3">
                <i class="fa-solid fa-play text-black fs-4 "></i>
            </span>
        </span>
    </div>

    <div class="library-nav mt-5">
        <ul class="nav nav-underline fs-2">
            <li class="nav-item me-3">
                <a class="nav-link active" href="#">Tất cả bài hát</a>
            </li>
        </ul>
    </div>

    <div class="library-listSong text-white">
        <div class="new_release-nav d-flex justify-content-between mt-5">
            <div class="new_release-nav-btn ">
                <button class="new_release__btn new-release-active">TẤT CẢ</button>
                <button class="new_release__btn">VIỆT NAM</button>
                <button class="new_release__btn">QUỐC TẾ</button>
            </div>
        </div>
        <div class="library-songContent">
            <div class="library-songContent__header">
                <h2 class="">Bài hát</h2>
            </div>
            <div class="library-songItem me-3">
                <!-- render bài hát ra view -->
                <?php
                include_once('../controllers/renderView.php');
                //render list playlist để chọn thêm bài hát
                $playlist = new querySQL();

                $discoverAll = new querySQL();

                $result = $discoverAll->renderToDisAll();
                while ($row = $result->fetch_assoc()) {
                    $resultPlaylist = $playlist->renderPlaylist();
                    $num_rows_playlist = mysqli_num_rows($resultPlaylist);
                ?>
                    <div id="<?php echo $row['song_id'] ?>" class=" col-12 new_release__song d-flex text-white justify-content-around align-items-center mt-3" onclick="controllerMusic.clickOnSong(this.id,this)">
                        <img src="<?php echo $row['image']; ?>" alt="" class="song__image ">
                        <div class="song__name flex-fill ms-5">
                            <h3><?php echo $row['title']; ?></h3>
                            <span>
                                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['artist']; ?>,</a>
                                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['album']; ?></a>
                            </span>
                        </div>
                        <div class="song__interact fs-4" onclick="event.stopPropagation()">
                            <div class="dropdown song-item">
                                <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu song-menu">
                                    <li onclick="addToLib(this)" class="dropdown-item ">
                                        <button type="button" class="btn liveToastBtn fs-4 text-white ">Thêm vào thư viện</button>
                                    </li>
                                    <li class="dropdown-item dropend">
                                        <button type="button" class="btn btn-secondary fs-4 text-white" data-bs-toggle="dropdown" aria-expanded="false">
                                            Thêm vào Playlist
                                        </button>
                                        <?php if ($num_rows_playlist > 0) { ?>
                                            <ul class="dropdown-menu song-menu ">
                                                <?php while ($rowPlaylist = $resultPlaylist->fetch_assoc()) {
                                                ?>
                                                    <li><button id="<?php echo $rowPlaylist['playlist_id'] ?>" class="dropdown-item " type="button" onclick="addToPlaylist(this)"><?php echo $rowPlaylist['title'] ?></button></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- content -->