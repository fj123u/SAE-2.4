<?php
function getAllArtiste($pdo)
{
    $sql = "SELECT * FROM Artiste ORDER BY idArtiste DESC;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>