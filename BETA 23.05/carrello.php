<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Carrello</title>
        <link rel="stylesheet" type="text/css" href="stile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
        <script type="text/javascript" src="/JavaScripts/aggiornaPrezzo.js"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eElectronics - HTML eCommerce Template</title>

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
        <?php
        /* function aggiungiDropDown($quantita, $prezzo, $IDProdotto) {
          if ($quantita >= 1) {
          $n = 1;
          echo "<td>Quantità : <select id='$IDProdotto' onchange='aggiornaPrezzo($prezzo, $IDProdotto)'>";
          while ($quantita >= 1) {
          $quantita--;
          echo "<option  value='$n'>$n</option>";
          $n++;
          }
          echo "</select></td>";
          }
          }
          if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
          $username = $_SESSION["username"];
          $db = new PDO("sqlite:ecommerce.sqlite");
          if (!$db) {
          die("Errore nell'apertura del database");
          }
          $statement = $db->prepare("SELECT * FROM Prodotti INNER JOIN Carrello ON Carrello.IDProdotto = Prodotti.ID WHERE Carrello.IDUtente = '$username'")
          or die("Errore nella preparazione del database");
          $statement->execute() or die("Errore nell'accesso al database");
          while ($row = $statement->fetch()) {
          $_SESSION["codice"] = $row["ID"];
          $_SESSION["paginaCarrello"] = true;
          echo "<tr><td><a href='prodotto.php?codice=", $row["ID"], "'><div>", $row["nome"], "</div></a></td>";
          echo "<td><a href='prodotto.php?codice=", $row["ID"], "'><img width='150' height='110' src='/Immagini/", $row["ID"], ".png'></a></td>";
          aggiungiDropDown(intval($row["quantita"]), intval($row["prezzo"]), intval($row["ID"]));
          $id = $row["ID"];
          echo "<td>Prezzo: €<span id='prezzo$id'>", $row["prezzo"], "</span></td>";
          echo "<td><a href='rimuoviDaCarrello.php?codice=$id'><img width='150' height='110' src='/Immagini/rimuoviDaCarrello.png'></a></td>";
          echo "<td style='display:none;'><input type='hidden' id='codProdotto$id' name='$id' value='", $row["prezzo"], "'></td></tr>";
          }
          }// */
        echo "AGGIUNGI AL CARRELLO
se non esiste ancora un carrello per il cliente,
Inserire un nuovo ordine con stato in carrello
inserire una nuova riga nella tabella PRODOTTIORDINATI facendo riferimento all'ordine appena creato e al prodotto che si intende aggiungere, specificandone la quantita
se esiste il carrello
controllare se il cliente ha già aggiunto quel prodotto: in questo caso incrementare la quantita
se si tratta di un prodotto non presente allora
inserire una nuova riga nella tabella PRODOTTIORDINATI facendo riferimento all'ordine appena creato e al prodotto che si intende aggiungere, specificandone la quantita

VISUALIZZA IL TUO CARRELLO
dalla tabella STATO recuperare l'id del \"CARRELLO\".
selezionare la chiave primaria (id) della tabella ORDINE in cui
idStato corrisponde alla chiave primaria id della tabella STATO e
idCliente corrisponde alla chiave primaria del cliente in questione,
e con quel valore di chiave primaria (la chiave primaria della tabella ORDINE)
selezionare tutte le righe della tabella PRODOTTIORDINATI in cui idOrdine
corrisponde al valore della chiave primaria id della tabella ORDINE.
utilizzare il campo quantita della tabella PRODOTTIORDINATI per completare il risultato.
	\"    SELECT  R.quantita, C.nome, P.nome, P.descrizione, P.dataInizio, P.dataFine, P.immagine, P.prezzoUnitario --,C.descrizione, P.quantitaTotale forse non servono tutti i campi se vuoi togli quelli che non ti servono
	       FROM  CATEGORIA C
	 INNER JOIN  PRODOTTO P
	         ON  C.id = P.idCategoria
	 INNER JOIN  PRODOTTIORDINATI R
	         ON  P.id = R.idProdotto
	 INNER JOIN  ORDINE O
	         ON  O.id = R.idOrdine
	 INNER JOIN  STATO S
	         ON  S.id = O.idStato
	      WHERE  'CARRELLO'=S.nome AND SidCliente=O.idCliente\"

EFFETTUA ACQUISTO
cambiare l'idStato dalla tabella acquisto (da carrello ad acquisto)";
        ?>
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
                                if ($_SESSION["login"]) {
                                    echo "<li><a href=\"logout.php\"><i class=\"fa fa-user\"></i> Logout</a></li>";
                                    echo "<li><div id=\"username\" style=\"color: #1abc9c\">Utente: ", $_SESSION["username"], "</div></li>";
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
                            <li><a href = "index.php">Home</a></li>
                            <li><a href = "shop.php">Negozio</a></li>
                            <li><a href = "categorie.php">Categorie</a></li>
                            <?php
                            if ($_SESSION["login"]) {
                                echo "<li class = \"active\"><a href = \"carrello.php\">Carrello</a></li>";
                                echo "<li><a href = \"acquisti.php\">Acquisti</a></li>";
                            } else {
                                echo "<li><a href = \"accedi.html\">Accedi</a></li>";
                            }
                            ?>
                            <li><a href = "contatti.php">Contatti</a></li>
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
                            <h2>CARRELLO</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Page title area -->


        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">





                    </div>

                    <div class="col-md-8">
                        <div class="product-content-right">
                            <div class="woocommerce">
                                <form method="post" action="#">
                                    <table cellspacing="0" class="shop_table cart">
                                        <thead>
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="#">×</a> 
                                                </td>

                                                <td class="product-thumbnail">
                                                    <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/product-thumb-2.jpg"></a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="single-product.html">Ship Your Idea</a> 
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount">£15.00</span> 
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <input type="button" class="minus" value="-">
                                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                                        <input type="button" class="plus" value="+">
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount">£15.00</span> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="actions" colspan="6">
                                                    <div class="coupon">
                                                        <label for="coupon_code">Coupon:</label>
                                                        <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                        <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                    </div>
                                                    <input type="submit" value="Update Cart" name="update_cart" class="button">
                                                    <input type="submit" value="Proceed to Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>

                                <div class="cart-collaterals">





                                    <div class="cart_totals ">
                                        <h2>Cart Totals</h2>

                                        <table cellspacing="0">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount">£15.00</span></td>
                                                </tr>

                                                <tr class="shipping">
                                                    <th>Shipping and Handling</th>
                                                    <td>Free Shipping</td>
                                                </tr>

                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount">£15.00</span></strong> </td>
                                                </tr>
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