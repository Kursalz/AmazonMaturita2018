<?php

session_start();
$_SESSION["inizializzato"] = true;
$_SESSION["username"] = "";
$_SESSION["login"] = false;
$_SESSION["idCliente"] = "";
echo "<script type='text/javascript'>window.location.replace(\"cancellaMessaggi.php\")</script>";
?>