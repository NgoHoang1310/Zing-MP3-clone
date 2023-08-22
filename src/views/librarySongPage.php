<!-- content -->

<div class="main-content">
    <div class="library-header">
        <span class="library-header__text text-white d-flex align-items-center">
            <h1 style="font-size: 40px; font-weight: 700;">Thư viện</h1>
            <span class="library-header__icon-play ms-3">
                <i class="fa-solid fa-play text-black fs-4 "></i>
            </span>
        </span>
    </div>

    <div class="library-nav mt-5">
        <ul class="nav nav-underline fs-2">
            <li class="nav-item me-3">
                <a id="songTab" class="nav-link activeTopBar" href="../views/main.php?page_layout=librarySongPage">Bài hát</a>
            </li>
        </ul>
    </div>
    <?php
    include_once('../model/connectDB.php');
    $sql = "SELECT * FROM librarysong";
    $result = $conn->query($sql);
    if ($row = $result->fetch_array()==0) {
    ?>
        <div class="library-empty text-white">
            <div class="library-empty__icon">
                <i class="fa-solid fa-music"></i>
            </div>

            <span class="library-empty__title fs-3">Chưa có bài hát trong thư viện cá nhân</span>

            <a href="../views/main.php?page_layout=discoverPage" class="library-empty__discover fs-2 text-white text-decoration-none" onclick="goToDiscover(event,this.getAttribute('href'))" >Khám phá ngay</a>
        </div>
    <?php } else {
    ?>
        <div class=" col-12 new_release__song d-flex text-white justify-content-around align-items-center mt-3">
            <img src="" alt="" class="song__image ">
            <div class="song__name flex-fill ms-5">
                <h3></h3>
                <span>
                    <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">,</a>
                    <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""></a>
                </span>
            </div>
            <div class="song__interact fs-4">
                <div class="dropdown song-item">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <ul class="dropdown-menu song-menu">
                        <li><a class="dropdown-item fs-4 text-white" href="#">Xóa khỏi thư viện</a></li>
                    </ul>
                </div>

            </div>
        </div>
    <?php } ?>
</div>

<!-- content -->