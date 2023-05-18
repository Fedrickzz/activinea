<?php

$tokens = array (
    'year'   => 31536000,
    'month'  => 2592000,
    'week'   => 604800,
    'day'    => 86400,
    'hour'   => 3600,
    'minute' => 60,
    'second' => 1
    );


// Insertar en la base de dades
$query = "INSERT INTO af (";
$query .= join(', ', array_keys($tokens));
$query .= ") VALUES ("; 

$lenght = count($tokens);
$counter = array_fill(0,$lenght,'?');

// emplenar amb ?
// exemple: "INSERT INTO Usuaris (nom, cognom, email) VALUES (?, ?, ?)"
$query .= join(", ", array_values($counter));

$query .= ")";

$counter_2 = array_fill(0,$lenght,'s');
$query_2 .= join("", array_values($counter_2));
$query_3 = '"'.$query_2 .'"';
// $query_4 = $query_3 . ', $'.join(', $', array_keys($tokens));
$query_4 = $query_3 . ', "'. join('", "', array_values($tokens)) . '"';




echo $query_4;
echo '<br>';

for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}