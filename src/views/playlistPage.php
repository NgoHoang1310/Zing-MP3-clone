<!-- content -->

<div class="main-content">
    <div class="library-header">
        <span class="library-header__text text-white d-flex align-items-center">
            <h1 style="font-size: 40px; font-weight: 700;">Playlist</h1>
            <span class="library-header__icon-play ms-3">
                <i class="fa-solid fa-play text-black fs-4 "></i>
            </span>
        </span>
    </div>

    <div class="library-nav mt-5">
        <ul class="nav nav-underline fs-2">
            <li class="nav-item me-3">
                <a id="songTab" class="nav-link activeTopBar" href="../views/main.php?page_layout=librarySongPage">Tất cả</a>
            </li>
        </ul>
    </div>

    <!-- <div class="library-empty text-white">
        <div class="library-empty__icon">
            <i class="fa-solid fa-music"></i>
        </div>

        <span class="library-empty__title fs-3">Chưa có playlist cá nhân</span>

        <div class="library-empty__discover fs-2">Thêm playlist mới</div>
    </div> -->

    <div class="playlist-container d-flex flex-wrap">
        <div class="col-2 playlist-create-item mt-5" data-bs-toggle="modal" data-bs-target="#confirmAddPlaylist">
            <span class="playlist-create-icon mb-3">
                <i class="fa-solid fa-plus"></i>
            </span>
            <span class="playlist-create-text">Tạo Playlist mới</span>
        </div>
        <?php
        include_once('../controllers/renderView.php');
        $playlist = new querySQL();
        $result = $playlist->renderPlaylist();
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div id="<?php echo $row['playlist_id'] ?>" class="col-2 playlist-list mt-5">
                    <div class="playlist-list__item">
                        <div class="playlist-image position-relative ">
                            <img src="../public/img/Anh chưa thương em đến vậy đâu.jpg" alt="">
                            <div class="playlist-control">
                                <span class="playlist-control__delete" data-bs-toggle="modal" data-bs-target="#confirmDeletePlaylist" onclick="getPlaylistId(this)">
                                    <i class="fa-solid fa-xmark"></i>
                                </span>
                                <a href="../views/main.php?page_layout=playlistDetail<?php echo "&playlistId=" . $row['playlist_id'] ?> " class="playlist-control__play text-white" onclick="navigateToPlaylistDetail(event,this.getAttribute('href'),this)">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                                <span class="playlist-control__rename" data-bs-toggle="modal" data-bs-target="#confirmRenamePlaylist" onclick="getPlaylistId(this)">
                                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                                </span>
                            </div>
                        </div>
                        <span class="playlist-title mt-3"><?php echo $row['title'] ?></span>
                        <span class="playlist-user">Ngô Tuấn Hoàng</span>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <!-- modal xác nhận xóa playlist -->
    <div class="modal addPlaylist fade" id="confirmDeletePlaylist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-white">
                <div class="modal-header border-bottom-0 ">
                    <h1 class="modal-title fs-2" id="staticBackdropLabel">Xóa Playlist</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body ">
                    <h2>Bạn có muốn xóa Playlist này không?</h2>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary fs-3" data-bs-dismiss="modal" onclick="confirmRemove()">Xóa</button>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- content -->