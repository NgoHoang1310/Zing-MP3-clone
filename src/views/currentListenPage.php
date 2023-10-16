<!-- content -->
<?php
session_start();
if (!isset($_SESSION['data']['user'])) {
    header('location: ./layouts/authLayouts/loginPage.php');
}
?>
<div class="main-content">
    <div class="library-header">
        <span class="library-header__text text-white d-flex align-items-center">
            <h1 style="font-size: 40px; font-weight: 700;">Nghe gần đây</h1>
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
    include_once('../controllers/renderView.php');
    $listened = new querySQL();
    $result = $listened->renderToCurrentListen();
    $num_rows = mysqli_num_rows($result);
    if ($num_rows <= 0) {
    ?>
        <div class="library-empty text-white">
            <div class="library-empty__icon">
                <i class="fa-solid fa-music"></i>
            </div>

            <span class="library-empty__title fs-3">Chưa có bài hát nào nghe gần đây</span>

            <div class="library-empty__discover fs-2">Nghe nhạc ngay</div>
        </div>
        <?php } else {
        while ($row = $result->fetch_assoc()) {
        ?>
            <div id="<?php echo $row['song_id'] ?>" class=" col-12 new_release__song d-flex text-white justify-content-around align-items-center mt-3" onclick="controllerMusic.clickOnSong(this.id,this)">
                <img src="<?php echo $row['image']; ?>" alt="" class="song__image ">
                <div class="song__name flex-fill ms-5">
                    <h3><?php echo $row['title'] ?></h3>
                    <span>
                        <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['artist'] ?>,</a>
                        <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['genre'] ?></a>
                    </span>
                </div>
            </div>
    <?php }
    } ?>
</div>

<!-- content -->