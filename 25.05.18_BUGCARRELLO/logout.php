<?php

session_start();
$_SESSION["paginaChiamante"] = "logout.php";
$_SESSION["login"] = false;
echo "<script type='text/javascript'>window.location.replace(\"cancellaMessaggi.php\")</script>";
?>