<?php

session_start();
$_SESSION["login"] = false;
$_SESSION["messaggioInfo"] = "";
$_SESSION["messasggioErrore"] = "";
echo "<script type='text/javascript'>window.location.replace(\"index.php\")</script>";
?>