<?php
// session_start();
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
    <link rel="stylesheet" href="../../../public/css/adminCss/manageUser.css">
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
            <div class="col-10  main">
                <h1 class="header text-center">
                    QUẢN LÍ NGƯỜI DÙNG
                </h1>
                <div class="content">
                    <button type="button" class="action-add" data-bs-toggle="modal" data-bs-target="#addNewUser">
                        <i class="fa-solid fa-plus"></i>
                        Người dùng mới
                    </button>
                    <table class="table table-striped table-user">
                        <thead>
                            <tr>
                                <th scope="col">Tên người dùng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">Ảnh đại diện</th>
                                <th scope="col">Vai trò</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../../../controllers/admin/crudUser.php');
                            $result = $user->getAllUser();
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr class="row-user">
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['Password'] ?></td>
                                    <td><img class="avatar" src="<?php echo $row['Avatar'] ?>" alt=""></td>
                                    <td><?php echo ($row['Role'] == 2) ? "User" : "Admin" ?></td>
                                    <td id="<?php echo $row['id'] ?>" class="action">
                                        <button class="action-edit" data-bs-toggle="modal" data-bs-target="#editUser" onclick="getIdUser(this)">
                                            <i class="fa-solid fa-pen"></i>
                                            Sửa
                                        </button>
                                        <button class="action-delete" data-bs-toggle="modal" data-bs-target="#deleteUser" onclick="getIdUser(this)">
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
                                <h1 class="modal-title fs-2" id="staticBackdropLabel">Thêm mới người dùng</h1>
                            </div>
                            <div class="modal-body ">
                                <form action="../../../controllers/admin/crudUser.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" name="Name">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail" name="Email">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword" name="Password">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Avatar</label>
                                        <input class="form-control" type="file" id="formFile" name="Avatar" accept="image/*">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Role</label>
                                        <select id="inputState" class="form-select" name="Role">
                                            <option selected>Choose...</option>
                                            <option value="2">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary fs-3" data-bs-dismiss="modal">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal edit -->
                <div class="modal p-3 addPlaylist fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 ">
                                <h1 class="modal-title fs-2" id="staticBackdropLabel">Sửa người dùng</h1>
                            </div>
                            <div class="modal-body ">
                                <form action="../../../controllers/admin/crudUser.php" method="post" enctype="multipart/form-data">
                                    <?php
                                     $result = $user->editUser();
                                     $row = $result->fetch_assoc();
                                      ?>
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" name="Name" value="<?php echo $row['Name'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail" name="Email" value="<?php echo $row['Email'] ?>" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword" name="Password" value="<?php echo $row['Password'] ?>" >
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Avatar</label>
                                        <input class="form-control" type="file" id="formFile" name="Avatar" accept="image/*">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Role</label>
                                        <select id="inputState" class="form-select" name="Role">
                                            <option selected>Choose...</option>
                                            <option value="2">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary fs-3" data-bs-dismiss="modal">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal delete -->
                <div class="modal p-3 addPlaylist fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 ">
                                <h1 class="modal-title fs-2" id="staticBackdropLabel">Xóa người dùng</h1>
                            </div>
                            <div class="modal-body ">
                                <form action="../../../controllers/admin/crudUser.php" method="post">
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" name="delete-btn" class="btn btn-primary fs-3" data-bs-dismiss="modal">Xóa</button>
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