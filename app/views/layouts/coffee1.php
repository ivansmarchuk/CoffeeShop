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
    <link href="css/style1.css" rel="stylesheet">
</head>
<body>

<div id="wrapper">
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
                            <a class="navbar-brand" href="#">Coffee Shop</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Über Uns</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" class="btn pull-right"><span
                                            class="glyphicon glyphicon-shopping-cart"></span>Zum
                                        Warenkorb</a></li>
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

    <!-- Sidebar -->

    <!-- Sidebar Holder -->

    <div class="container">
        <div class="row relative">
            <div class="wrapper">
                <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Bootstrap Sidebar</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Dummy Heading</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">About</a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Portfolio</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul>
            </nav>


            <!-- Page Content Holder -->
                 <div id="content">
                     <div class="row">
                         <div class="col-md-12 tg-side-menu">
                             <nav class="navbar navbar-default">
                                 <div class="container-fluid cont-main">
                                     <div class="navbar-header">
                                         <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                             <i class="glyphicon glyphicon-align-left"></i>
                                             <span>Toggle Sidebar</span>
                                         </button>
                                     </div>

                                     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                         <ul class="nav navbar-nav navbar-right">
                                             <li><a href="#">Page</a></li>
                                             <li><a href="#">Page</a></li>
                                             <li><a href="#">Page</a></li>
                                             <li><a href="#">Page</a></li>
                                         </ul>
                                     </div>
                                 </div>
                             </nav>
                         </div>
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

                         <div class="col-md-12 content ">
                             <div class="row product-wrap">
                                 <div class="col-md-4 product">
                                     <div class="product-img">
                                         <a href="#"><img src="img/img.png" height="218" alt=""></a>
                                         <span class="glyphicon glyphicon-eye-open review"></span>
                                     </div>
                                     <div class="product-footer">
                                         <h5>Jamaica Blue Mountain</h5>
                                         <span class="cat">
                                         Sein exzellentes Aroma, das Noten von gerösteten Nüssen aufweist,
                                        seine feine Säure und seine natürliche, leichte Süße machen diesen Kaffee
                                        zu etwas ganz Besonderem und zu einem der teuersten Kaffees der Welt.
                                    </span>
                                     </div>
                                     <div class="bottom-panel">
                                         <span class="price">15,99 €</span>
                                         <a href="#" class=""><span class="glyphicon glyphicon-shopping-cart"></span>Kaufen</a>
                                     </div>
                                 </div>
                                 <div class="col-md-4 product">
                                     <div class="product-img">
                                         <a href="#"><img src="img/img2.png" height="218" alt=""></a>
                                         <span class="glyphicon glyphicon-eye-open review"></span>
                                     </div>
                                     <div class="product-footer">
                                         <h5>Jamaica Blue Mountain</h5>
                                         <span class="cat">
                                         Sein exzellentes Aroma, das Noten von gerösteten Nüssen aufweist,
                                        seine feine Säure und seine natürliche, leichte Süße machen diesen Kaffee
                                        zu etwas ganz Besonderem und zu einem der teuersten Kaffees der Welt.
                                    </span>
                                     </div>
                                     <div class="bottom-panel">
                                         <span class="price">15,99 €</span>
                                         <a href="#" class=""><span class="glyphicon glyphicon-shopping-cart"></span>Kaufen</a>
                                     </div>
                                 </div>
                                 <div class="col-md-4 product">
                                     <div class="product-img">
                                         <a href="#"><img src="img/img3.png" height="218" alt=""></a>
                                         <span class="glyphicon glyphicon-eye-open review"></span>
                                     </div>
                                     <div class="product-footer">
                                         <h5>Jamaica Blue Mountain</h5>
                                         <span class="cat">
                                         Sein exzellentes Aroma, das Noten von gerösteten Nüssen aufweist,
                                        seine feine Säure und seine natürliche, leichte Süße machen diesen Kaffee
                                        zu etwas ganz Besonderem und zu einem der teuersten Kaffees der Welt.
                                    </span>
                                     </div>
                                     <div class="bottom-panel">
                                         <span class="price">15,99 €</span>
                                         <a href="#" class=""><span class="glyphicon glyphicon-shopping-cart"></span>Kaufen</a>
                                     </div>
                                 </div>
                                 <div class="col-md-4 product">
                                     <div class="product-img">
                                         <a href="#"><img src="img/img4.png" height="218" alt=""></a>
                                     </div>
                                     <div class="product-footer">
                                         <h5>Jamaica Blue Mountain</h5>
                                         <span class="cat">
                                         Sein exzellentes Aroma, das Noten von gerösteten Nüssen aufweist,
                                        seine feine Säure und seine natürliche, leichte Süße machen diesen Kaffee
                                        zu etwas ganz Besonderem und zu einem der teuersten Kaffees der Welt.
                                    </span>
                                     </div>
                                     <span class="price">15,99 €</span>

                                 </div>
                                 <div class="col-md-4 product">
                                     <div class="product-img">
                                         <a href="#"><img src="img/img.png" height="218" alt=""></a>
                                     </div>
                                     <div class="product-footer">
                                         <h5>Jamaica Blue Mountain</h5>
                                         <span class="cat">
                                         Sein exzellentes Aroma, das Noten von gerösteten Nüssen aufweist,
                                        seine feine Säure und seine natürliche, leichte Süße machen diesen Kaffee
                                        zu etwas ganz Besonderem und zu einem der teuersten Kaffees der Welt.
                                    </span>
                                     </div>
                                     <span class="price">15,99 €</span>
                                 </div>
                                 <div class="col-md-4 product">
                                     <div class="product-img">
                                         <a href="#"><img src="img/img.png" height="218" alt=""></a>
                                     </div>
                                     <div class="product-footer">
                                         <h5>Jamaica Blue Mountain</h5>
                                         <span class="cat">
                                         Sein exzellentes Aroma, das Noten von gerösteten Nüssen aufweist,
                                        seine feine Säure und seine natürliche, leichte Süße machen diesen Kaffee
                                        zu etwas ganz Besonderem und zu einem der teuersten Kaffees der Welt.
                                    </span>
                                     </div>
                                     <span class="price">15,99 €</span>
                                 </div>
                             </div>
                         </div>
                     </div>



                 </div>
            </div>
            </div>
    </div>



</div>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/hammer.js/1.1.3/hammer.min.js"></script>

<script src="js/sidebar.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script>$(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });</script>
<script type="text/javascript" src="js/my.js"></script>

</body>
</html>