<?php
function getAllArtiste($pdo)
{
    $sql = "SELECT * FROM Artiste ORDER BY idArtiste DESC;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteArtiste($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM Assiste WHERE idConcert IN (SELECT idConcert FROM Concert WHERE idArtiste = :idArtiste)");
    $stmt->execute([':idArtiste' => $id]);

    $stmt = $pdo->prepare("DELETE FROM Concert WHERE idArtiste = :idArtiste");
    $stmt->execute([':idArtiste' => $id]);

    $stmt = $pdo->prepare("DELETE FROM Artiste WHERE idArtiste = :idArtiste");
    $stmt->execute([':idArtiste' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function ajouterArtiste($pdo, $nom, $style, $pays)
{
    $stmt = $pdo->prepare("INSERT INTO Artiste (nom, styleMusical, pays) VALUES (:nom, :styleMusical, :pays);");
    $stmt->bindParam(":nom", $date);
    $stmt->bindParam(":styleMusical", $hDebut);
}

function getNameArtiste($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT nom FROM Artiste WHERE idArtiste = :idArtiste;");
    $stmt->execute([':idArtiste' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>