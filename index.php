<?php
    include "src/templates/header.php";
?>

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3"> Praxis Biso Na Biso</h1>
    <p>
      Das ist das Intranet der Praxis Biso Na Biso. Alle Geräte, die sich in verschiedenen Abteilungen befinden,
      werden hier registriert und aufgelistet.
    </p>
    <p>
      <a class="btn btn-primary btn-lg" href="infos.php" role="button">Mehr Informationen über die Netzwerkkarten &raquo;</a>
    </p>
  </div>
</div>

<div class="container">
<div class="row">
  <div class="col-md-12">
      <div class="form-inline">
        <h1>Liste aller Computer in der <?php echo isset($_GET['department']) ? $_GET['department'] .'-Abteilung ' : 'der Praxis' ?></h1>
        <?php
          if(isset($_SESSION['username'])) { ?>
            <a href="add.php" class="btn btn-sm btn-outline-success ml-auto">
              <span class="fa fa-plus"></span>
              <span>Gerät hinzufügen</span>
            </a>
          <?php } ?>
      </div>
      <hr>
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

      <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
                    <!-- <th class="text-center">ID</th> -->
                    <th class="text-center">Abteilung</th>
                    <th class="text-center">Hersteller</th>
                    <th class="text-center">IP-Adresse</th>
                    <th class="text-center">MAC-Adresse</th>
                    <th class="text-center">Subnet-Adresse</th>
                    <th class="text-center">Betriebssystem</th>
                    <?php
                      if(isset($_SESSION['username'])) { ?>
                    <th class="text-center">Aktionen</th>
                    <?php } ?>

        
        </thead>
        <tbody>

                    <?php
                          include_once 'src/includes/dbh.inc.php';


                          if(isset($_GET['department'])) {
                              $department = $_GET['department'];
                              $sql = "SELECT * FROM computers WHERE department = :department";
                              $result = $pdo->prepare($sql);
                              $result->execute(array(':department' => $department));
                          } else {
                            $sql = "SELECT * FROM computers";
                            $result = $pdo->prepare($sql);
                            $result->execute();
                          }
                          
                         
                          
                          while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                            ?>
                              <tr>
                                <td class="text-center"><?php echo utf8_decode($row['department']); ?></td>
                                <td class="text-center"><?php echo utf8_decode($row['manufacturer']); ?></td>
                                <td class="text-center"><?php echo $row['ip_0'] . "." . $row['ip_1'] . "." . $row['ip_2'] . "." . $row['ip_3']; ?></td>
                                <td class="text-center"><?php echo $row['mac_0'] . ":" . $row['mac_1'] . ":" . $row['mac_2'] . ":" . $row['mac_3'] . ":" . $row['mac_4'] . ":" . $row['mac_5']; ?></td>
                                <td class="text-center"><?php echo $row['sub_0'] . "." . $row['sub_1'] . "." . $row['sub_2'] . "." . $row['sub_3']; ?></td>
                                <td class="text-center"><?php echo $row['os']; ?></td>
                                <?php
                                if(isset($_SESSION['username'])) { ?>
                                <td class="text-center">
                                  <a class="btn btn-sm btn-outline-warning" href="update.php?update=<?php echo $row['id'];?>">Bearbeiten</a> | 
                                  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-id="<?php echo $row['id'];?>" data-target="#myModal_<?php echo $row['id'];?>">Löschen</button>
                                  <div class="modal fade" id="myModal_<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel"> 
                                          <span class="fa fa-exclamation-triangle" style="color: red"></span>
                                          <span style="color: red">Löschen bestätigen</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Sind Sie sicher, dass Sie das Gerät in der Abteilung <b><?php echo $row['department']; ?> </b>mit der MAC-Adresse 
                                        <b><?php echo $row['mac_0'] . ":" . $row['mac_1'] . ":" . $row['mac_2'] . ":" . $row['mac_3'] . ":" . $row['mac_4'] . ":" . $row['mac_5']; ?></b>
                                        und dessen Hersteller <b><?php echo $row['manufacturer']; ?></b> löschen möchten.<br>
                                        <span style="color: red">Diese Operation kann nicht rückgängig gemacht werden!!!</span>
                                      </div>
                                      <div class="modal-footer">
                                        <a class="btn btn-sm btn-secondary" data-dismiss="modal">Close</a>
                                        <a class="btn  btn-sm btn-outline-danger" name="delete" href="src/includes/delete.inc.php?delete=<?php echo $row['id'];?>">Löschen</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </td>
                                <?php } ?>
                              </tr>
                         <?php } ?>
                    
                </tbody>
      </table>
  </div>
</div>

<?php
    include_once "src/templates/footer.php";
?>

</div> <!-- /container -->

