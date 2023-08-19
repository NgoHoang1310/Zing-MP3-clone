<?php
$sql = "SELECT * FROM Songs";
$result = $conn->query($sql);
$i = 0;

while ($row[$i] = $result->fetch_assoc()) {
    $myarr = array($row[$i]);
    array_push($myarr);
    $i++;
}

$myjson = json_encode($row);

?>