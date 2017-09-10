<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Willkommen an der Praxis -- Intranet</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- add Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="src/css/main.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Intranet Bisso Na Bisso</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == "/index.php" ? "active" : "");?>">
            <a class="nav-link" href="../../index.php">Home</a>
          </li>
          <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == "/team.php" ? "active" : "");?>">
            <a class="nav-link" href="../../team.php">Team</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Abteilungen</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Anmeldung</a>
            <a class="dropdown-item" href="#">Buchhaltung</a>
            <a class="dropdown-item" href="#">MRT</a>
            <a class="dropdown-item" href="#">Röntgen</a>
            <a class="dropdown-item" href="#">CT</a>
          </div>
        </li>
        <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == "/infos.php" ? "active" : "");?>">
          <a class="nav-link" href="../../infos.php">Infos</a>
        </li>
        </ul>
        <?php if (!isset($_SESSION['username'])) { ?>
        <ul class="navbar-nav ml-auto btn-space">
            <a href="login.php" class="btn btn-sm btn-outline-primary">Anmelden</a>

            <a href="register.php" class="btn btn-sm btn-outline-success">Registrieren</a>
        </ul>
        <?php } else { ?>
          <ul class="navbar-nav ml-auto">
            <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="user-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="fa fa-user"></span> 
                  <strong><?php echo $_SESSION['username'] ?></strong>
              </a>
              <ul class="dropdown-menu left-align" aria-labelledby="user-menu">
                  <li>
                      <div class="navbar-login">
                          <div class="row">
                              <div class="col-lg-4">
                                  <p class="text-center">
                                      <span class="fa fa-user icon-size"></span>
                                  </p>
                              </div>
                              <div class="col-lg-8">
                                  <p class="text-left">
                                    <strong><?php echo $_SESSION['firstName'] . " " .  $_SESSION['lastName']; ?></strong>
                                  </p>
                                  <p class="text-left small"><?php echo $_SESSION['email']; ?></p>
                              </div>
                          </div>
                      </div>
                  </li>
                  <hr>
                  <li>
                      <div class="navbar-login navbar-login-session">
                          <div class="row">
                              <div class="col-lg-12">
                                  <form action="src/includes/logout.inc.php" method="POST"> 
                                      <button type="submit" class="btn btn-outline-danger btn-block" name="logout">Abmelden</button>
                                 </form>
                              </div>
                          </div>
                      </div>
                  </li>
              </ul>
          </li>
        </ul>
          
        <?php } ?>
      </div>
    </nav>
