<link rel="stylesheet" type="text/css" href="stile.css" >
<link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
    $db = new PDO("sqlite:ECOMMERCE.sqlite");
    if (!$db) {
        die("Errore nell'apertura del database");
    }
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $telefono = $_POST["telefono"];
    $citta = $_POST["citta"];
    $provincia = $_POST["provincia"];
    $cap = $_POST["cap"];
    $localita = $_POST["localita"];
    $via = $_POST["via"];
    $civico = $_POST["civico"];
    if ($password == $password2) {
        $statement = $db->prepare("SELECT C.username FROM CLIENTE C WHERE :u=C.username");
        $statement->bindParam(":u", $username, PDO::PARAM_STR);

        $numRigheRestituite = $statement->rowCount();
        echo $numRigheRestituite;
        if ($numRigheRestituite == 0) {
            $result = $statement->execute();
            //QUI MANCA L' INSERIMENTO DEI DATI NEL DB
        } else {
            $_SESSION["messaggio"] = "L'username inserito è già presente. Per cortesia ne scelga un altro.";
        }
        /*
          $prepIndirizzo = $db->prepare("INSERT INTO INDIRIZZO(via, numeroCivico, citta, regione) VALUES(:v , :n , :c , :r)");
          $prepIndirizzo->bindParam(":v", $indirizzo, PDO::PARAM_STR);
          $prepIndirizzo->bindParam(":n", $numeroCivico, PDO::PARAM_STR);
          $prepIndirizzo->bindParam(":c", $citta, PDO::PARAM_STR);
          $prepIndirizzo->bindParam(":r", $regione, PDO::PARAM_STR);
          $prepIndirizzo->execute() or die("<div id='messaggio' style='margin-left:5px;'>Errore nell'inserimento degli indirizzi nel database.</div>");
          $lastId = $db->lastInsertId();
          $statement = $db->prepare("INSERT INTO CLIENTE(username, password,nome,cognome,numeroTel,idIndirizzo) VALUES ('$username', '$password', '$nome', '$cognome', '$telefono', $lastId)") or die("Errore nella preparazione del database");
          $statement->execute() or die("<div id='messaggio' style='margin-left:5px;'>Le password non corrispondono.</div>");
          $_SESSION["messaggio"] = "Registrazione avvenuta con successo. E' possibile effettuare il login.";
          $db = null; */
    } else {
        $_SESSION["messaggio"] = "Le password inserite non corrispondono. Riprovare.";
    }
    //header("location: index.php");
}
?>

