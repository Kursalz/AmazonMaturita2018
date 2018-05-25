<?php
session_start();
$_SESSION["paginaChiamante"] = "index.php";
if (!isset($_SESSION["inizializzato"]) || !$_SESSION["inizializzato"]) {
	echo "<script type='text/javascript'>window.location.replace(\"inizializza.php\")</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eElectronics</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li><a href="cancellaMessaggi.php"><i class="fa fa-heart"></i>eElectronics</a></li>
                                <li><a href="credits.php"><i class="fa fa-user"></i>Credits</a></li>
                                <li><a href="contatti.php"><i class="fa fa-user"></i>Contatti</a></li>
								<?php
								//if (isset($_SESSION["login"])){
								if (!isset($_SESSION["login"]) || !$_SESSION["login"]) {
									echo"<li><a href=\"accedi.html\"><i class=\"fa fa-user\"></i> Accedi</a></li>";
									echo "<li><a href=\"registrati.html\"><i class=\"fa fa-user\"></i> Registrati</a></li>";
								} else {
									echo "<li><a href=\"logout.php\"><i class=\"fa fa-user\"></i> Logout</a></li>";
									echo "<li><div id=\"username\" style=\"color: #1abc9c\">Utente: ", $_SESSION["username"], "</div></li>";
								}
								?>
                                <li> 
									<?php
									if (isset($_SESSION["messaggioInfo"])) {
										echo "<div id=\"messaggioInfo\" style=\"color: #1abc9c\">";
										echo $_SESSION["messaggioInfo"];
										echo "</div>";
									}
									if (isset($_SESSION["messaggioErrore"])) {
										echo "<div id=\"messaggioErrore\" style=\"color: #e50000\">";
										echo $_SESSION["messaggioErrore"];
										echo "</div>";
									}
									?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End header area -->
        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <h1><a href="cancellaMessaggi.php">e<span>Electronics</span></a></h1>
                        </div>
                    </div>

                    <div class = "col-sm-6">
                        <div class = "shopping-item">
                            <a href = "carrello.php">Carrello - <span class = "cart-amunt">$800</span> <i class = "fa fa-shopping-cart"></i> <span class = "product-count">5</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--End site branding area -->

        <div class = "mainmenu-area">
            <div class = "container">
                <div class = "row">
                    <div class = "navbar-header">
                        <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = ".navbar-collapse">
                            <span class = "sr-only">Toggle navigation</span>
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                        </button>
                    </div>
                    <div class = "navbar-collapse collapse">
                        <ul class = "nav navbar-nav">
                            <li class = "active"><a href = "index.php">Home</a></li>
                            <li><a href = "shop.php">Negozio</a></li>
                            <li><a href = "categorie.php">Categorie</a></li>
							<?php
							if (!isset($_SESSION["login"]) || !$_SESSION["login"]) {
								echo "<li><a href = \"accedi.html\">Accedi</a></li>";
							} else {
								echo "<li><a href = \"carrello.php\">Carrello</a></li>";
								echo "<li><a href = \"acquisti.php\">Acquisti</a></li>";
							}
							?>
                            <li><a href = "contatti.php">Contatti</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!--End mainmenu area -->
        <div class = "slider-area">
            <div class = "zigzag-bottom"></div>
            <div id = "slide-list" class = "carousel carousel-fade slide" data-ride = "carousel">

                <div class = "slide-bulletz">
                    <div class = "container">
                        <div class = "row">
                            <div class = "col-md-12">
                                <ol class = "carousel-indicators slide-indicators">
                                    <li data-target = "#slide-list" data-slide-to = "0" class = "active"></li>
                                    <li data-target = "#slide-list" data-slide-to = "1"></li>
                                    <li data-target = "#slide-list" data-slide-to = "2"></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "carousel-inner" role = "listbox">
                    <div class = "item active">
                        <div class = "single-slide">
                            <div class = "slide-bg slide-one"></div>
                            <div class = "slide-text-wrapper">
                                <div class = "slide-text">
                                    <div class = "container">
                                        <div class = "row">
                                            <div class = "col-md-6 col-md-offset-6">
                                                <div class = "slide-content">
                                                    <h2>eEletronics</h2>
                                                    <p>Benvenuto nel sito di commercio elettronico realizzato da Michele, Stefano, e i due Matteo!Qui potrai comprare qualunque prodotto desideri, ma attenzione, il sito è ancora in fase Beta e alcune funzioni non funzioneranno!</p>
                                                    <p>Il sito elettronico è pieno di funzionalità, e sarà molto semplice da utilizzare!Se hai bisogno di aiuto, o hai bisogno di comunicarci qualche problema riscontrato contattaci dall'apposito menù contatti!</p>
                                                    <a href="" class="readmore">Leggi di Più</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-slide">
                            <div class="slide-bg slide-two"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>We are great</h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, dolorum harum molestias tempora deserunt voluptas possimus quos eveniet, vitae voluptatem accusantium atque deleniti inventore. Enim quam placeat expedita! Quibusdam!</p>
                                                    <a href="" class="readmore">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-slide">
                            <div class="slide-bg slide-three"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>We are superb</h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eius?</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptates necessitatibus dicta recusandae quae amet nobis sapiente explicabo voluptatibus rerum nihil quas saepe, tempore error odio quam obcaecati suscipit sequi.</p>
                                                    <a href="" class="readmore">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>        
        </div> <!-- End slider area -->

        <div class="promo-area">
            <h1 align="center">I nostri vantaggi:</h1>
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6"><a href="vantaggi.php#recesso">
                            <div class="single-promo">
                                <i class="fa fa-refresh"></i>
                                <p>Reso entro 30 giorni</p>
                            </div></a>
                    </div>
                    <div class="col-md-3 col-sm-6"><a href="vantaggi.php#spedizioni">
                            <div class="single-promo">
                                <i class="fa fa-truck"></i>
                                <p>Spedizione gratuita</p>
                            </div></a>
                    </div>
                    <div class="col-md-3 col-sm-6"><a href="vantaggi.php#pagamenti">
                            <div class="single-promo">
                                <i class="fa fa-lock"></i>
                                <p>Pagamenti sicuri</p>
                            </div></a>
                    </div>
                    <div class="col-md-3 col-sm-6"><a href="vantaggi.php#prodotti">
                            <div class="single-promo">
                                <i class="fa fa-gift"></i>
                                <p>Nuovi prodotti</p>
                            </div></a>
                    </div>
                </div>
            </div>
        </div> <!-- End promo area -->

        <div class="footer-top-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-about-us">
                            <h2>e<span>Electronics</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                            <div class="footer-social">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">Navigazione </h2>
                            <ul>
                                <li><a href="#">Il mio Account</a></li>
                                <li><a href="#">Ordini completati</a></li>
                                <li><a href="#">Contatta il venditore</a></li>
                                <li><a href="index.php">Pagina iniziale</a></li>
                            </ul>                        
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">Categorie</h2>
                            <ul>
                                <li><a href="#">Mobile Phone</a></li>
                                <li><a href="#">Home accesseries</a></li>
                                <li><a href="#">LED TV</a></li>
                                <li><a href="#">Computer</a></li>
                                <li><a href="#">Gadets</a></li>
                            </ul>                        
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-newsletter">
                            <h2 class="footer-wid-title">Newsletter</h2>
                            <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                            <div class="newsletter-form">
                                <form action="#">
                                    <input type="email" placeholder="Type your email">
                                    <input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer top area -->

        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright">
                            <p>&copy; 2018 eElectronics. Tutti i diritti sono riservati. Codice <i class="fa fa-heart"></i> by <a href="http://www.itiszuccante.gov.it/" target="_blank">Zuccante</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-card-icon">
                            <i class="fa fa-cc-discover"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-paypal"></i>
                            <i class="fa fa-cc-visa"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer bottom area -->

        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>

        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- jQuery sticky menu -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>

        <!-- jQuery easing -->
        <script src="js/jquery.easing.1.3.min.js"></script>

        <!-- Main Script -->
        <script src="js/main.js"></script>
    </body>
</html>