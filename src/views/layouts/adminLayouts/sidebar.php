<div class="col-2 sidebar">
    <?php
    $page = basename($_SERVER['PHP_SELF']);
    ?>
    <ul class="sidebar-list ">
        <li class="sidebar-list__item <?php echo ($page == "dardboard.php") ? 'active' : '' ?>">
            <span>
                <i class="fas fa-home"></i>
            </span>
            <a class="sidebar-list__item--link" href="./dardboard.php">Dardboard</a>
        </li>
        <li class="sidebar-list__item <?php echo ($page == "manageUser.php") ? 'active' : '' ?>">
            <span>
                <i class="fas fa-user"></i>
            </span>
            <a class="sidebar-list__item--link" href="./manageUser.php">Quản lí người dùng</a>
        </li>
        <li class="sidebar-list__item <?php echo ($page == "manageMusic.php") ? 'active' : '' ?>">
            <span>
                <i class="fas fa-music"></i>
            </span>
            <a class="sidebar-list__item--link" href="./manageMusic.php"> Quản lí bài hát</a>
        </li>
    </ul>
</div>