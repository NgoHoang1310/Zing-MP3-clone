<?php
session_start();
include(__DIR__ . '../../../model/connectDB.php');
error_reporting(0);
class manageUser
{
    public function getAllUser()
    {
        try {
            global $conn;
            $sql = "SELECT * FROM accounts ORDER BY id DESC";
            return $conn->query($sql);
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function createUser()
    {
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($name = $_REQUEST['NameAdd']) && ($email = $_REQUEST['EmailAdd']) && ($password = $_REQUEST['PasswordAdd']) && ($role = $_REQUEST['RoleAdd'])) {
                    $checkEmail = "SELECT Email FROM accounts WHERE Email = '$email'";
                    $result = $conn->query($checkEmail);
                    if ($result->num_rows > 0) {
                        echo 'Email đã tồn tại';
                        $_SESSION['data'] = array('errCode' => "1", 'message' => 'Email đã tồn tại! Vui lòng nhập Email khác');
                        sleep(2);
                        header('location: ../../views/layouts/adminLayouts/manageUser.php');
                        exit;
                    } else {
                        if (strlen($password) < 6) {
                            $_SESSION['data'] = array('errCode' => "3", 'message' =>  'Mật khẩu tối thiểu 6 kí tự');
                            sleep(2);
                            header('location: ../../views/layouts/adminLayouts/manageUser.php');
                            exit;
                        } else {
                            move_uploaded_file($_FILES['AvatarAdd']['tmp_name'], "../../public/img/avatar/" . $_FILES['AvatarAdd']['name']);
                            ($_FILES['AvatarAdd']['name'] == true) ? $avatar = "../../../public/img/avatar/" . $_FILES['AvatarAdd']['name'] : $avatar = "../../../public/img/avatar/7680768d2115009e96ad70bd57146e74.jpg";
                            $addUser = "INSERT INTO accounts (`Name`, `Email`,`Password`,`Avatar`,`Role`) VALUES ('$name', '$email','$password','$avatar','$role')";
                            if ($conn->query($addUser)) {
                                echo 'Đã thêm tài khoản mới';
                                $_SESSION['data'] = array('errCode' => "0", 'message' =>  'Thêm người dùng thành công!');
                                sleep(2);
                                header('location: ../../views/layouts/adminLayouts/manageUser.php');
                                exit;
                            } else {
                                echo 'Thêm tài khoản thất bại';
                            }
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

    public function deleteUser()
    {
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($id = $_REQUEST['delete-btn'])) {
                    $sql = "DELETE FROM accounts WHERE id ='$id'";
                    if ($conn->query($sql)) {
                        $_SESSION['data'] = array('errCode' => "0", 'message' =>  'Đã xóa người dùng!');
                        sleep(2);
                        header('location: ../../views/layouts/adminLayouts/manageUser.php');
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

    public function editUser()
    {
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($id = $_REQUEST['edit-btn']) && ($name = $_REQUEST['NameEdit']) && ($email = $_REQUEST['EmailEdit']) && ($password = $_REQUEST['PasswordEdit']) && ($role = $_REQUEST['RoleEdit'])) {
                    $checkEmail = "SELECT Email FROM accounts WHERE Email = '$email'";
                    $result = $conn->query($checkEmail);
                    $row = $result->fetch_assoc();
                    if (($result->num_rows > 0) && ($row['Email'] != $email)) {
                        echo 'Email đã tồn tại';
                        $_SESSION['data'] = array('errCode' => "1", 'message' => 'Email đã tồn tại! Vui lòng nhập Email khác');
                        sleep(2);
                        header('location: ../../views/layouts/adminLayouts/manageUser.php');
                        exit;
                    } else {
                        if (strlen($password) < 6) {
                            $_SESSION['data'] = array('errCode' => "3", 'message' =>  'Mật khẩu tối thiểu 6 kí tự');
                            sleep(2);
                            header('location: ../../views/layouts/adminLayouts/manageUser.php');
                            exit;
                        } else {
                            move_uploaded_file($_FILES['AvatarEdit']['tmp_name'], "../../public/img/avatar/" . $_FILES['AvatarEdit']['name']);
                            ($_FILES['AvatarEdit']['name'] == true) ? $avatar = "../../../public/img/avatar/" . $_FILES['AvatarEdit']['name'] : $avatar = "../../../public/img/avatar/7680768d2115009e96ad70bd57146e74.jpg";
                            $updateUser = "UPDATE accounts SET `Name`='$name', `Email`= '$email',`Password`='$password',`Avatar`='$avatar',`Role`='$role' WHERE id = '$id'";
                            if ($conn->query($updateUser)) {
                                echo 'Đã thay đổi thông tin tài khoản';
                                $_SESSION['data'] = array('errCode' => "0", 'message' =>  'Cập nhật thành công!');
                                sleep(2);
                                header('location: ../../views/layouts/adminLayouts/manageUser.php');
                                exit;
                            } else {
                                echo 'Cập nhật thất bại';
                            }
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
}

$user = new manageUser();

$user->createUser();
$user->deleteUser();
$user->editUser();
