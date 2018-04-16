<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Prodotti per l'ufficio | Sito di E - Commerce</title>
        <link rel="stylesheet" type="text/css" href="stile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
    <a href="index.php"><h1 align='center' class="titolo">Prodotti per l'ufficio | Sito di E - Commerce</h1></a>
</head>
<body>
    <button type="submit" id="btnAccedi" class="button" onclick="location.href = 'accedi.html'">Accedi <i class="fa fa-sign-in"></i></button>
    <button type="submit" id="btnRegistrati" class="button" onclick="location.href = 'registrati.html'">Registrati <i class="fa fa-user-plus"></i></button>
    <button type="submit" id="btnEsci" class="button" style="display:none" onclick="location.href = 'esci.php'">Esci <i class="fa fa-sign-out"></i></button>
    <button type="submit" id="btnCarrello" class="button" onclick="location.href = 'carrello.php'">
        Vai al carrello <i class="fa fa-shopping-cart"></i>
    </button>
    <script type="text/javascript" src="/JavaScripts/esci.js"></script>
    <div id="messaggio">
        <?php
        session_start();
        if (isset($_SESSION["messaggio"])) {
            echo $_SESSION["messaggio"];
        }
        if (isset($_SESSION["login"])) {
            if ($_SESSION["login"] == true) {
                echo "<script type='text/javascript' src='/javaScripts/loginRiuscito.js'></script>";
            }
        }
        ?>
    </div>
    <?php
    $_SESSION["aggiuntoCarrello"] = false;
    $db = new PDO("sqlite:SitoCommercioElettronico.sqlite");
    if (!$db) {
        die("Errore nell'apertura del database");
    }
    $db->exec("INSERT INTO PRODOTTO(id, nome, descrizione, dataInizio, dataFine, idCategoria, immagine, prezzo)"
            . " VALUES(1, 'sigarette', 'fumare', '16/04/2016', '01/01/2020', 1, 'Immagini/4.png', 10)");
        $db->exec("INSERT INTO PRODOTTO(id, nome, descrizione, dataInizio, dataFine, idCategoria, immagine, prezzo)"
            . " VALUES(2, 'sigari', 'fumare++', '30/02/2017', '01/01/2020', 1, 'Immagini/3.png', 15.99)");
    $statement = $db->prepare("SELECT * FROM PRODOTTO") or die("Errore nella preparazione del database");
    $statement->execute() or die("Errore nell'accesso al database");
    echo "<table align='center'>";
    $n = 0;
    $_SESSION["nProdotti"] = 0;
    while ($row = $statement->fetch()) {
        $_SESSION["nProdotti"] ++;
        if ($n == 0) {
            echo "<tr>";
        }
        echo "<td><a href='prodotto.php?codice=", $row["id"], "'><img width='275' height='200' src='",$row["immagine"],"'><br><hr><br>";
        echo "<div id='nomeProdotto'>", $row["nome"], "</a></div></td>";
        $n++;
        if ($n == 5) {
            $n = 0;
            echo "</tr>";
        }
    }
    echo "</table>";
    $db = null;
    ?>
</body>
</html>
