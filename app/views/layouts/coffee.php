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
    <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/sidebar-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">

</head>
<div id="wrapper">
    <header id="header">
        <!--TOP MENU-->
        <div class="container">
            <div class="row">
                <div class="h-panel clearfix">
                    <nav class="h-nav h-nav-tabs">
                        <a href='#' class="active">Coffee Shop</a>
                        <a href='#'>Über Uns</a>
                    </nav>
                    <nav class="h-nav h-nav-center">
                        <a href='#'>Aktionen</a>
                        <a href='#'>Versand</a>
                        <a href='#'>Kontakt</a>
                    </nav>
                    <nav class="h-nav pull-right">
                        <div class="btn-group">
                            <a class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="glyphicon glyphicon-user"></span>Mein Konto
                            </a>
                            <ul class="dropdown-menu h-nav-menu">
                                <?php if (!empty($_SESSION['user'])): ?>
                                    <li><a href="#">Herzlich willkommen, <?= h($_SESSION['user']['name']); ?></a></li>
                                    <li><a href='#'><span class="glyphicon glyphicon-time"></span>Bestellungen</a></li>
                                    <li><a href="user/logout">Ausloggen</a></li>
                                <?php else: ?>
                                    <li><a href="user/login">Einloggen</a></li>
                                    <li><a href="user/signup">Registrieren</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <!--

                        <a href='#'><span class="glyphicon glyphicon-user"></span>Mein Konto</a>
                        -->
                    </nav>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="#"><img src="img/logo.png" height="60" width="250" alt=""></a>
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

    <!--MAIN MENU-->
    <div class="panel">
        <div class="container">
            <div class="row">
                <div class="dropdown">
                    <!--Category MENU-->
                    <ul class="panel-menu-wrap clearfix">
                        <li>
                            <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"
                               class="btn"><span
                                        class="glyphicon glyphicon-align-justify"></span>Alle Kategorien<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu panel-menu" role="menu" aria-labelledby="dLabel">
                                <li><a href="#">Neuheiten</a></li>
                                <li><a href="#">Meistverkauft</a></li>

                                <li><a href="#"><span class="glyphicon glyphicon-tags"></span>Aktionen</a></li>
                                <li role="presentation" class="divider"></li>
                                <li><a href="#">Brasilien</a></li>
                                <li><a href="#">Vietnam</a></li>
                                <li><a href="#">Indonesien</a></li>
                                <li><a href="#">Kolumbien</a></li>
                                <li><a href="#">Äthiopien</a></li>
                                <li><a href="#">Indien</a></li>
                            </ul>
                        </li>
                        <li><span class="btn sp">Vietnam</span></li>
                    </ul>

                    <a href="#" class="btn pull-right"><span class="glyphicon glyphicon-shopping-cart"></span>Zum
                        Warenkorb</a>
                </div>

                <!--<a href="#" class="btn"><span class="glyphicon glyphicon-align-justify"></span>Alle Kategorien</a>-->

            </div>
        </div>
    </div>
    <!--MAIN BODY-->
    <div class="container">
        <div class="row relative">
            <div data-sidebar="true" data-force-toggle="true" data-locked="true"
                 data-hammer-scrollbar="true" class="sidebar-trigger sidebar-force-open sidebar-locked">
                <a class="sidebar-toggle" href="#">
                    <span class="sr-only">Sidebar toggle</span>
                    <i class="fa fa-sidebar-toggle"></i>
                </a>

                <div class="sidebar-wrapper sidebar-default sidebar-open-init">
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
                        <ul class="sidebar-list-check">
                            <li>
                                <input id="med" type="checkbox"/>
                                <label for="med">Land_1</label>
                            </li>
                            <li>
                                <input id="med" type="checkbox"/>
                                <label for="med">Land_2</label>
                            </li>
                            <li>
                                <input id="med" type="checkbox"/>
                                <label for="med">Land_3</label>
                            </li>
                            <li>
                                <input id="med" type="checkbox"/>
                                <label for="med">Land_4</label>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebr-item">
                        <h4 class="sidebar-title">Preis</h4>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12">
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

                <?= $content; ?>
            </div>
        </div>
    </div>
</div>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/hammer.js/1.1.3/hammer.min.js"></script>

<script src="js/sidebar.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script type="text/javascript" src="js/my.js"></script>
</body>
</html>