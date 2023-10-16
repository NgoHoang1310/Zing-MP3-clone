<?php
session_start();
if (!isset($_SESSION['data']['user'])) {
    echo "Không có dữ liệu";
}
include_once('../model/connectDB.php');
$userId = $_SESSION['data']['userId'];
$sql = "SELECT * FROM Songs JOIN favouritesong ON Songs.song_id = favouritesong.song_id JOIN accounts ON favouritesong.user_id = accounts.id WHERE accounts.id = $userId";
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
