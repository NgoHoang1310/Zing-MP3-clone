<?php if ($_GET['page_layout'] == 'discoverPage') { ?>
    <li class="sideBar-primary__item sideBar-active">
        <a class="w-75 d-flex mx-auto text-white text-decoration-none" href="../views/discoverPage.php?page_layout=discoverPage">
            <span><i class="fa-solid fa-bars"></i></i></span>
            <span class="flex-fill sideBar-primary__item--text ms-3">Khám phá</span>
            <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
        </a>
    </li>
<?php } else { ?>
    <li class="sideBar-primary__item ">
        <a class="w-75 d-flex mx-auto text-white text-decoration-none " href="../views/discoverPage.php?page_layout=discoverPage" >
            <span><i class="fa-solid fa-bars"></i></i></span>
            <span class="flex-fill sideBar-primary__item--text ms-3">Khám phá</span>
            <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
        </a>
    </li>

<?php } ?>