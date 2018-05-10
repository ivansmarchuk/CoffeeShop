<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/coffeeshop/">
    <?= $this->getMeta(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- CoffeShopStyle -->

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" id="google_font_3-css" href="https://fonts.googleapis.com/css?family=Patua+One&amp;ver=1.0"
          type="text/css" media="all">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">


</head>
<body>

<div class="wrapper">
    <header id="header">
        <!--TOP MENU-->
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?= PATH; ?>">Coffee Shop</a>

                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Über Uns</a></li>
                                <li><a href="#">Versand</a></li>

                                <li><a href="#">Contact</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">


                                <!-- <li><a href="../navbar/">Default</a></li>
                                 <li><a href="../navbar-static-top/">Static top</a></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">Mein Konto<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php if (!empty($_SESSION['user'])): ?>
                                            <li><a href="#">Herzlich
                                                    willkommen, <?= h($_SESSION['user']['name']); ?></a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#"><span
                                                            class="glyphicon glyphicon-shopping-cart"></span>
                                                    Warenkorb</a></li>
                                            <li><a href='#'><span
                                                            class="glyphicon glyphicon-time"></span>Bestellungen</a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="user/logout">Ausloggen</a></li>
                                        <?php else: ?>
                                            <li><a href="user/login">Einloggen</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="user/signup">Registrieren</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="<?= PATH; ?>"><img src="img/logo.png" height="60" width="250" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="#" id="h-searh">
                            <input type="text" value="Suchbegriff..."/>
                            <input type="submit" value=""/>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <div class="h-phone">
                            <a href="#">
                                <small><b>Kundenservice:</b></small>
                                <span>+49 177 666 555 33 </span>
                                <small>Mo.-Fr. 7.00 bis 20.00 Uhr</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="panel">
        <div class="container">
            <div class="row">
                <div class="clearfix">
<!--                --><?//= session_destroy() ;?>
                    <a href="#menu-toggle" class="btn btn-lg" id="menu-toggle"><span
                                class="glyphicon glyphicon-menu-hamburger"></span>Menu</a>

                    <a href="cart/show" onclick="getCart(); return false;" class="btn pull-right"
                       style="display: flex;">Warenkorb <span class="glyphicon glyphicon-shopping-cart">
                        </span>
                        <?php if (!empty($_SESSION['cart'])): ?>
                            <span id="checkout_items" class="checkout_items"><?= $_SESSION['cart.qty']; ?></span>
                        <?php else: ?>
                            <span class="checkout_items chckt_def"
                                  style="text-transform: none">0</span>
                        <?php endif; ?>
                    </a>


                </div>

            </div>
            <!--<a href="#" class="btn"><span class="glyphicon glyphicon-align-justify"></span>Alle Kategorien</a>-->
        </div>
    </div>
    <!-- Sidebar Holder -->

    <div class="container">
        <div class="row">

            <div id="wrapper" class="main-wrapper">
                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <div class="sidebr-item">
                        <h4 class="sidebar-title">Kategorien</h4>
                        <ul class="sidebar-list">
                            <li><a href="#">Neuheiten</a></li>
                            <li><a href="#">Meistverkauft</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-tags"></span>Aktionen</a></li>

                        </ul>
                    </div>
                    <div class="sidebr-item">
                        <h4 class="sidebar-title">Land</h4>
                        <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/menu.php',
                            'attrs' => [
                                'style' => ' ',

                            ]

                        ]) ?>
                    </div>
                </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">

                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['error'];
                                            unset($_SESSION['error']); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success">
                                            <?php echo $_SESSION['success'];
                                            unset($_SESSION['success']); ?>
                                        </div>
                                    <?php endif; ?>


                                </div>
<!--                                --><?//= session_destroy() ;?>
                                <?= $content; ?>


                            </div>


                        </div>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->
            </div>
            <!-- /#wrapper -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Warenkorb</h4>


            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Weiter Shoppen</button>
                <a href="cart/view" type="button" class="btn btn-primary btn_wrkb">Rechnung</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Warenkorb leeren</button>
            </div>
        </div>
    </div>
</div>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>
<script type="text/javascript" src="js/main.js"></script>


</body>
</html>