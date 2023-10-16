<?php
session_start();
include(__DIR__ . '../../../model/connectDB.php');
class manageMusic
{
    public function getAllMusic()
    {
        try {
            global $conn;
            $sql = "SELECT * FROM songs ORDER BY song_id DESC";
            return $conn->query($sql);
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function createMusic()
    {
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($name = $_REQUEST['NameAdd']) && ($artist = $_REQUEST['ArtistAdd']) && ($genre = $_REQUEST['GenreAdd']) && ($country = $_REQUEST['CountryAdd'])) {
                    move_uploaded_file($_FILES['AvatarAdd']['tmp_name'], "../../public/img/" . $_FILES['AvatarAdd']['name']);
                    move_uploaded_file($_FILES['AudioAdd']['tmp_name'], "../../public/audio/" . $_FILES['AudioAdd']['name']);
                    ($_FILES['AvatarAdd']['name'] == true) ? $avatar = "../public/img/" . $_FILES['AvatarAdd']['name'] : $avatar = "../public/img/avatar/7680768d2115009e96ad70bd57146e74.jpg";
                    $audio = "../public/audio/" . $_FILES['AudioAdd']['name'];
                    $country = ($country == 1) ? "VN" : "US";
                    $addMusic = "INSERT INTO songs (`title`, `artist`,`genre`,`country`,`image`,`file_path`) VALUES ('$name', '$artist','$genre','$country','$avatar','$audio')";
                    if ($conn->query($addMusic)) {
                        echo 'Đã thêm bài hát mới';
                        $_SESSION['data'] = array('errCode' => "0", 'message' =>  'Thêm bài hát thành công!');
                        sleep(2);
                        header('location: ../../views/layouts/adminLayouts/manageMusic.php');
                        exit;
                    } else {
                        echo 'Thêm bài hát thất bại';
                        // echo $name, $artist, $genre, $country, $avatar, $audio;
                    }
                } else {
                    echo "Không nhận được dữ liệu";
                }
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function deleteMusic()
    {
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($id = $_REQUEST['delete-btn'])) {
                    $sql = "DELETE FROM songs WHERE song_id ='$id'";
                    if ($conn->query($sql)) {
                        $_SESSION['data'] = array('errCode' => "0", 'message' =>  'Đã xóa bài hát!');
                        sleep(2);
                        header('location: ../../views/layouts/adminLayouts/manageMusic.php');
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

    public function editMusic()
    {
        try {
            global $conn;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (($id = $_REQUEST['edit-btn']) && ($name = $_REQUEST['NameEdit']) && ($artist = $_REQUEST['ArtistEdit']) && ($genre = $_REQUEST['GenreEdit']) && ($country = $_REQUEST['CountryEdit'])) {
                    move_uploaded_file($_FILES['AvatarEdit']['tmp_name'], "../../public/img/" . $_FILES['AvatarEdit']['name']);
                    move_uploaded_file($_FILES['AudioEdit']['tmp_name'], "../../public/audio/" . $_FILES['AudioEdit']['name']);
                    ($_FILES['AvatarEdit']['name'] == true) ? $avatar = "../public/img/" . $_FILES['AvatarEdit']['name'] : $avatar = "../public/img/avatar/7680768d2115009e96ad70bd57146e74.jpg";
                    $audio = "../public/audio/" . $_FILES['AudioEdit']['name'];
                    $country = ($country == 1) ? "VN" : "US";
                    $updateMusic = "UPDATE songs SET `title`='$name', `artist`= '$artist',`genre`='$genre',`country`='$country',`image`='$avatar', `file_path`='$audio' WHERE song_id = '$id'";
                    if ($conn->query($updateMusic)) {
                        echo 'Đã thay đổi thông tin tài khoản';
                        $_SESSION['data'] = array('errCode' => "0", 'message' =>  'Cập nhật thành công!');
                        sleep(2);
                        header('location: ../../views/layouts/adminLayouts/manageMusic.php');
                        exit;
                    } else {
                        echo 'Cập nhật thất bại';
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

$music = new manageMusic();

$music->createMusic();
$music->deleteMusic();
$music->editMusic();
