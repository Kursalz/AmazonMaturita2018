<?php

session_start();
if ($_SESSION["login"] == false) {
    $db = new PDO("sqlite:ECOMMERCE.sqlite");
    if (!$db) {
        die("Errore nell'apertura del database");
    }
    $username = $_POST["username"];
    $password = $_POST["password"];
    $statement = $db->prepare("SELECT * FROM CLIENTE WHERE username = '$username'") or die("Errore nella preparazione del database");
    $statement->execute() or die("Errore nell'accesso al database");
    $row = $statement->fetch();
    if ($row["password"] == $_POST["password"]) {
        $_SESSION["messaggioInfo"] = "Bentornato!";
        $_SESSION["messaggioErrore"] = "";
        $_SESSION["username"] = $username;
        $_SESSION["login"] = true;
        $_SESSION["idCliente"] = $row["id"];
    } else {
        $_SESSION["login"] = false;
        $_SESSION["messaggioInfo"] = "";
        $_SESSION["messaggioErrore"] = "Nome utente o password errati. Riprovare.";
    }
    $db = null;
    echo "<script type='text/javascript'>window.location.replace(\"index.php\")</script>";
}
?>

