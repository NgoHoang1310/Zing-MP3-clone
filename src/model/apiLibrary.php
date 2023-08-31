<?php
   include_once('../model/connectDB.php');
   $sql = "SELECT * FROM Songs JOIN librarysong ON songs.song_id = librarysong.song_id ORDER BY library_id DESC ";
   $result = $conn->query($sql);
   $i = 0;
   
   while ($row[$i] = $result->fetch_assoc()) {
       $myarr = array($row[$i]);
       array_push($myarr);
       $i++;
   }
   header('Content-Type: application/json');
   
   $myjson = json_encode($row);
   echo $myjson;
?>