<?php
function getStats($pdo)
{
    $sql = ("SELECT * FROM stats_journalieres");
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getConcertScene($pdo)
{
    $sql = ("SELECT * FROM concert_par_scene");
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>