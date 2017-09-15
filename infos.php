
<?php
    include "src/templates/header.php";
    include_once 'src/includes/utils.inc.php';
?>

<div class="container tall">
    <div class="card my-card">
        <div class="row">
            <div class="col-md-12">
                <div class="form-inline">
                    <h1>Informationen über Netzwerkkarte</h1>
                    <?php if(isset($_SESSION['username']) && hasAdminOrSystemRole($_SESSION['user_role'])) { ?>
                    <a href="network.php" class="btn btn-sm btn-outline-success ml-auto">
                        <span class="fa fa-plus"></span>
                        <span>Netwerkkarte hinzufügen</span>
                    </a>
                    <?php }  ?>
                </div>
                <hr>

                <?php if (isset($_GET['add'])) { ?> 

                    <?php if ($_GET['add'] == 'success') { ?>   
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      <strong>Neue Netwerkkarte wurde erfolgreich registriert!</strong>
                    </div>
                    <?php } ?>

                <?php } ?>

                <?php if (isset($_GET['remove'])) { ?> 

                    <?php if ($_GET['remove'] == 'success') { ?>   
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      <strong>Die Netwerkkarte wurde erfolgreich gelöscht!</strong>
                    </div>
                    <?php } ?>

                <?php } ?>
            </div>
                
                <table id="mydrivers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-default" id="<?php echo isset($_SESSION['username']) && hasSystemRole($_SESSION['user_role']) ? 'hasRole': 'hasNoRole' ?>">
                        <tr>
                            <th class="text-center">Netzwerkkarte Id (Hex)</th>
                            <th class="text-center">Netzwerkkarte Id (Base 16)</th>
                            <th class="text-center">Hersteller</th>
                            <?php if (isset($_SESSION['username']) && hasSystemRole($_SESSION['user_role'])) { ?>  
                            <th class="text-center">Aktion</th>
                            <?php } ?>
                        </tr>
                    </thead>
            </table>
            
        </div>
       

        </div>
<?php
    include_once "src/templates/footer.php";
?>
<script>
  $(document).ready(function() {
    var hasPrivileges = $('thead').attr('id');

    $('#mydrivers').DataTable({
            "bProcessing": true,
            "sAjaxSource": "src/includes/infos.inc.php",
            "oLanguage": {
                "sLengthMenu": "Einträge anzeigen _MENU_",
                "sSearch": "Suche: _INPUT_",
                "sZeroRecords": "Keine Einträge anzuzeigen",
                "sLoadingRecords": "Bitte warten Sie - Lade...",
                "sInfoEmpty": "Keine Einträge anzuzeigen",
                "sInfo": "Anzeige _START_ bis _END_ von _TOTAL_ Einträgen",
                "oPaginate": {
                    "sNext": "Nächste Seite",
                    "sPrevious": "Vorherige Seite"
                }
            },
            "aoColumns": [
                { mData: 'company_id_hex' } ,
                { mData: 'company_id_base' },
                { mData: 'company_name' },
                {
                    mData: null,
                    visible: hasPrivileges === 'hasRole',
                    mRender: function(data, type, full) {
                        return '<a class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Sind Sie sicher, dass diese Netwerkkarte löschen möchen?\')" href="src/includes/network-remove.inc.php?id=' + full['id'] + '">Löschen</a>';
                    }
                }
                ]
    });  
});  

</script>
</div>
</div>