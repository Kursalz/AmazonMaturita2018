<?php

session_start();
$_SESSION["messaggioInfo"] = "";
$_SESSION["messaggioErrore"] = "";
echo "<script type='text/javascript'>window.location.replace(\"index.php\")</script>";
?>