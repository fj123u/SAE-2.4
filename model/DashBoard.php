<?php
// Récupère les statistiques journalières
function getStats($pdo)
{
    $sql = ("SELECT * FROM stats_journalieres");
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Récupère les concerts par scène
function getConcertScene($pdo)
{
    $sql = ("SELECT * FROM concert_par_scene");
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>