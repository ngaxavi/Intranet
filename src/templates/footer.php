<hr>

<footer>
  <p><b>&copy; Bisso Na Bisso 2017</b></p>
</footer>

</div> <!--close container --> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<?php if($_SERVER['PHP_SELF'] == "/network.php") { ?>
<script>
  $(document).ready(function() {
    var hasPrivileges = $('thead').attr('id');

    $('#mydrivers').DataTable({
            "bProcessing": true,
            "sAjaxSource": "src/includes/network.inc.php",
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
                        return '<a class="btn btn-sm btn-outline-danger" title="Netzwerkkarte löschen" onclick="return confirm(\'Sind Sie sicher, dass diese Netwerkkarte löschen möchen?\')" href="src/includes/network-remove.inc.php?id=' + full['id'] + '"><i class="fa fa-trash-o"></i></a>';
                    }
                }
                ]
    });  
});  

</script>
<?php } ?>
</body>
</html>