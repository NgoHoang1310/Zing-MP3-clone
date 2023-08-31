<div class="main-content">
    <div class="playlistDetail-content d-flex">
        <div class="col-3 playlist-list mt-5">
            <div class="playlist-list__item">
                <div class="playlist-image position-relative ">
                    <img src="../public/img/Anh chưa thương em đến vậy đâu.jpg" alt="">
                    <div class="playlist-control">
                        <span class="playlist-control__play">
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>

                    </div>
                </div>
                <span class="playlist-title mt-3"></span>
                <span class="playlist-user">Ngô Tuấn Hoàng</span>
            </div>
        </div>
        <div class="col-9 mt-5">
            <?php
            include_once('../controllers/renderView.php');
            $playlistDetail = new querySQL();
            $result = $playlistDetail->renderToPlaylist();
            $isNull = $playlistDetail->checkPlaylistNull();
            if (!($isNull->fetch_assoc())) {
            ?>
                <div class="library-empty text-white">
                    <div class="library-empty__icon">
                        <i class="fa-solid fa-music"></i>
                    </div>

                    <span class="library-empty__title fs-3">Chưa có bài hát trong Playlist</span>

                    <a href="../views/main.php?page_layout=discoverPage" class="library-empty__discover fs-2 text-white text-decoration-none" onclick="goToDiscover(event,this.getAttribute('href'))">Thêm bài hát</a>
                </div>
                <?php } else {
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div id="<?php echo $row['song_id'] ?>" <?php echo "playlistId=".$row['playlist_id'] ?> class="col-12 new_release__song d-flex text-white justify-content-around align-items-center mt-3 " onclick="controllerMusic.clickOnSong(this.id,this)" >
                        <img src="<?php echo $row['image'] ?>" alt="" class="song__image ">
                        <div class="song__name flex-fill ms-5">
                            <h3><?php echo $row['title'] ?></h3>
                            <span>
                                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['artist'] ?>,</a>
                                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['album'] ?></a>
                            </span>
                        </div>
                        <div class="song__interact fs-4">
                            <div class="dropdown song-item" onclick="event.stopPropagation()">
                                <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu song-menu">
                                    <li class="dropdown-item> ">
                                        <button type="button" class="btn liveToastBtn fs-4 text-white " onclick="removeFromPlaylist(this)">Xóa khỏi Playlist</button>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>