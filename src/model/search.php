<?php
   include_once('../model/connectDB.php');
   $sql = "SELECT song_id,title FROM Songs ";
   $result = $conn->query($sql);
   $arrSearch = array();
   
   while ($row= $result->fetch_assoc()) {
      array_push($arrSearch, $row);
   }
   header('Content-Type: application/json');   
   $s= $_REQUEST["s"];

   $hint = "";
   
   // lookup all hints from array if $q is different from ""
   if ($s !== "") {
     $s = strtolower($s);
     $len=strlen($s);
     for($i=0; $i<count($arrSearch);$i++) {
        if (stristr($s, substr($arrSearch[$i]['title'], 0, $len))) {
            if ($hint === "") {
              $hint = json_encode($arrSearch[$i]);
            }
          }
     }
   }
   
   // Output "no suggestion" if no hint was found or output correct values
   echo $hint === "" ? "Không tìm thấy bài hát" : $hint;
?>