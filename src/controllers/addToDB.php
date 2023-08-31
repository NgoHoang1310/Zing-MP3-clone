<?php
include_once('../model/connectDB.php');

//Thêm bài hát vào các bảng
class Insert
{
    public function addToLib() {
        echo "hello";
        try {
            global $conn;
            if ($id = $_REQUEST['libraryAddId']) {
                $sql = "INSERT INTO librarysong (song_id) VALUES ('$id')";
                //Kiểm tra tồn tại ID
                $checkExistId = "SELECT COUNT(song_id) AS count FROM librarysong WHERE song_id = $id";
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
            if ($currId = $_REQUEST['currentID'] + 1) {
                $sql = "INSERT INTO recentlyplayed (song_id) VALUES ('$currId')";
                //Kiểm tra tồn tại ID
                $checkExistId = "SELECT COUNT(song_id) AS count FROM recentlyplayed WHERE song_id = $currId";
                //khi số bài hát đã nghe >=8  sẽ xóa bài hát có id nhỏ nhất
                $deleteMinId = "DELETE FROM recentlyplayed WHERE listen_id = (SELECT MIN(listen_id) FROM recentlyplayed)";
                $resultCheck = $conn->query($checkExistId);
                //kiểm tra số hàng của bảng recentlyplayed
                $num_rows = mysqli_num_rows($conn->query("SELECT song_id FROM recentlyplayed"));
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

    public function addPlaylist() {
        echo 'playlist';
        try{
            global $conn;
            if($playlistTitle = $_REQUEST['playlistAddTitle']){
                $sql = "INSERT INTO playlist (title) VALUES ('$playlistTitle')";
                if($conn->query($sql)===true){
                    echo "Thêm playlist thành công";
                }else{
                    echo "Lỗi".$sql ."<br>".$conn->error;

                }

            }else{
                echo "Không nhận được playlistTitle";
            }
        }catch(Exception $e) {
            echo "Lỗi".$e->getMessage();
        }
    }

    public function addToPlaylist() {
        try {
            global $conn;
            if (($songId = $_REQUEST['playlistSongAddId']) && ($playlistId = $_REQUEST['playlistId'])) {
                $sql = "INSERT INTO playlistdetail (song_id,playlist_id) VALUES ('$songId','$playlistId')";
                //Kiểm tra tồn tại ID
                $checkExistId = "SELECT COUNT(song_id) AS count FROM playlistdetail WHERE song_id = $songId AND playlist_id = $playlistId";
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

    public function renamePlaylist() {
        try{
            global $conn;
            if(($playlistRename = $_REQUEST['playlistRename']) && ($playlistId = $_REQUEST['playlistId'])){
                $sql = "UPDATE playlist SET title = '$playlistRename' WHERE playlist_id = $playlistId";
                if($conn->query($sql)===true){
                    echo "Đổi tên playlist thành công";
                }else{
                    echo "Lỗi".$sql ."<br>".$conn->error;

                }

            }else{
                echo "Không nhận được playlistTitle";
            }
        }catch(Exception $e) {
            echo "Lỗi".$e->getMessage();
        }
        echo "Helo";
    
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

