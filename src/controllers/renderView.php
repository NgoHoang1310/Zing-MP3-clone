<?php
include_once('../model/connectDB.php');
class querySQL
{
    public function renderToLib()
    {
        global $conn;
        $userId = $_SESSION['data']['userId'];
        $sql = "SELECT * FROM Songs JOIN librarysong ON songs.song_id = librarysong.song_id
         JOIN accounts ON librarysong.user_id = accounts.id WHERE accounts.id = '$userId' ORDER BY library_id DESC ";
        return $conn->query($sql);
    }

    public function renderToDis()
    {
        global $conn;
        if ($fillterId = $_REQUEST['country']) {
            if ($fillterId == 'VN') {
                $sql = "SELECT * FROM songs WHERE country = '$fillterId' LIMIT 9";
            } else if ($fillterId == 'US') {
                $sql = "SELECT * FROM songs WHERE country = '$fillterId' LIMIT 9";
            } else {
                $sql = "SELECT * FROM songs LIMIT 9";
            }
            return $conn->query($sql);
        } else {
            $sql = "SELECT * FROM songs LIMIT 9";
            return $conn->query($sql);
        }
    }

    public function renderToDisAll()
    {
        global $conn;
        if ($fillterId = $_REQUEST['country']) {
            if ($fillterId == 'VN') {
                $sql = "SELECT * FROM songs WHERE country = '$fillterId'";
            } else if ($fillterId == 'US') {
                $sql = "SELECT * FROM songs WHERE country = '$fillterId'";
            } else {
                $sql = "SELECT * FROM songs";
            }
            return $conn->query($sql);
        } else {
            $sql = "SELECT * FROM songs";
            return $conn->query($sql);
        }
    }

    public function renderToCurrentListen()
    {
        global $conn;
        $userId = $_SESSION['data']['userId'];
        $sql = "SELECT *  FROM Songs JOIN recentlyplayed ON songs.song_id = recentlyplayed.song_id
         JOIN accounts ON recentlyplayed.user_id = accounts.id WHERE accounts.id = '$userId' ORDER BY listen_id DESC ";
        return $conn->query($sql);
    }
    public function renderPlaylist()
    {
        global $conn;
        $userId = $_SESSION['data']['userId'];
        $sql = "SELECT * FROM playlist WHERE playlist.user_id = '$userId'";
        return $conn->query($sql);
    }


    public function renderToPlaylist()
    {
        try {
            global $conn;
            if (($playlistId = $_REQUEST['playlistId'])) {
                $sql = "SELECT * FROM Songs JOIN playlistdetail ON Songs.song_id = playlistdetail.song_id 
                 WHERE playlistdetail.playlist_id = $playlistId";
                return $conn->query($sql);
            } else {
                echo "Lỗi không nhận được playlistId";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function checkPlaylistNull()
    {
        try {
            global $conn;
            if ($playlistId = $_REQUEST['playlistId']) {
                $sql = "SELECT playlist_id FROM playlistdetail WHERE playlist_id = $playlistId";
                return $conn->query($sql);
            } else {
                echo "Lỗi không nhận được playlistId";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function renderToFavourite()
    {
        global $conn;
        $userId = $_SESSION['data']['userId'];
        $sql = "SELECT * FROM Songs JOIN favouritesong ON Songs.song_id = favouritesong.song_id JOIN accounts ON favouritesong.user_id = accounts.id WHERE accounts.id = $userId ORDER BY favourite_id DESC";
        return $conn->query($sql);
    }
}
