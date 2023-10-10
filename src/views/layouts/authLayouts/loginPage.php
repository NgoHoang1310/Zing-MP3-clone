<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9973/9973495.png">
    <link rel="stylesheet" href="../../../public/css/auth.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <form action="../../../controllers/auth/authentication.php" class="validation" id="form-1" method="post">
                <div class="form-validation mt-2">
                    <div class="form-validation__header text-center">
                        <h3 class="form-validation__header-content ">Đăng nhập</h3>
                        <p class="form-validation__header-slogan mb-0 ">Nghe nhạc không giới hạn cùng với</p>
                        <p class="form-validation__header-slogan text-center fw-bold fs-5">Music Player ❤️</p>
                    </div>
                </div>
                <div class="form-validation__body mt-2">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="formEmail" name="email" placeholder="VD: email@domain.com">
                        <span class="form-message"></span>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="formPassword" name="password" placeholder="Nhập mật khẩu">
                        <span class="form-message"></span>
                        <span class="check-password">
                            <input type="checkbox" class="checkbox-btn" value="off">
                            Hiện mật khẩu
                        </span>

                    </div>
                    <button type="submit" class="btn btn-success ">Đăng nhập</button>
                    <p class="link link_signup">
                        Bạn chưa đã có tài khoản?
                        <a href="./registerPage.php">Đăng kí tài khoản</a>
                    </p>
                    <?php
                    if (isset($_SESSION['data'])) {
                        echo "<p class='" . ($_SESSION['data']['errCode'] != 0 ? 'err-message ' : 'succ-message ') . "text-center mt-3'>" . $_SESSION['data']['message'] . "</p>";
                        unset($_SESSION['data']);
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../public/js/validation/validation.js"></script>
<script>
    Validator({
        form: '#form-1',
        errorSelector: '.form-message',
        formGroupSelector: '.mb-3',
        rules: [
            // Validator.isRequire('#formName'),
            Validator.isRequire('#formEmail'),
            Validator.isEmail('#formEmail'),
            Validator.isRequire('#formPassword'),
            Validator.isPassword('#formPassword', 6),
            // Validator.isRequire('#formPasswordVerification'),
            // Validator.isConfirm('#formPasswordVerification', function() {
            //     return document.querySelector('#formPassword').value;
            // }, 'Mật khẩu nhập lại không chính xác')
        ],
        // onsubmit: function(data) {
        //     //call api
        //     console.log(data);
        // }
    })
</script>

</html>