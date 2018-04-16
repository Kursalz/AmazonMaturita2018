<link rel="stylesheet" type="text/css" href="stile.css" >
<link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
    $db = new PDO("sqlite:SitoCommercioElettronico.sqlite");
    if (!$db) {
        die("Errore nell'apertura del database");
    }
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $indirizzo = $_POST["selectIndirizzo"] . " " . $_POST["indirizzo"];
    $numeroCivico = $_POST["nCivico"];
    $citta = $_POST["citta"];
    $regione = $_POST["regione"];
    $metodoPagamento = $_POST["selectPagamento"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $telefono = $_POST["telefono"];
    $credito = random_int(0, 1500);
    if ($password == $password2) {
        echo "INSERT INTO INDIRIZZO(via, numeroCivico, citta, regione) VALUES(':v', ':n', ':c', ':r')";
        $prepIndirizzo = $db->prepare("INSERT INTO INDIRIZZO(via, numeroCivico, citta, regione) VALUES(:v , :n , :c , :r)");
        $prepIndirizzo->bindParam(":v", $indirizzo, PDO::PARAM_STR);
        $prepIndirizzo->bindParam(":n", $numeroCivico, PDO::PARAM_STR);
        $prepIndirizzo->bindParam(":c", $citta, PDO::PARAM_STR);
        $prepIndirizzo->bindParam(":r", $regione, PDO::PARAM_STR);
        $prepIndirizzo->execute() or die("<div id='messaggio' style='margin-left:5px;'>Errore nell'inserimento degli indirizzi nel database.</div>");
        $statement = $db->prepare("INSERT INTO CLIENTE(username, password,nome,cognome,numeroTel,idIndirizzo) VALUES ('$username', '$password', '$indirizzo)") or die("Errore nella preparazione del database");
        $statement->execute() or die("<div id='messaggio' style='margin-left:5px;'>Le password non corrispondono.</div>");
        //$row = $statement->fetch();



        $_SESSION["messaggio"] = "Registrazione avvenuta con successo. E' possibile effettuare il login.";
        $db = null;
    } else {
        $_SESSION["messaggio"] = "Le password inserite non corrispondono. Riprovare.";
    }
    header("location: index.php");
}
?>

