<?php

    // $dbUserName= "intranet";
    // $dbPassword= "intranet";
    // $dsn = 'mysql:host=127.0.0.1;dbname=intranet-db';

    $dsn = "pgsql:"
    . "host=ec2-54-217-200-162.eu-west-1.compute.amazonaws.com;"
    . "dbname=dfo92pck72fra0;"
    . "port=5432;"
    . "sslmode=require;";

    $dbUserName= "luvyqusshwxxvt";
    $dbPassword= "3510ce6ace318910238722b27bab2e05b1f085553fdf8f9b99266e006fcd167e";
    
    $pdo = new PDO($dsn, $dbUserName, $dbPassword);
