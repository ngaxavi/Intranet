<?php

if (isset($_POST['submit'])) {
    include_once 'dbh.inc.php';

    $department = $_POST['department'];
    $ip_0 = $_POST['ip_0'];
    $ip_1 = $_POST['ip_1'];
    $ip_2 = $_POST['ip_2'];
    $ip_3 = $_POST['ip_3'];
    $manufacturer = $_POST['manufacturer'];
    $mac_0 = strtoupper($_POST['mac_0']);
    $mac_1 = strtoupper($_POST['mac_1']);
    $mac_2 = strtoupper($_POST['mac_2']);
    $mac_3 = strtoupper($_POST['mac_3']);
    $mac_4 = strtoupper($_POST['mac_4']);
    $mac_5 = strtoupper($_POST['mac_5']);
    $sub_0 = $_POST['sub_0'];
    $sub_1 = $_POST['sub_1'];
    $sub_2 = $_POST['sub_2'];
    $sub_3 = $_POST['sub_3'];
    $os = $_POST['os'];

    // check if no empty
    foreach($_POST as $key => $value) { 
        if (empty($value)) { 
            header("Location: ../../add.php?status=empty");
            exit();
        }
    }


    $statement = "INSERT INTO computers (department, manufacturer, ip_0, ip_1, ip_2, ip_3, mac_0, mac_1, mac_2, mac_3, mac_4, mac_5, sub_0, sub_1, sub_2, sub_3, os)
            VALUES(:department, 
            :manufacturer, 
            :ip_0, 
            :ip_1, 
            :ip_2, 
            :ip_3, 
            :mac_0, 
            :mac_1, 
            :mac_2, 
            :mac_3, 
            :mac_4, 
            :mac_5, 
            :sub_0, 
            :sub_1, 
            :sub_2, 
            :sub_3, 
            :os)";

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
                        ':os' => $os]);

                        header("Location: ../../index.php?add_status=success");
                        exit();
    

} else  {
    header("Location: ../../index.php?add_status=fail");
    exit();
}
