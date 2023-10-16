<?php
   include_once('../model/connectDB.php');
   $sql = "SELECT * FROM Songs ";
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