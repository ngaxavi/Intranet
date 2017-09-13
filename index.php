<?php
    include "src/templates/header.php";

?>

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3"> Praxis Biso Na Biso</h1>
    <p>
      Das ist das Intranet der Praxis Biso Na Biso. Alle Geräte, die sich in verschiedenen Abteilungen befinden
      werden hier registriert und aufgelistet.
    </p>
    <p>
      <a class="btn btn-primary btn-lg" href="infos.php" role="button">Mehr Infos &raquo;</a>
    </p>
  </div>
</div>

<div class="container">
<div class="row">
  <div class="col-md-12">
      <div class="form-inline">
        <h1>Liste aller Computer in der Praxis</h1>
        <a href="add.php" class="btn btn-sm btn-outline-success ml-auto">
          <span class="fa fa-plus"></span>
          <span>Gerät hinzufügen</span>
          </a>
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

      <table class="table table-striped">
        <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Abteilung</th>
                    <th class="text-center">Hersteller</th>
                    <th class="text-center">IP-Adresse</th>
                    <th class="text-center">MAC-Adresse</th>
                    <th class="text-center">Subnet-Adresse</th>
                    <th class="text-center">Betriebssystem</th>
                    <th class="text-center">Aktionen</th>
        
        </thead>
        <tbody>

                    <?php
                          include_once 'src/includes/dbh.inc.php';
                          
                          $sql = "SELECT * FROM computers";
                          $result = $pdo->prepare($sql);
                          $result->execute();
                          
                          while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                              <tr>
                                <th scope="row" class="text-center"><?php echo $row['id']; ?></th>
                                <td class="text-center"><?php echo $row['department']; ?></td>
                                <td class="text-center"><?php echo $row['manufacturer']; ?></td>
                                <td class="text-center"><?php echo $row['ip_0'] . "." . $row['ip_1'] . "." . $row['ip_2'] . "." . $row['ip_3']; ?></td>
                                <td class="text-center"><?php echo $row['mac_0'] . ":" . $row['mac_1'] . ":" . $row['mac_2'] . ":" . $row['mac_3'] . ":" . $row['mac_4'] . ":" . $row['mac_5']; ?></td>
                                <td class="text-center"><?php echo $row['sub_0'] . "." . $row['sub_1'] . "." . $row['sub_2'] . "." . $row['sub_3']; ?></td>
                                <td class="text-center"><?php echo $row['os']; ?></td>
                                <td class="text-center"><a class="btn btn-sm btn-outline-warning" href="update.php?update=<?php echo $row['id'];?>">Bearbeiten</a> | <a class="btn btn-sm btn-outline-danger" href="delete.php?delete=$row[id]">Löschen</a></td>
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

