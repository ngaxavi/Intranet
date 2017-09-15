
<?php
    include "src/templates/header.php";
?>

<div class="container tall">
    <div class="card my-card">
        <div class="row">
            <div class="col-md-12">
                <div class="form-inline">
                    <h1>Informationen über Netzwerkkarte</h1>
                    <a href="" class="btn btn-sm btn-outline-success ml-auto">
                        <span class="fa fa-plus"></span>
                        <span>Netwerkkarte hinzufügen</span>
                    </a>
                </div>
                <hr>
                
                <table id="mydrivers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-default">
                        <tr>
                            <th class="text-center">Netzwerkkarte Id (Hex)</th>
                            <th class="text-center">Netzwerkkarte Id (Base 16)</th>
                            <th class="text-center">Hersteller</th>
                        </tr>
                    </thead>
            </table>
            
        </div>
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
                { mData: 'company_id_hex' } ,
                { mData: 'company_id_base' },
                { mData: 'company_name' }
                ]
    });  
});  

</script>
</div>
</div>