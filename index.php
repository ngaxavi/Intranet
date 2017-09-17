<?php
    include "src/templates/header.php";
    include_once 'src/includes/utils.inc.php';
?>

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3"> Praxis Bisso Na Bisso</h1>
    <p>
      Willkommen in das Intranet der Praxis Bisso Na Bisso. Alle Geräte, die sich in verschiedenen Abteilungen befinden,
      werden hier registriert und verwaltet.
    </p>
    <p>
      <a class="btn btn-primary btn-lg" href="network-add.php" role="button">Mehr Informationen über die Netzwerkkarten &raquo;</a>
    </p>
  </div>
</div>

<div class="container">
<div class="row">
  <div class="col-md-12">
        <?php
          if(isset($_SESSION['username'])) { ?>
      <div class="form-inline">
          <h1>Liste aller Computer in der <?php echo isset($_GET['department']) ? $_GET['department'] .'-Abteilung ' : 'Praxis' ?></h1>
          <?php if(hasAdminOrSystemRole($_SESSION['user_role'])) { ?>
          <a href="add.php" class="btn btn-sm btn-outline-success ml-auto">
            <span class="fa fa-plus"></span>
            <span>Gerät hinzufügen</span>
          </a>
          <?php } ?>
      </div>
      <hr>
      <?php } ?>
      <!-- Add new computer: notification -->
      <?php if (isset($_GET['add_status'])) { ?> 

                    <?php if ($_GET['add_status'] == 'success') { ?>   
                    <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Ein neues Gerät wurde erfolgreich registriert!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['add_status'] == 'fail') { ?>   
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Es gibt ein Problen mit dem Registrierung eines neuen Gerätes!</strong>
                      </div>
                      <?php } ?>
        <?php } ?>

      <?php if (isset($_GET['update_status'])) { ?> 

                    <?php if ($_GET['update_status'] == 'success') { ?>   
                    <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Das Gerät wurde erfolgreich updatet!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['update_status'] == 'fail') { ?>   
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Es gibt ein Problen mit dem Update!</strong>
                      </div>
                      <?php } ?>
        <?php } ?>

        <?php if (isset($_GET['delete_status'])) { ?> 

                    <?php if ($_GET['delete_status'] == 'success') { ?>   
                    <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Das Gerät wurde erfolgreich gelöscht!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['delete_status'] == 'fail') { ?>   
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Es gibt ein Problen mit dem Löschen!</strong>
                      </div>
                      <?php } ?>
        <?php } ?>

       <?php if(isset($_SESSION['username'])) { ?>

      <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
                    <th class="text-center">Abteilung</th>
                    <th class="text-center">Hersteller</th>
                    <th class="text-center">IP-Adresse</th>
                    <th class="text-center">MAC-Adresse</th>
                    <th class="text-center">Subnet-Adresse</th>
                    <th class="text-center">MAC Hersteller</th>
                    <th class="text-center">Betriebssystem</th>
                    <?php
                      if(isset($_SESSION['user_role']) && hasAdminOrSystemRole($_SESSION['user_role'])) { ?>
                    <th class="text-center">Aktionen</th>
                    <?php } ?>

        
        </thead>
        <tbody>

             <?php
                include 'src/includes/computer.inc.php';
             ?>
        </tbody>
      </table>
      <?php } ?>
  </div>
</div>

<?php
    include_once "src/templates/footer.php";
?>

