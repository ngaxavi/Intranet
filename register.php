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
      </div>
  </div>
  <div class="row justify-content-center">
      <div class="col-md-8">
      <form role="form" action="" method="POST">
                <div class="form-group row">
                    <label class="col-form-label col-sm-3" for="username">Benutzername</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Benutzername">
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-form-label col-sm-3" for="firstName">Vorname</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Vorname">
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-form-label col-sm-3" for="lastName">Nachname</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="lastName" placeholder="Nachname">
                    </div>
                 </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3" for="email">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
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

                <button type="submit" class="btn btn-primary btn-block">Registrieren</button>
            </form>
      </div>
  </div>
</div>
</div>
</div>

<?php
    include_once "src/templates/footer.php";
?>

</div> <!-- /container -->

