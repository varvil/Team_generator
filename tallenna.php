<?php

//Haetaan tietokanta
$db = new SQLite3('tietokanta.db');

//Lisätään tauluun uusi auto
$db->exec("INSERT INTO persons(name) VALUES('".$_POST["nimi"]."')");

header("location: index.php");
?>