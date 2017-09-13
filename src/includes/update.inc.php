<?php

if (isset($_POST['submit'])) {
    include_once 'dbh.inc.php';

    $id = $_POST['id'];
    $department = $_POST['department'];
    $ip_0 = $_POST['ip_0'];
    $ip_1 = $_POST['ip_1'];
    $ip_2 = $_POST['ip_2'];
    $ip_3 = $_POST['ip_3'];
    $manufacturer = $_POST['manufacturer'];
    $mac_0 = $_POST['mac_0'];
    $mac_1 = $_POST['mac_1'];
    $mac_2 = $_POST['mac_2'];
    $mac_3 = $_POST['mac_3'];
    $mac_4 = $_POST['mac_4'];
    $mac_5 = $_POST['mac_5'];
    $sub_0 = $_POST['sub_0'];
    $sub_1 = $_POST['sub_1'];
    $sub_2 = $_POST['sub_2'];
    $sub_3 = $_POST['sub_3'];
    $os = $_POST['os'];

    $statement = "UPDATE computers 
            SET department=:department, 
            manufacturer = :manufacturer, 
            ip_0 = :ip_0, 
            ip_1 = :ip_1, 
            ip_2 = :ip_2, 
            ip_3 = :ip_3, 
            mac_0 = :mac_0, 
            mac_1 = :mac_1, 
            mac_2 = :mac_2, 
            mac_3 = :mac_3, 
            mac_4 = :mac_4, 
            mac_5 = :mac_5, 
            sub_0 = :sub_0, 
            sub_1 = :sub_1, 
            sub_2 = :sub_2, 
            sub_3 = :sub_3, 
            os = :os 
            WHERE id = :id";

    $updateQuery = $pdo->prepare($statement);

    $updateQuery->execute([':department' => $department, 
                        ':manufacturer' => $manufacturer,
                        ':ip_0' => $ip_0,
                        ':ip_1' => $ip_1,
                        ':ip_2' => $ip_2,
                        ':ip_3' => $ip_3,
                        ':mac_0' => $mac_0,
                        ':mac_1' => $mac_1,
                        ':mac_2' => $mac_2,
                        ':mac_3' => $mac_3,
                        ':mac_4' => $mac_4,
                        ':mac_5' => $mac_5,
                        ':sub_0' => $sub_0,
                        ':sub_1' => $sub_1,
                        ':sub_2' => $sub_2,
                        ':sub_3' => $sub_3,
                        ':os' => $os,
                        ':id' => $id]);

                        header("Location: ../../index.php?update_status=success");
                        exit();
    

} else  {
    header("Location: ../../index.php?update_status=fail");
    exit();
}
