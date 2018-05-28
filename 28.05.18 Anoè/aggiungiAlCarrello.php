<?php

session_start();
$_SESSION["paginaChiamante"] = "aggiungiAlCarrello.php";
if (!$_SESSION["login"]) {
	echo "<script type='text/javascript'>window.location.replace(\"inizializza.php\")</script>";
} else {
	$nomeStato = "CARRELLO";
	$db = new PDO("sqlite:ECOMMERCE.sqlite");
	if (!$db) {
		die("Errore nell'apertura del database");
	}
	$statement = $db->prepare("SELECT * FROM STATO S WHERE :n=S.nome") or die("Errore nella preparazione del database");
	$statement->bindParam(":n", $nomeStato, PDO::PARAM_STR);
	$statement->execute();
	$row = $statement->fetch();
	$idStatoCarrello = $row["id"];
	$db = null;
	//echo $idStato;
	$db = new PDO("sqlite:ECOMMERCE.sqlite");
	if (!$db) {
		die("Errore nell'apertura del database");
	}
	$statement = $db->prepare("SELECT * FROM ORDINE O WHERE :s=O.idStato AND :c=O.idCliente") or die("Errore nella preparazione del database");
	$statement->bindParam(":s", $idStatoCarrello, PDO::PARAM_STR);
	$statement->bindParam(":c", $_SESSION["idCliente"], PDO::PARAM_STR);
	$statement->execute();
	$numRigheRestituite = $statement->rowCount();
	//echo "quante righe: " . $numRigheRestituite;
	$row = $statement->fetch();
	$idOrdine = $row["id"];
	$db = null;
	if (!isset($idOrdine)) {
		$db = new PDO("sqlite:ECOMMERCE.sqlite");
		if (!$db) {
			die("Errore nell'apertura del database");
		}
		$statement = $db->prepare("INSERT INTO ORDINE (idCliente, idStato) VALUES (:c, :s)") or die("Errore nella preparazione del database");
		$statement->bindParam(":c", $_SESSION["idCliente"], PDO::PARAM_STR);
		$statement->bindParam(":s", $idStatoCarrello, PDO::PARAM_STR);
		$statement->execute();
		$db = null;
		$db = new PDO("sqlite:ECOMMERCE.sqlite");
		if (!$db) {
			die("Errore nell'apertura del database");
		}
		$statement = $db->prepare("SELECT * FROM ORDINE O WHERE :s=O.idStato AND :c=O.idCliente") or die("Errore nella preparazione del database");
		$statement->bindParam(":s", $idStatoCarrello, PDO::PARAM_STR);
		$statement->bindParam(":c", $_SESSION["idCliente"], PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch();
		$idOrdine = $row["id"];
		$db = null;
	}
	$db = new PDO("sqlite:ECOMMERCE.sqlite");
	if (!$db) {
		die("Errore nell'apertura del database");
	}
	$statement = $db->prepare("SELECT * FROM PRODOTTIORDINATI R WHERE :o=R.idOrdine AND :p=R.idProdotto") or die("Errore nella preparazione del database");
	$statement->bindParam(":o", $idOrdine, PDO::PARAM_STR);
	$statement->bindParam(":p", $_SESSION["idProdotto"], PDO::PARAM_STR);
	$statement->execute();
	$numRigheRestituite = $statement->rowCount();
	$row = $statement->fetch();
	$quantitaPresenteInCarrello = $row["quantita"];
	$db = null;
	if (!isset($quantitaPresenteInCarrello)) {
		$quantitaPresenteInCarrello = 0;
		$db = new PDO("sqlite:ECOMMERCE.sqlite");
		if (!$db) {
			die("Errore nell'apertura del database");
		}
		$statement = $db->prepare("INSERT INTO PRODOTTIORDINATI (idProdotto, idOrdine, quantita) VALUES (:p, :o, :q)");
		$statement->bindParam(":p", $_SESSION["idProdotto"], PDO::PARAM_STR);
		$statement->bindParam(":o", $idOrdine, PDO::PARAM_STR);
		$statement->bindParam(":q", $quantitaPresenteInCarrello, PDO::PARAM_STR);
		$statement->execute();
		$db = null;
		$db = new PDO("sqlite:ECOMMERCE.sqlite");
		if (!$db) {
			die("Errore nell'apertura del database");
		}
		$statement = $db->prepare("SELECT * FROM PRODOTTIORDINATI R WHERE :o=R.idOrdine AND :p=R.idProdotto") or die("Errore nella preparazione del database");
		$statement->bindParam(":o", $idOrdine, PDO::PARAM_STR);
		$statement->bindParam(":p", $_SESSION["idProdotto"], PDO::PARAM_STR);
		$statement->execute();
		$numRigheRestituite = $statement->rowCount();

		$row = $statement->fetch();
		$quantitaPresenteInCarrello = $row["quantita"];
		$db = null;
	}
	$quantitaDaAggiungereAlCarrello = 1;
	$quantitaPresenteInCarrello += $quantitaDaAggiungereAlCarrello;
	$db = new PDO("sqlite:ECOMMERCE.sqlite");
	if (!$db) {
		die("Errore nell'apertura del database");
	}
	$statement = $db->prepare("UPDATE PRODOTTIORDINATI SET quantita = :q WHERE :p=idProdotto AND :o=idOrdine");
	$statement->bindParam(":p", $_SESSION["idProdotto"], PDO::PARAM_STR);
	$statement->bindParam(":o", $idOrdine, PDO::PARAM_STR);
	$statement->bindParam(":q", $quantitaPresenteInCarrello, PDO::PARAM_STR);
	$statement->execute();
	$db = null;
	echo "<script type='text/javascript'>window.location.replace(\"carrello.php\")</script>";
}

/* if ($_SESSION["login"] == true) {
  if ($_SESSION["aggiuntoCarrello"] == false) {
  $_SESSION["aggiuntoCarrello"] = true;
  $db = new PDO("sqlite:ecommerce.sqlite");
  if (!$db) {
  die("Errore nell'apertura del database");
  }
  $codice = $_GET["codice"];
  $_SESSION["codice"] = $codice;
  $username = $_SESSION["username"];
  $statement = $db->prepare("SELECT * FROM Carrello");
  $statement->execute();
  $presente = false;
  while ($row = $statement->fetch()) {
  if ($codice == $row["IDProdotto"] && $_SESSION["username"] == $row["IDUtente"]) {
  $presente = true;
  }
  }
  if ($presente == false) {
  echo "INSERT INTO Carrello VALUES('", $_SESSION["username"], "', $codice)";
  $statement = $db->prepare("INSERT INTO Carrello('IDUtente', IDProdotto) VALUES('$username', $codice)");
  $statement->execute() or die("Errore nell'accesso al database");
  $db = null;
  $_SESSION["erroreCarrello"] = "";
  } else {
  $_SESSION["erroreCarrello"] = "Articolo già presente nel carrello";
  }
  }
  } else {
  $_SESSION["messaggio"] = "Effettuare il login per aggiungere un prodotto al carrello";
  header("location: index.php");
  }
  $codice = $_SESSION["codice"];
  header("location: prodotto.php?codice=$codice");// */
?>
