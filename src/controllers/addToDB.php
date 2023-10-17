<?php
include_once('../model/connectDB.php');

//Thêm bài hát vào các bảng
class Insert
{
    public function addToLib()
    {
        echo "hello";
        try {
            global $conn;
            if (($id = $_REQUEST['libraryAddId']) && ($userId = $_REQUEST['userId'])) {
                $sql = "INSERT INTO librarysong (`song_id`, `user_id`) VALUES ('$id','$userId')";
                //Kiểm tra tồn tại ID
                $checkExistId = "SELECT COUNT(song_id) AS count FROM librarysong WHERE song_id = '$id' AND user_id = '$userId'";
                $resultCheck = $conn->query($checkExistId);
                if ($resultCheck->fetch_assoc()['count'] == 0) {
                    // Thực thi câu truy vấn
                    if ($conn->query($sql) === TRUE) {
                        echo "Chèn dữ liệu thành công.";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "ID đã tồn tại";
                }
            } else {
                echo "Không nhận được id";
            }


            // Đóng kết nối
            // $conn->close();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function addToCurrentListen()
    {
        echo "hello world";
        try {
            global $conn;
            if (($currId = $_REQUEST['currentID'] + 1) && ($userId = $_REQUEST['userId'])) {
                $sql = "INSERT INTO recentlyplayed (`song_id`, `user_id`) VALUES ('$currId','$userId')";
                //Kiểm tra tồn tại ID
                $checkExistId = "SELECT COUNT(song_id) AS count FROM recentlyplayed WHERE song_id = $currId  AND user_id = '$userId'";
                //khi số bài hát đã nghe >=8  sẽ xóa bài hát có id nhỏ nhất
                $deleteMinId = "DELETE FROM recentlyplayed WHERE listen_id = (SELECT MIN(listen_id) FROM recentlyplayed WHERE user_id = '$userId')";
                $resultCheck = $conn->query($checkExistId);
                //kiểm tra số hàng của bảng recentlyplayed
                $num_rows = mysqli_num_rows($conn->query("SELECT song_id FROM recentlyplayed WHERE user_id = '$userId'"));
                if ($resultCheck->fetch_assoc()['count'] == 0) {
                    // Thực thi câu truy vấn
                    if ($conn->query($sql) === TRUE) {
                        if ($num_rows >= 8) {
                            $conn->query($deleteMinId);
                        }
                        echo "Chèn dữ liệu thành công.";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "ID đã tồn tại";
                }
            } else {
                echo "Không nhận được currentID";
            }
            // Đóng kết nối
            // $conn->close();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function addPlaylist()
    {
        echo 'playlist';
        try {
            global $conn;
            if (($playlistTitle = $_REQUEST['playlistAddTitle']) && ($userId = $_REQUEST['userId'])) {
                $sql = "INSERT INTO playlist (title, user_id) VALUES ('$playlistTitle','$userId')";
                if ($conn->query($sql) === true) {
                    echo "Thêm playlist thành công";
                } else {
                    echo "Lỗi" . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không nhận được playlistTitle";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function addToPlaylist()
    {
        try {
            global $conn;
            if (($songId = $_REQUEST['playlistSongAddId']) && ($playlistId = $_REQUEST['playlistId']) && ($userId = $_REQUEST['userId'])) {
                $sql = "INSERT INTO playlistdetail (song_id,playlist_id,user_id) VALUES ('$songId','$playlistId','$userId')";
                //Kiểm tra tồn tại ID
                $checkExistId = "SELECT COUNT(song_id) AS count FROM playlistdetail WHERE song_id = $songId AND playlist_id = $playlistId AND user_id = '$userId'";
                $resultCheck = $conn->query($checkExistId);
                if ($resultCheck->fetch_assoc()['count'] == 0) {
                    // Thực thi câu truy vấn
                    if ($conn->query($sql) === TRUE) {
                        echo "Chèn dữ liệu thành công.";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "ID đã tồn tại";
                }
            } else {
                echo "Không nhận được id";
            }
            // Đóng kết nối
            // $conn->close();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function renamePlaylist()
    {
        try {
            global $conn;
            if (($playlistRename = $_REQUEST['playlistRename']) && ($playlistId = $_REQUEST['playlistId'])) {
                $sql = "UPDATE playlist SET title = '$playlistRename' WHERE playlist_id = $playlistId";
                if ($conn->query($sql) === true) {
                    echo "Đổi tên playlist thành công";
                } else {
                    echo "Lỗi" . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không nhận được playlistTitle";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
        echo "Helo";
    }

    public function addToFavourite()
    {
        try {
            global $conn;
            if (($id = $_REQUEST['favouriteAddSongId']) && ($userId = $_REQUEST['userId'])) {
                $sql = "INSERT INTO favouritesong (`song_id`, `user_id`) VALUES ('$id','$userId')";
                //Kiểm tra tồn tại ID
                $checkExistId = "SELECT COUNT(song_id) AS count FROM favouritesong WHERE song_id = $id AND user_id = '$userId'";
                $resultCheck = $conn->query($checkExistId);
                if ($resultCheck->fetch_assoc()['count'] == 0) {
                    // Thực thi câu truy vấn
                    if ($conn->query($sql) === TRUE) {
                        echo "Chèn dữ liệu thành công.";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "ID đã tồn tại";
                }
            } else {
                echo "Không nhận được id";
            }



            // Đóng kết nối
            // $conn->close();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function addToHistory()
    {
        try {
            global $conn;
            if (($id = $_REQUEST['currentID'] + 1) && ($songName = $_REQUEST['songName'])) {
                $sql = "INSERT INTO historyListen (`song_id`,`title`) VALUES ('$id','$songName')";
                //Kiểm tra tồn tại ID
                // Thực thi câu truy vấn
                if ($conn->query($sql) === TRUE) {
                    echo "Chèn dữ liệu thành công.";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không nhận được id";
            }



            // Đóng kết nối
            // $conn->close();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
//khởi tạo đối tượng

// Example usage
$manageSong = new Insert();
$manageSong->addToLib();
$manageSong->addToCurrentListen();
$manageSong->addPlaylist();
$manageSong->addToPlaylist();
$manageSong->renamePlaylist();
$manageSong->addToFavourite();
$manageSong->addToHistory();
