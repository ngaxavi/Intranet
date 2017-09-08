<?php

    $dbUserName= "intranet";
    $dbPassword= "intranet";
    $dsn = 'mysql:host=127.0.0.1;dbname=intranet-db';
    
    $pdo = new PDO($dsn, $dbUserName, $dbPassword);
