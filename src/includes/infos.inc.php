<?php
	include 'ChromePhp.php';

  include_once 'dbh.inc.php';

$sql = "SELECT * FROM drivers LIMIT 20";
$result = $pdo->prepare($sql);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

ChromePhp::log($data);


$results = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data ];

echo json_encode($results);
