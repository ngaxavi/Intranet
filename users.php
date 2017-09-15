<?php
    include "src/templates/header.php";
?>

<div class="container tall">
    <div class="card my-card">
    <div class="row">
            <div class="col-lg-12">
                <h2 class="my-4 text-center">Verwaltung von Rechten der Benutzern </h2>
                <hr>
                <?php if (isset($_GET['update_rechte'])) { ?> 

                    <?php if ($_GET['update_rechte'] == 'error') { ?>   
                    <div class="alert alert-danger">
                      <strong>Es besteht ein Problem mit dem Update von User Rechte!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['update_rechte'] == 'success') { ?>   
                    <div class="alert alert-success">
                      <strong>Die Rechte wurden updatet!</strong>
                    </div>
                    <?php } ?>

                <?php } ?>
            </div>
            
            <table id="mydrivers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="thead-default">
                    <tr>
                        <th class="text-center">Benutzername</th>
                        <th class="text-center">Vorname</th>
                        <th class="text-center">Nachname</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Rechte</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        include_once 'src/includes/dbh.inc.php';
                        
                        $sql = "SELECT u.id, u.username, u.first_name, u.last_name, u.email, r.name AS role_name 
                                FROM users u, user_role ur, roles r 
                                WHERE u.id = ur.user_id AND ur.role_id != 3 AND r.id = ur.role_id";

                        $result = $pdo->prepare($sql);
                        $result->execute();

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                        

                        <tr>
                            <td class="text-center"><?php echo $row['username']; ?></td>
                            <td class="text-center"><?php echo $row['first_name']; ?></td>
                            <td class="text-center"><?php echo $row['last_name']; ?></td>
                            <td class="text-center"><?php echo $row['email']; ?></td>
                            <td class="text-center">
                            <form action="src/includes/users.inc.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="user_id">
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="role">
                                <option value="ADMIN" <?php echo ($row['role_name'] === 'ADMIN') ? 'selected' : ''; ?>>ADMIN</option>
                                <option value="USER" <?php echo ($row['role_name'] === 'USER') ? 'selected' : ''; ?>>USER</option>
                            </select>
                            | <button class="btn btn-sm btn-outline-info" name='update' type="submit">Update Rechte</button>
                            </form>
                            </td>
                        </tr>
                        
                        <?php } ?>
                    
                
                </tbody>
          </table>
           
        </div>

        </div>
<?php
    include_once "src/templates/footer.php";
?>

</div>
</div>