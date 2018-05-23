<?php session_start(); ?>
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
                            <li class = "active"><a href = "categorie.php">Categorie</a></li>
								<?php
								if ($_SESSION["login"]) {
									echo "<li><a href = \"carrello.php\">Carrello</a></li>";
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
    </body>
	<?php echo "VISUALIZZA I PRODOTTI DI UNA CATEGORIA
dalla tabella CATEGORIA scegliere una categoria e
in base alla chiave primaria (id) selezionare
solo i prodotti appartenenti a tale categoria,
ovvero i prodotti che presentano nella chiave esterna idCategoria
lo stesso valore della chiave primaria id della categoria scelta.
LE DATE VENGONO REGISTRATE NEL DATABASE COME STRINGHE DI OTTO CARATTERI NEL FORMATO \"AAAAMMGG\"
	\"    SELECT  C.nome, P.nome, P.descrizione, P.dataInizio, P.dataFine, P.immagine, P.quantitaTotale, P.prezzoUnitario --,C.descrizione forse non servono tutti i campi se vuoi togli quelli che non ti servono
	       FROM  PRODOTTO P
	 INNER JOIN  CATEGORIA C
	         ON  C.id = P.idCategoria
	      WHERE  SidCategoriaSelezionata=C.id AND Soggi>=dataInizio AND Soggi<=dataFine\""; ?>
</html>