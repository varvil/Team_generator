<?php

$db = new SQLite3('tietokanta.db');

//Suoritetaan haku kannasta
$db->exec("DELETE FROM persons");


header("location: index.php");

?>