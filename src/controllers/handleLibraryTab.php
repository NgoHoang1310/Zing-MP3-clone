<?php if ($_GET['page_layout'] == 'librarySongPage') { ?>
    <li class="sideBar-primary__item sideBar-active">
        <a class="w-75 d-flex mx-auto text-white text-decoration-none " href="../views/librarySongPage.php?page_layout=librarySongPage" >
            <span><i class="fa-solid fa-bars"></i></i></span>
            <span class="flex-fill sideBar-primary__item--text ms-3">Thư viện</span>
            <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
        </a>
    </li>
<?php } else { ?>
    <li class="sideBar-primary__item ">
        <a class="w-75 d-flex mx-auto text-white text-decoration-none " href="../views/librarySongPage.php?page_layout=librarySongPage" >
            <span><i class="fa-solid fa-bars"></i></i></span>
            <span class="flex-fill sideBar-primary__item--text ms-3">Thư viện</span>
            <span class="sideBar-primary__item--play"><i class="fa-solid fa-play"></i></span>
        </a>
    </li>

<?php } ?>