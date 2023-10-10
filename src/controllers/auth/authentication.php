<?php
session_start();
include_once('../../model/connectDB.php');

class Authentication
{
    public function createAccount()
    {
        echo "hello";
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($name = $_REQUEST['name']) && ($email = $_REQUEST['email']) && ($password = $_REQUEST['passwordConfirm'])) {
                    $checkEmail = "SELECT Email FROM accounts WHERE Email = '$email'";
                    $result = $conn->query($checkEmail);
                    if ($result->num_rows > 0) {
                        echo 'Email đã tồn tại';
                        $_SESSION['data'] = array('errCode' => "1", 'message' => 'Email đã tồn tại! Vui lòng nhập Email khác');
                        sleep(2);
                        header('location: ../../views/layouts/authLayouts/registerPage.php');
                        exit;
                    } else {
                        $addUser = "INSERT INTO accounts (`Name`, `Email`,`Password`) VALUES ('$name', '$email','$password')";
                        if ($conn->query($addUser)) {
                            echo 'Đã thêm tài khoản mới';
                            $_SESSION['data'] = array('errCode' => "0", 'message' =>  'Đăng kí thành công !');
                            sleep(2);
                            header('location: ../../views/layouts/authLayouts/loginPage.php');
                            exit;
                        } else {
                            echo 'Thêm tài khoản thất bại';
                        }
                    }
                } else {
                    echo "Không nhận được dữ liệu";
                }
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function login()
    {
        echo "login";
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($email = $_REQUEST['email']) && ($password = $_REQUEST['password'])) {
                    $dataUser = "SELECT * FROM accounts WHERE Email = '$email'";
                    $result = $conn->query($dataUser);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        if ($row['Password'] == $password) {
                            echo 'Đăng nhập thành công';
                            $_SESSION['data'] = array('errCode' => "0", 'message' => 'Đăng nhập thành công!', 'user' => $row['Name']);
                            sleep(2);
                            if ($row['Role'] != 2) {
                                header('location: ../../views/layouts/adminLayouts/dardboard.php');
                            } else {
                                header('location: ../../views/main.php');
                            }
                            exit;
                        } else {
                            echo 'Mật khẩu không chính xác!';
                            $_SESSION['data'] = array('errCode' => "3", 'message' =>  'Mật khẩu không chính xác!');
                            sleep(2);
                            header('location: ../../views/layouts/authLayouts/loginPage.php');
                            exit;
                        }
                    } else {
                        echo "Email không hợp lệ!";
                        $_SESSION['data'] = array('errCode' => "2", 'message' => 'Email không hợp lệ!');
                        sleep(2);
                        header('location: ../../views/layouts/authLayouts/loginPage.php');
                        exit;
                    }
                } else {
                    echo "Không nhận được dữ liệu";
                }
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}

$auth = new Authentication();

$auth->createAccount();
$auth->login();
