
    <div class="register-top heading">
        <h2>Jetzt kostenlos registrieren</h2>
    </div>

    <div class="register-main">
        <div class="col-md-6 account-left">
            <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator">
                <div class="form-group has-feedback">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="pasword">Passwort</label>
                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Passwort"  data-minlength="6" value="<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail" value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Adresse" value="<?=isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '';?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <button type="submit" class="btn btn-default">Registrieren</button>
            </form>
            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
        </div>
    </div>
