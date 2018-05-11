
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">HauptSeite</a></li>
                <li>Einloggen</li>
            </ol>
        </div>
    </div>
</div>

<!--starts-->


<?php if (!isset($_SESSION['success'])): ?>
    <div class="register-top heading">
        <h2>Einloggen</h2>
    </div>

    <div class="register-main">
        <div class="col-md-6 account-left">
            <form method="post" action="user/login" id="signup" role="form" data-toggle="validator">
                <div class="form-group has-feedback">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="pasword">Passwort</label>
                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Passwort" data-error="Das Passwort muss mindestens 6 Zeichen umfassen" data-minlength="6" value="<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>


                <button type="submit" class="btn btn-default">Einloggen</button>
            </form>
        </div>
    </div>
<?php endif; ?>