<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Startseite</a></li>
                <li>Warenkorb</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                    <div class="register-top heading">
                        <h2>Ausfertigung der Bestellung</h2>
                    </div>
                    <br><br>
                    <?php if(!empty($_SESSION['cart'])):?>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-bstl" >
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Anzahl</th>
                                    <th>Preis</th>
                                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                                    <tr>
                                        <td><a href="product/<?=$item['alias'] ?>"><img src="img/<?= $item['img'] ?>" height="100" alt="<?=$item['title'] ?>"></a></td>
                                        <td><a href="product/<?=$item['alias'] ?>"><?=$item['title'] ?></a></td>
                                        <td><?=$item['qty'] ?></td>
                                        <td><?=$item['price'] ?></td>
                                        <td><a href="/coffeeshop/cart/delete/?id=<?=$id ?>"><span data-id="<?=$id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                                    </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td>Zusammenanzahl:</td>
                                    <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'] ?></td>
                                </tr>
                                <tr>
                                    <td>Gesammtsumme:</td>
                                    <td colspan="4" class="text-right cart-sum"><?= $_SESSION['cart.sum'];?> €</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 account-left">
                            <form method="post" action="/coffeeshop/cart/checkout" role="form" data-toggle="validator">
                                <?php if(!isset($_SESSION['user'])): ?>
                                    <div class="form-group has-feedback">
                                        <label for="login">Login</label>
                                        <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="pasword">Passwort</label>
                                        <input type="password" name="password" class="form-control" id="pasword" placeholder="Passwort" value="<?= isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '' ?>" data-minlength="6" data-error="Das Passwort muss mindestens 6 Zeichen umfassen" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="email">E-Mail</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Adresse</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Adresse" value="<?= isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="address">Bemerkung</label>
                                    <textarea name="note" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Bestellen</button>
                            </form>
                            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                        </div>
                    <?php else: ?>
                        <h3>Warenkorb ist leer</h3>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->