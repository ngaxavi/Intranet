

<?php
    include_once ("src/templates/header.php");
?>

<div class="container tall">
<div class="card my-card">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Registrierung</h1>
                <hr>
                <?php if (isset($_GET['register'])) { ?> 

                    <?php if ($_GET['register'] == 'empty') { ?>   
                    <div class="alert alert-danger">
                      <strong>Alle Felder sind erforderlich!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['register'] == 'email') { ?>   
                    <div class="alert alert-danger">
                      <strong>Bitte eine gültige E-Mail-Adresse eingeben!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['register'] == 'password') { ?>    
                    <div class="alert alert-danger">
                      <strong>Die Passwörter müssen gleich sein!</strong>
                    </div>
                    <?php } ?>

                    <?php if ($_GET['register'] == 'usernametaken') { ?>   
                    <div class="alert alert-danger">
                      <strong>Der Benutzername ist bereits vergeben!</strong>
                    </div>
                    <?php } ?>
                    <?php if ($_GET['register'] == 'emailtaken') { ?>  
                    <div class="alert alert-danger">
                      <strong>Diese Email wurde bereits benutzt!</strong>
                    </div>
                    <?php } ?>
                    <?php if ($_GET['register'] == 'success') { ?> 
                    <div class="alert alert-success">
                      <strong>Sie haben sich erfolgreich registriert!</strong>
                    </div>
                    <?php } ?>

                <?php } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form role="form" action="src/includes/register.inc.php" method="POST">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="username">Benutzername</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" 
                            value="<?php if (isset($_POST['username'])) {
                                echo $_POST['username'];} ?>"
                            placeholder="Benutzername">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="firstName">Vorname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstName" name="firstName" 
                            value="<?php if (isset($_POST['firstName'])) {
                                echo $_POST['firstName'];} ?>"
                            placeholder="Vorname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="lastName">Nachname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="lastName" 
                            value="<?php if (isset($_POST['lastName'])) {
                                echo $_POST['lastName'];} ?>"
                            placeholder="Nachname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="email">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" 
                            value="<?php if (isset($_POST['email'])) {
                                echo $_POST['email'];} ?>"
                            placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="password">Passwort</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Passwort">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="confirmPassword">Passwort Bestätigung</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Passwort bestätigen">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="submit">Registrieren</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include_once "src/templates/footer.php";
?>
</div>

