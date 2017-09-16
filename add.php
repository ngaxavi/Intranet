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
                    <?php if (isset($_GET['status'])) { ?> 

                    <?php if ($_GET['status'] == 'empty') { ?>   
                    <div class="alert alert-danger">
                      <strong>Alle Felder sind erforderlich!</strong>
                    </div>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form role="form" action="src/includes/add.inc.php" method="POST">
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
                                <input type="number" class="form-control col-sm-2" onKeyPress="if(this.value.length === 3) return false;" name="ip_0" value="100" min="100" max="255">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">.</span>
                                <input type="number" class="form-control col-sm-2" onKeyPress="if(this.value.length === 3) return false;" name="ip_1" value="100" min="100" max="255">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">.</span>
                                <input type="number" class="form-control col-sm-2" onKeyPress="if(this.value.length === 3) return false;" name="ip_2" value="0" min="0" max="255">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">.</span>
                                <input type="number" class="form-control col-sm-2" onKeyPress="if(this.value.length === 3) return false;" placeholder="XXX" name="ip_3" value="10" min="10" max="254">
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
                                <input class="form-control" type="text" value="00" onKeyPress="if(this.value.length === 2) return false;" name="mac_0" size="2" minlength="2" maxlength="2">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">:</span>
                                <input class="form-control" type="text" value="00" onKeyPress="if(this.value.length === 2) return false;" name="mac_1" size="2" minlength="2" maxlength="2">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">:</span>
                                <input class="form-control" type="text" value="00" onKeyPress="if(this.value.length === 2) return false;" name="mac_2" size="2" minlength="2" maxlength="2">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">:</span>
                                <input class="form-control" type="text" value="00" onKeyPress="if(this.value.length === 2) return false;" name="mac_3" size="2" minlength="2" maxlength="2">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">:</span>
                                <input class="form-control" type="text" value="00" onKeyPress="if(this.value.length === 2) return false;" name="mac_4" size="2" minlength="2" maxlength="2">
                                <span style="font-weight: bold; position: relative; margin: 0 2px">:</span>
                                <input class="form-control" type="text" value="00" onKeyPress="if(this.value.length === 2) return false;" name="mac_5" size="2" minlength="2" maxlength="2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="subnet">Subnet Mask</label>
                            <div class="col-sm-9 form-inline">
                                <input class="form-control col-sm-2" type="number" value="100" onKeyPress="if(this.value.length === 3) return false;" name="sub_0" min="100" max="255" >
                                <span style="font-weight: bold;position: relative; margin: 0 2px">.</span>
                                <input class="form-control col-sm-2" type="number" value="100" onKeyPress="if(this.value.length === 3) return false;" name="sub_1" min="100" max="255" >
                                <span style="font-weight: bold;position: relative; margin: 0 2px">.</span>
                                <input class="form-control col-sm-2" type="number" value="100" onKeyPress="if(this.value.length === 3) return false;" name="sub_2" min="100" max="255">
                                <span style="font-weight: bold;position: relative; margin: 0 2px">.</span>
                                <input class="form-control col-sm-2" type="number" value="0" onKeyPress="if(this.value.length === 3) return false;" name="sub_3" min="0" max="254">
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