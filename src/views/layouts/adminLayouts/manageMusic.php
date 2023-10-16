<?php
// session_start();
// if (!isset($_SESSION['data'])) {
//    header('location: ../authLayouts/loginPage.php');
// }
// error_reporting(0);
include('../../../controllers/admin/crudMusic.php');
$arrMusic = array();
$result = $music->getAllMusic();
while ($row = $result->fetch_assoc()) {
    array_push($arrMusic, $row);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9973/9973495.png">
    <link rel="stylesheet" href="../../../public/font/css/all.css">
    <link rel="stylesheet" href="../../../public/css/adminCss/baseAdmin.css">
    <link rel="stylesheet" href="../../../public/css/adminCss/master.css">
    <link rel="stylesheet" href="../../../public/img/avatar/7680768d2115009e96ad70bd57146e74.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../public/js/admin/handleManageUser.js"></script>
</head>

<body>
    <div class="app">
        <?php
        include_once('../adminLayouts/header.php');
        ?>
        <div class="row d-flex">
            <?php
            include_once('../adminLayouts/sidebar.php');
            ?>
            <div class="col-10 main">
                <h1 id="header">
                    QUẢN LÍ BÀI HÁT
                </h1>
                <div class="content">
                    <div class="content-header">
                        <button type="button" class="action-add" data-bs-toggle="modal" data-bs-target="#addNewUser">
                            <i class="fa-solid fa-plus"></i>
                            Bài hát mới
                        </button>
                        <div class="totalUser">
                            <span>Tổng số bài hát: </span>
                            <span><?php echo count($arrMusic) ?></span>
                        </div>
                    </div>
                    <table class="table table-striped table-user  mt-3">
                        <thead>
                            <tr class="">
                                <th scope="col" class="fs-5 text-center">Tên bài hát</th>
                                <th scope="col" class="fs-5 text-center">Ca sĩ</th>
                                <th scope="col" class="fs-5 text-center">Thể loại</th>
                                <th scope="col" class="fs-5 text-center">Quốc gia</th>
                                <th scope="col" class="fs-5 text-center">Ảnh đại diện</th>
                                <th scope="col" class="fs-5 text-center">Audio</th>
                                <th scope="col" class="fs-5 text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($arrMusic); $i++) {
                            ?>
                                <tr class="row-user text-center">
                                    <td><?php print_r($arrMusic[$i]['title']) ?></td>
                                    <td><?php print_r($arrMusic[$i]['artist']) ?></td>
                                    <td><?php print_r($arrMusic[$i]['genre']) ?></td>
                                    <td><?php print_r(($arrMusic[$i]['country'] == 'VN') ? 'Việt Nam' : 'Quốc tế') ?></td>
                                    <td><img class="avatar" src="<?php echo str_replace("../", "../../../", $arrMusic[$i]['image']) ?>" alt=""></td>
                                    <td><audio controls src="<?php echo str_replace("../", "../../../", $arrMusic[$i]['file_path']) ?>"></audio></td>
                                    <td id="<?php print_r($arrMusic[$i]['song_id']) ?>" class="action">
                                        <button class="action-edit" data-bs-toggle="modal" data-bs-target="#editMusic<?php print_r($arrMusic[$i]['song_id']) ?>">
                                            <i class="fa-solid fa-pen"></i>
                                            Sửa
                                        </button>
                                        <button class="action-delete" data-bs-toggle="modal" data-bs-target="#deleteMusic" onclick="getIdDelete(this,'deleteMusic')">
                                            <i class="fa-solid fa-trash"></i>
                                            Xóa
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- modal add -->
                <div class="modal p-3 addPlaylist fade" id="addNewUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 ">
                                <h1 class="modal-title fs-2" id="staticBackdropLabel">Thêm mới bài hát</h1>
                            </div>
                            <div class="modal-body ">
                                <form action="../../../controllers/admin/crudMusic.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" name="NameAdd" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputArtist" class="col-sm-2 col-form-label">Artist</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputArtist" name="ArtistAdd" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputGenre" class="col-sm-2 col-form-label">Genre</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputGenre" name="GenreAdd" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Country</label>
                                        <select id="inputState" class="form-select" name="CountryAdd" required>
                                            <option selected>Choose...</option>
                                            <option value="1">Việt Nam</option>
                                            <option value="2">Quốc tế</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Avatar</label>
                                        <input class="form-control" type="file" id="formFile" name="AvatarAdd" accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Audio</label>
                                        <input class="form-control" type="file" id="formFile" name="AudioAdd" accept="audio/*" required>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary fs-3">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal edit -->
                <?php for ($i = 0; $i < count($arrMusic); $i++) { ?>
                    <div class="modal p-3 addPlaylist fade" id="editMusic<?php print_r($arrMusic[$i]['song_id']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 ">
                                    <h1 class="modal-title fs-2" id="staticBackdropLabel">Sửa thông tin bài hát</h1>
                                </div>
                                <div class="modal-body ">
                                    <form action="../../../controllers/admin/crudMusic.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" name="NameEdit" value="<?php print_r($arrMusic[$i]['title']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputArtist" class="col-sm-2 col-form-label">Artist</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputArtist" name="ArtistEdit" value="<?php print_r($arrMusic[$i]['artist']) ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputGenre" class="col-sm-2 col-form-label">Genre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputGenre" name="GenreEdit" value="<?php print_r($arrMusic[$i]['genre'])  ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Country</label>
                                            <select id="inputState" class="form-select"  name="CountryEdit" required>
                                                <option value="1">Việt Nam</option>
                                                <option value="2">Quốc tế</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Avatar</label>
                                            <input class="form-control" type="file" id="formFile" name="AvatarEdit" accept="image/*">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Audio</label>
                                            <input class="form-control" type="file" id="formFile" name="AudioEdit" accept="audio/*" required>
                                        </div>
                                        <div class="modal-footer border-top-0">
                                            <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" name="edit-btn" class="btn btn-primary fs-3" value="<?php print_r($arrMusic[$i]['song_id']) ?>">Sửa</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- modal delete -->
                <div class="modal p-3 addPlaylist fade" id="deleteMusic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 ">
                                <h1 class="modal-title fs-2" id="staticBackdropLabel">Xóa bài hát</h1>
                            </div>
                            <div class="modal-body ">
                                <h4>Bạn có muốn bài hát không?</h4>
                                <form action="../../../controllers/admin/crudMusic.php" method="post">
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" name="delete-btn" class="btn btn-danger fs-3" data-bs-dismiss="modal">Xóa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<?php
if (isset($_SESSION['data'])) {
    echo "<script> alert('" . $_SESSION['data']['message'] . "')</script>";
    unset($_SESSION['data']);
}
?>

</html>