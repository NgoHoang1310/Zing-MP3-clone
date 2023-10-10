<?php
   include_once('../model/connectDB.php');
   $sql = "SELECT * FROM Songs JOIN favouritesong ON Songs.song_id = favouritesong.song_id";
   $result = $conn->query($sql);
   $i = 0;
   
   while ($row[$i] = $result->fetch_assoc()) {
       $myarr = array($row[$i]);
       array_push($myarr);
       $i++;
   }
   header('Content-Type: application/json');
   array_pop($row);
   $myjson = json_encode($row);
   echo $myjson;