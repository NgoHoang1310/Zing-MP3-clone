<?php
$sql = "SELECT * FROM Songs LIMIT 9";
$result = $conn->query($sql);
?>

<div class="main-content">

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
            <div class="new_release-nav-btn ">
                <button class="new_release__btn new-release-active">TẤT CẢ</button>
                <button class="new_release__btn">VIỆT NAM</button>
                <button class="new_release__btn">QUỐC TẾ</button>
            </div>

            <a class="new_release-nav-all fs-4 text-white d-block text-decoration-none me-5" href="../views/main.php?page_layout=discoverPageAll">TẤT CẢ</a>
        </div>

        <div class="row new_release__list">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class=" col-4 new_release__song d-flex text-white justify-content-around align-items-center mt-3">
                    <img src="<?php echo $row['image'] ?>" alt="" class="song__image ms-5">
                    <div class="song__name flex-fill ms-5">
                        <h3><?php echo $row['title'] ?></h3>
                        <span>
                            <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['artist'] ?>,</a>
                            <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""><?php echo $row['album'] ?></a>
                        </span>
                    </div>
                    <div class="song__interact fs-4">
                        <div class="dropdown song-item">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu song-menu">
                                <li><a class="dropdown-item fs-4 text-white" href="#">Thêm vào thư viện</a></li>
                                <li><a class="dropdown-item fs-4 text-white" href="#">Thêm vào playlist</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            <?php } ?>


        </div>


    </div>

</div>