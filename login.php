<?php
    include "src/templates/header.php";

?>

<div class="container tall">
<div class="card my-card">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Anmeldung</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form role="form" action="src/includes/login.inc.php" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon fa fa-user"></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Benutzername/Email" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon fa fa-lock"></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Passwort">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name="submit">Anmelden</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include_once "src/templates/footer.php";
?>
</div>

