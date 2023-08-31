<?php
include_once('../model/connectDB.php');

class querySQL
{
    public function renderToLib()
    {
        global $conn;
        $sql = "SELECT Songs.song_id, Songs.title, Songs.image, Songs.artist, Songs.album FROM Songs JOIN librarysong ON songs.song_id = librarysong.song_id ORDER BY library_id DESC ";
        return $conn->query($sql);
    }

    public function renderToDis()
    {
        global $conn;
        $sql = "SELECT * FROM songs LIMIT 9";
        return $conn->query($sql);
    }

    public function renderToDisAll()
    {
        global $conn;
        $sql = "SELECT * FROM Songs";
        return $conn->query($sql);
    }

    public function renderToCurrentListen()
    {
        global $conn;
        $sql = "SELECT Songs.song_id, Songs.title, Songs.image, Songs.artist, Songs.album  FROM Songs JOIN recentlyplayed ON songs.song_id = recentlyplayed.song_id ORDER BY listen_id DESC ";
        return $conn->query($sql);
    }
    public function renderPlaylist()
    {
        global $conn;
        $sql = "SELECT * FROM playlist";
        return $conn->query($sql);
    }


    public function renderToPlaylist()
    {
        try {
            global $conn;
            if ($playlistId = $_REQUEST['playlistId']) {
                $sql = "SELECT * FROM Songs JOIN playlistdetail ON Songs.song_id = playlistdetail.song_id WHERE playlistdetail.playlist_id = $playlistId ";
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
}
