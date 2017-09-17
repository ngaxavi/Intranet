<?php

include_once 'dbh.inc.php';

$networkId = $_GET['id'];


// delete the network whose id corresponds to $networkId

$statement = "DELETE FROM drivers WHERE id = :id";

$delete = $pdo->prepare($statement);

$delete->execute(array(':id' => $networkId));


header("Location: ../../network.php?remove=success");
exit();