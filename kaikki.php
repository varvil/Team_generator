<?php

$db = new SQLite3('tietokanta.db');

//Suoritetaan haku kannasta
$res = $db->query('SELECT * FROM persons');

//Tulostetaan hakutulos
while ($row = $res->fetchArray())
{
    echo '<h2"id='.$row["id"].'">'.$row["name"].'</h2>';
	echo '<a href="poista.php?id='.$row["id"].'"> <i class="bx bxs-x-circle"></i></a><br>';
}
?>