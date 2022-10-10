<?php
    // create new SQLite3-object
    $db = new SQLite3("tietokanta.db");

    // create new table named as "persons" and "teams"
    $db->exec("CREATE TABLE persons(id INTEGER PRIMARY KEY, name TEXT)");
    $db->exec("CREATE TABLE teams(id INTEGER PRIMARY KEY, team_json TEXT)");
?>