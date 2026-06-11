<?php
// Récupère toutes les scènes
function getAllScene($pdo)
{
    $sql = "SELECT * FROM scene ORDER BY idScene DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Ajoute une scène
function addScene($pdo, $nomScene, $capacite, $emplacement)
{
    $stmt = $pdo->prepare("INSERT INTO Scene (nomScene, capacite, emplacement) VALUES (:nomScene, :capacite, :emplacement)");
    $stmt->bindParam(":nomScene", $nomScene);
    $stmt->bindParam(":capacite", $capacite);
    $stmt->bindParam(":emplacement", $emplacement);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Met à jour une scène
function modifyScene($pdo, $nomScene, $capacite, $emplacement, $id)
{
    $stmt = $pdo->prepare("UPDATE Scene SET nomScene = :nomScene, capacite = :capacite, emplacement = :emplacement WHERE idScene = :idScene");
    $stmt->bindParam(":nomScene", $nomScene);
    $stmt->bindParam(":capacite", $capacite);
    $stmt->bindParam(":emplacement", $emplacement);
    $stmt->bindParam(":idScene", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Supprime une scène et ses concerts associés
function deleteScene($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM concert WHERE idScene = :idScene; DELETE FROM Scene WHERE idScene = :idScene");
    $stmt->bindParam(":idScene", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupère le nom d'une scène par son id
function getNameScene($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT nomScene FROM Scene WHERE idScene = :idScene;");
    $stmt->execute([':idScene' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>