<?php 
include 'src/templates/header.php'; 

?>

<div class="container tall">
    <div class="card my-card">
        <div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center">Registrierung neuer Netzwerkkarte</h1>
                    <hr>
                    <?php if (isset($_GET['add'])) { ?> 

                    <?php if ($_GET['add'] == 'empty') { ?>   
                    <div class="alert alert-danger">
                      <strong>Alle Felder sind erforderlich!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['add'] == 'exists') { ?>   
                    <div class="alert alert-warning">
                      <strong>Es existiert bereits eine Netzwerkkarte mit diesem Identifier!</strong>
                    </div>
                    <?php } ?>
                    <?php if ($_GET['add'] == 'error') { ?>   
                        <div class="alert alert-danger">
                          <strong>Problem mit der Registrierung aufgetreten!</strong>
                        </div>
                    <?php } ?>

                <?php } ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form role="form" action="src/includes/network-add.inc.php" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="mac">Id</label>
                            <div class="form-inline col-sm-9">
                                <input class="form-control" type="text" name="id_0" size="5" maxlength="2">
                                <span style="font-weight: bold; position: relative; margin: 0 10px">-</span>
                                <input class="form-control" type="text" name="id_1" size="5" maxlength="2">
                                <span style="font-weight: bold; position: relative; margin: 0 10px">-</span>
                                <input class="form-control" type="text" name="id_2" size="5" maxlength="2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="company">Hersteller</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" placeholder="Ex: Intel Corporation" name="company">
                            </div>
                        </div>

                        <div class="float-right btn-space">
                            <button type="submit" class="btn btn-outline-success" name="submit">Registrieren</button>
                            <a href="javascript:history.back()" class="btn btn-outline-warning">Abbrechen</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php include_once "src/templates/footer.php"; ?>