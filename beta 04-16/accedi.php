
<?php

session_start();
if ($_SESSION["login"] == false) {
     $db = new PDO("sqlite:SitoCommercioElettronico.sqlite");
    if (!$db) {
        die("Errore nell'apertura del database");
    }
    $username = $_POST["username"];
    $password = $_POST["password"];
    $statement = $db->prepare("SELECT nome, password FROM CLIENTE WHERE username = '$username'") or die("Errore nella preparazione del database");
    $statement->execute() or die("Errore nell'accesso al database");
    $row = $statement->fetch();
    if ($row["password"] == $_POST["password"]) {
        $_SESSION["messaggio"] = "Bentornato, $username!";
        $_SESSION["username"] = $username;
        $_SESSION["login"] = true;
    } else {
        $_SESSION["login"] = false;
        $_SESSION["messaggio"] = "Nome utente o password errati. Riprovare.";
    }
    $db = null;
    header("location: index.php");
}
?>

