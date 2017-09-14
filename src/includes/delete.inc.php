<?php
if (isset($_GET['delete'])) {
    include_once 'dbh.inc.php';

    $id = $_GET['delete'];
    

    $statement = "DELETE FROM computers WHERE id = :id";

    $updateQuery = $pdo->prepare($statement);

    $updateQuery->execute([':id' => $id]);

    header("Location: ../../index.php?delete_status=success");
    exit();
    

} else  {
    header("Location: ../../index.php?delete_status=fail");
    exit();
}
