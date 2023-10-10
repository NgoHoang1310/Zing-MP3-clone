<?php
include_once('../model/connectDB.php');

//Thêm bài hát vào các bảng
class delete
{
    public function removeFromLib()
    {
        try {
            global $conn;
            if ($id = $_REQUEST['libraryRemoveId']) {
                $sql = "DELETE FROM librarysong WHERE song_id= $id";
                if ($conn->query($sql) === TRUE) {
                    echo "<h1>Chèn dữ liệu thành công.</h1>";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không nhận được song_id";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
        // echo "Hello";
    }

    public function removePlaylist()
    {
        try {
            global $conn;
            //câu truy vấn khi bảng playlistdetail rỗng
            $isCheckPlaylistDetail = "SELECT * FROM playlistdetail";
            if ($id = $_REQUEST['playlistRemoveId']) {
                if (mysqli_num_rows($conn->query($isCheckPlaylistDetail)) == 0) {
                    $sql = "DELETE FROM playlist WHERE playlist_id = $id ";
                } else {
                    $sql = "DELETE playlist, playlistdetail FROM playlist JOIN playlistdetail ON playlist.playlist_id = playlistdetail.playlist_id WHERE playlist.playlist_id = $id";
                }

                if ($conn->query($sql) === TRUE) {
                    echo "Chèn dữ liệu thành công.";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không nhận được playlist_id";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }

    }

    public function removeFromPlaylist()
    {
        try {
            global $conn;
            if (($songid = $_REQUEST['playlistSongRemoveId']) && ($playlistId = $_REQUEST['playlistId'])) {
                $sql = "DELETE playlistdetail FROM playlistdetail WHERE song_id = $songid AND playlist_id = $playlistId";
                if ($conn->query($sql) === TRUE) {
                    echo "Chèn dữ liệu thành công.";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không nhận được playlist_id";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
        // echo "Hello World";

    }

    public function removeFromFavourite() {
        try {
            global $conn;
            if ($id = $_REQUEST['favouriteRemoveSongId']) {
                $sql = "DELETE FROM favouritesong WHERE song_id= $id";
                if ($conn->query($sql) === TRUE) {
                    echo "Chèn dữ liệu thành công.";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không nhận được song_id";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}

$manageSong = new delete();
$manageSong->removeFromLib();
$manageSong->removePlaylist();
$manageSong->removeFromPlaylist();
$manageSong->removeFromFavourite();
