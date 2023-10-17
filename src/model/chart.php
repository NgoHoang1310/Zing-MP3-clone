<?php
   include_once('../model/connectDB.php');
   $sql = "SELECT song_id, COUNT(*) AS count, title FROM historyListen GROUP BY song_id ORDER BY count DESC LIMIT 5";
   $resultTotal = $conn->query("SELECT COUNT(*) as count FROM historyListen");
   $total = $resultTotal->fetch_assoc()['count'];
   $resultChart = $conn->query($sql);
   $arrSong = array();
   while ($row = $resultChart->fetch_assoc()) {
    $row['count']= ($row['count']/$total)*100;
    array_push($arrSong,$row);
   }
   header('Content-Type: application/json');
   print_r(json_encode($arrSong));
?>