<?php

$db = new SQLite3('tietokanta.db');

//Suoritetaan haku kannasta
$res = $db->querySingle('SELECT count(*) as count FROM persons');

echo "<p>All participants : " .$res. "<br> \n";

?>