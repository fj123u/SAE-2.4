<?php
function getAllArtiste($pdo)
{
    $pdo = "SELECT * FROM Artiste ORDER BY nom;";
    return $pdo;
}


?>