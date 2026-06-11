<?php 
function createViewPlanning($pdo)
{
    $sql = "CREATE VIEW IF NOT EXISTS planing_festival AS
            SELECT Concert.date, Concert.heureDebut, Concert.heureFin, Artiste.nom, Artiste.styleMusical, Scene.nomScene, Scene.emplacement
            FROM Concert
            JOIN Artiste ON Artiste.idArtiste = Concert.idArtiste
            JOIN Scene ON Scene.idScene = Concert.idScene
            ORDER BY Concert.date, Concert.heureDebut";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllInfos($pdo)
{
    $sql = "SELECT * FROM planing_festival;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>