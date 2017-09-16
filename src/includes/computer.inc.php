<?php

include_once 'dbh.inc.php';
include_once 'utils.inc.php';


if (isset($_GET['department'])) {
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
  
  // get mac company that create the network card
  $base = strtoupper($row['mac_0']) . strtoupper($row['mac_1']) .strtoupper($row['mac_2']);
  $statement = "SELECT company_name FROM drivers WHERE company_id_base = :base";

  $query = $pdo->prepare($statement);
  $query->execute(array(':base' => $base));

  $company = $query->fetch(PDO::FETCH_ASSOC);

  $company_name = $company ? $company['company_name'] : 'Unbekannt';
  
  
  ?>
    <tr>
        <td class="text-center"><?php echo utf8_decode($row['department']); ?></td>
        <td class="text-center"><?php echo utf8_decode($row['manufacturer']); ?></td>
        <td class="text-center"><?php echo $row['ip_0'] . "." . $row['ip_1'] . "." . $row['ip_2'] . "." . $row['ip_3']; ?></td>
        <td class="text-center"><?php echo $row['mac_0'] . ":" . $row['mac_1'] . ":" . $row['mac_2'] . ":" . $row['mac_3'] . ":" . $row['mac_4'] . ":" . $row['mac_5']; ?></td>
        <td class="text-center"><?php echo $row['sub_0'] . "." . $row['sub_1'] . "." . $row['sub_2'] . "." . $row['sub_3']; ?></td>
        <td class="text-center"><?php echo $company_name; ?></td>
        <td class="text-center"><?php echo $row['os']; ?></td>
        <?php
            if (isset($_SESSION['username']) && hasAdminOrSystemRole($_SESSION['user_role'])) { ?>
                <td class="text-center" style='white-space: nowrap'>
                    <a class="btn btn-sm btn-outline-warning" href="update.php?update=<?php echo $row['id'];?>" title="Bearbeiten"><i class="fa fa-pencil"></i></a> 
                    <?php if (hasSystemRole($_SESSION['user_role'])) { ?>
                     | <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-id="<?php echo $row['id'];?>" data-target="#myModal_<?php echo $row['id'];?>" title="Löschen"><i class="fa fa-trash-o"></i></button>
                    <?php  } ?>
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
                <?php  } ?>
            </tr>
            <?php } ?>