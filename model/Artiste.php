<?php
// Récupère tous les artistes
function getAllArtiste($pdo)
{
    $sql = "SELECT * FROM Artiste ORDER BY idArtiste DESC;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Supprime un artiste et ses concerts associés
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

// Ajoute un artiste
function ajouterArtiste($pdo, $nom, $style, $pays)
{
    $stmt = $pdo->prepare("INSERT INTO Artiste (nom, styleMusical, pays) VALUES (:nom, :styleMusical, :pays);");
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":styleMusical", $style);
    $stmt->bindParam(":pays", $pays);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupère le nom d'un artiste par son id
function getNameArtiste($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT nom FROM Artiste WHERE idArtiste = :idArtiste;");
    $stmt->execute([':idArtiste' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Met à jour un artiste
function UpdateArtiste($pdo, $id, $nom, $style, $pays)
{
    $sql = "UPDATE Artiste
            SET nom = :nom,
            styleMusical = :styleMusical,
            pays = :pays
            WHERE idArtiste = :idArtiste;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":styleMusical", $style);
    $stmt->bindParam(":pays", $pays);
    $stmt->bindParam(":idArtiste", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>