<?php

  include_once 'dbh.inc.php';

$sql = "SELECT * FROM drivers";
$result = $pdo->prepare($sql);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}


$results = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data ];

echo json_encode($results);
