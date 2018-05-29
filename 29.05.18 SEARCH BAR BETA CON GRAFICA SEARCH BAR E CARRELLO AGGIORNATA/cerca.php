<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Risultati ricerca</title>

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
                                if (isset($_SESSION["login"])) {
                                    if ($_SESSION["login"]) {
                                        echo "<li><a href=\"logout.php\"><i class=\"fa fa-user\"></i> Logout</a></li>";
                                        echo "<li><div id=\"username\" style=\"color: #1abc9c\">Utente: ", $_SESSION["username"], "</div></li>";
                                    }
                                } else {
                                    echo"<li><a href=\"accedi.html\"><i class=\"fa fa-user\"></i> Accedi</a></li>";
                                    echo "<li><a href=\"registrati.html\"><i class=\"fa fa-user\"></i> Registrati</a></li>";
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
                    <?php
                    if (isset($_SESSION["login"])) {
                        if ($_SESSION["login"]) {
                            echo "<div class = \"col-sm-6\">
                        <div class = \"shopping-item\">
                            <a href = \"carrello.php\">Carrello - <span class = \"cart-amunt\">800&euro;</span> <i class = \"fa fa-shopping-cart\"></i> <span class = \"product-count\">5</span></a>
                        </div>
                    </div>";
                        }
                    }
                    ?>
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
                            <li><a href = "index.php">Home</a></li>
                            <li><a href = "shop.php">Negozio</a></li>
                            <li><a href = "categorie.php">Categorie</a></li>
                            <?php
                            if (isset($_SESSION["login"])) {
                                if ($_SESSION["login"]) {
                                    echo "<li><a href = \"carrello.php\">Carrello</a></li>";
                                    echo "<li><a href = \"acquisti.php\">Acquisti</a></li>";
                                }
                            } else {
                                echo "<li><a href = \"accedi.html\">Accedi</a></li>";
                            }
                            ?>
                            <li><a href = "contatti.php">Contatti</a></li>
                           <li><form action="cerca.php">
                                    <input type="text" placeholder="Cerca.." name="cerca" id="searchBar">
                                    <button type="submit" id="searchButton"><i class="fa fa-search" ></i></button>
                                </form></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!--End mainmenu area -->
        <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>
                                RISULTATI RICERCA : 
                                <?php
                                echo $_GET["cerca"];
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $db = new PDO("sqlite:ECOMMERCE.sqlite");
        if (!$db) {
            die("Errore nell'apertura del database");
        }
        $stringa = $_GET["cerca"];
        $statement = $db->prepare("SELECT * FROM PRODOTTO WHERE nome LIKE '%$stringa%' OR descrizione LIKE '%$stringa%'");
        $statement->execute();
        $numRigheRestituite = intval($statement->rowCount());
        if ($stringa != "" /*and $numRigheRestituite !==0*/) {
            echo "<table align='center' id='tabellaCerca'><tbody>";
            while ($result = $statement->fetch()) {
                echo "<tr style='border:3px solid #1abc9c;'>";
                echo "<td class='cellaCerca'><a href='prodotto.php?prodotto=",$result["id"],"'><img width='100' height='100' src='", $result["immagine"], "'></img></a></td>";
                echo "<td class='cellaCerca'><a href='prodotto.php?prodotto=",$result["id"],"'>", $result["nome"], "</a></td>";
                echo "<td class='cellaCerca'>Pezzi disponibili: ", $result["quantitaTotale"], "</td>";
                echo "<td class='cellaCerca'>Prezzo: &euro; ", $result["prezzoUnitario"], "</td>";
                echo "</tr>";
            }
        } else {
            echo "<div style='font-size:22px;padding:15px;text-decoration:underline blue;margin: auto;'>Nessun risultato trovato</div>";
        }
        ?>
   </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>                        
                        </div>                    
                    </div>
                </div>
            </div>
        </div>


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