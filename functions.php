<?php

    class Func {

        public static function GetRandomPersons($size, $type) {

            $db = new SQLite3('tietokanta.db');
            $res = $db->query('SELECT * FROM persons ORDER BY RANDOM()');
            $arr = [];

            while($row = $res->fetchArray()) {
                array_push($arr, $row["name"]);
            }

            // Depends on whether the user has selected the number of teams or the number of people per team
            if(strpos($type, 'number-of-teams') !== false) {
                $count = ceil(sizeof($arr) / $size);
            } else {
                $count = $size;
            }

            // Divide the array into the desired groups and convert it to JSON
            $teams = array_chunk($arr, $count);
            $teams_as_json = json_encode($teams, JSON_PRETTY_PRINT);

            // Save randomized team to db as JSON text
            $stmt = $db->prepare('INSERT INTO teams(team_json) VALUES(:team_json)');
            $stmt->bindValue(':team_json', $teams_as_json, SQLITE3_TEXT);
            $result = $stmt->execute();

            echo "<div class='result'>";
            $i = 1;
            foreach($teams as $team)
            {
                echo "<div id=". $i ."><span class='team__name'>Team " . $i . " </span><br>"; 

                foreach($team as $member) {
                    echo "<span class='person__span'>".$member."</span><br>";
                }

                echo "</div>";
                $i++;
            }
            echo "</div>";
        }
    }
?>