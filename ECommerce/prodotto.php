<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
        <title>Dettagli prodotto</title>
    <a href="index.php"><h1 align='center' class="titolo">Prodotti per l'ufficio | Sito di E - Commerce</h1></a>
    <?php
    session_start();
    if (isset($_SESSION["paginaCarrello"])) {
        if ($_SESSION["paginaCarrello"] == true) {
            echo "<a href='carrello.php' id='indietro'>🢢Torna indietro</a><br>";
        } else {
            echo "<a href='index.php' id='indietro'>🢢Torna indietro</a><br>";
        }
    }
    ?>
</head>
<body>
    <?php

    $_SESSION["codice"] = $_GET["codice"];
    $codice = $_SESSION["codice"];
    $_SESSION["paginaCarrello"] = false;
    $db = new PDO("sqlite:ecommerce.sqlite");
    if (!$db) {
        die("Errore nell'apertura del database");
    }
    $statement = $db->prepare("SELECT * FROM Prodotti WHERE ID='$codice'") or die("Errore nella preparazione del database");
    $statement->execute() or die("Errore nell'accesso al database");
    while ($row = $statement->fetch()) {
        echo "<h2 class='sottotitolo'>", $row["nome"], "</h2>";
        echo "<div>", $row["descrizione"], "</div>";
        echo "<img width='275' height='200' src='/Immagini/", $row["ID"], ".png'><br>";
        echo "<div>Quantità disponibile: ", $row["quantita"], "</div>";
        echo "<div>Prezzo: €", $row["prezzo"], "</div>";
    }
    echo "<form action='aggiungiAlCarrello.php' method='get' >";
    echo "<input type='hidden' id='codice' name='codice' value='", $_SESSION["codice"], "'>";
    ?>
    <button type="submit" class="button">Aggiungi al carrello<i class="fa fa-shopping-cart"></i></button>
    <div id="erroreCarrello" style="color: red;font-weight: bold;">
        <?php
        if (isset($_SESSION["erroreCarrello"])) {
            echo $_SESSION["erroreCarrello"];
        } else {
            echo "<script src='nascondiErroreCarrello.js'></script>";
        }
        ?>
    </div>
</form>
</body>
</html>
