<?php 
include 'src/templates/header.php'; 

?>

<div class="container tall">
    <div class="card my-card">
        <div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center">Registrierung neues Gerätes</h1>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form role="form" action="src/includes/add.inc.php" method="POST">
                        <input type="hidden" name="id">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="department">Abteilung</label>
                            <div class="col-sm-9">
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="department" id="department">
                                    <option value="Anmeldung">Anmeldung</option>
                                    <option value="Buchhaltung">Buchhaltung</option>
                                    <option value="MRT">MRT</option>
                                    <option value="Röntgen">Röntgen</option>
                                    <option value="CT">CT</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="ipAdrr">IP-Adresse</label>
                            <div class="form-inline col-sm-9">
                                <input type="number" class="form-control" name="ip_0" min="100" size="1" max="255">
                                <span style="font-weight: bold;">.</span>
                                <input type="number" class="form-control" name="ip_1" min="100" size="1" max="255">
                                <span style="font-weight: bold;">.</span>
                                <input type="number" class="form-control" name="ip_2" min="0" size="1" max="255">
                                <span style="font-weight: bold;">.</span>
                                <input type="number" class="form-control" placeholder="XXX" name="ip_3" min="10" size="1" max="254">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="manufacturer">Hersteller</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Ex: Lenovo" name="manufacturer">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="mac">MAC-Adresse</label>
                            <div class="form-inline col-sm-9">
                                <input class="form-control" type="text" name="mac_0" size="1">
                                <span style="font-weight: bold;">:</span>
                                <input class="form-control" type="text" name="mac_1" size="1">
                                <span style="font-weight: bold;">:</span>
                                <input class="form-control" type="text" name="mac_2" size="1">
                                <span style="font-weight: bold;">:</span>
                                <input class="form-control" type="text" name="mac_3" size="1">
                                <span style="font-weight: bold;">:</span>
                                <input class="form-control" type="text" name="mac_4" size="1">
                                <span style="font-weight: bold;">:</span>
                                <input class="form-control" type="text" name="mac_5" size="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="subnet">Subnet Mask</label>
                            <div class="col-sm-9 form-inline">
                                <input class="form-control" type="number" name="sub_0" min="100" size="1" max="255" value="<?php echo $tab['sub_0'];?>">
                                <span style="font-weight: bold;">.</span>
                                <input class="form-control" type="number" name="sub_1" min="100" size="1" max="255" value="<?php echo $tab['sub_1'];?>">
                                <span style="font-weight: bold;">.</span>
                                <input class="form-control" type="number" name="sub_2" min="100" size="1" max="255" value="<?php echo $tab['sub_2'];?>">
                                <span style="font-weight: bold;">.</span>
                                <input class="form-control" type="number" placeholder="XXX" name="sub_3" min="0" size="1" max="254">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="os">Betriebssystem</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" placeholder="Ex: Archlinux" name="os">
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
</div>