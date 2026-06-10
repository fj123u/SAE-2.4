<?php
function getAllConcert($pdo)
{
    $sql = "SELECT * FROM concert ORDER BY idConcert DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addConcert($pdo, $artiste, $scene, $date, $hDebut, $hFin)
{
    $stmt = $pdo->prepare("INSERT INTO concert (date, heureDebut, heureFin, idArtiste, idScene) VALUES (:date, :heureDebut, :heureFin, :idArtiste, :idScene)");
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":heureDebut", $hDebut);
    $stmt->bindParam(":heureFin", $hFin);
    $stmt->bindParam(":idArtiste", $artiste);
    $stmt->bindParam(":idScene", $scene);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function modifyConcert($pdo, $artiste, $scene, $date, $hDebut, $hFin)
{
    $stmt = $pdo->prepare("UPDATE concert SET idArtiste = :idArtiste, idScene = :idScene, date = :date, heureDebut = :heureDebut, heureFin = :heureFin WHERE id = :id");
    $stmt->bindParam(":idArtiste", $artiste);
    $stmt->bindParam(":idScene", $scene);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":heureDebut", $hDebut);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":heureFin", $hFin);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteConcert($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM Assiste WHERE idConcert = :idConcert; DELETE FROM concert WHERE idConcert = :idConcert");
    $stmt->bindParam(":idConcert", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>