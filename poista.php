<?php

$db = new SQLite3('tietokanta.db');

//Lisätään tauluun uusi auto
$db->exec("DELETE FROM persons WHERE id = ".$_GET["id"]);

header("location: index.php");
?>