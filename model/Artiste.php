<?php
function getAllArtiste($pdo)
{
    $sql = "SELECT * FROM Artiste ORDER BY nom;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>