
<?php
    include "src/templates/header.php";
?>

<div class="container tall">
    <div class="card my-card">
    <div class="row">
            <div class="col-lg-12">
                <h2 class="my-4 text-center">Information</h2>
                <hr>
            </div>
            
            <table id="mydrivers" class="table table-striped">
                <thead class="thead-default">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Netzwerkkarte Id (Hex)</th>
                        <th class="text-center">Netzwerkkarte Id (Base 16)</th>
                        <th class="text-center">Hersteller</th>
                    </tr>
                </thead>
                <!-- <tbody>

                    <?php
                          include_once 'src/includes/dbh.inc.php';
                          
                          $sql = "SELECT * FROM drivers";
                          $result = $pdo->prepare($sql);
                          $result->execute();
                          
                          while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                              <tr>
                                <th scope="row" class="text-center"><?php echo $row['id']; ?></th>
                                <td class="text-center"><?php echo $row['company_id_hex']; ?></td>
                                <td class="text-center"><?php echo $row['company_id_base']; ?></td>
                                <td class="text-center"><?php echo $row['company_name']; ?></td>
                              </tr>
                         <?php } ?>
                    
                </tbody> -->
                
          </table>
           
        </div>

        </div>
<?php
    include_once "src/templates/footer.php";
?>
<script>
  $(document).ready(function() {
    $('#mydrivers').DataTable({
            "bProcessing": true,
            "sAjaxSource": "src/includes/infos.inc.php",
            "aoColumns": [
                { mData: 'id' } ,
                { mData: 'company_id_hex' } ,
                { mData: 'company_id_base' },
                { mData: 'company_name' }
                ]
    });  
});  

</script>
</div>
</div>