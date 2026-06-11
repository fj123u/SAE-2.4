<?php
function getAllScene($pdo)
{
    $sql = "SELECT * FROM scene ORDER BY idScene DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addScene($pdo, $nomScene, $capacite, $emplacement)
{
    $stmt = $pdo->prepare("INSERT INTO Scene (nomScene, capacite, emplacement) VALUES (:nomScene, :capacite, :emplacement)");
    $stmt->bindParam(":nomScene", $nomScene);
    $stmt->bindParam(":capacite", $capacite);
    $stmt->bindParam(":emplacement", $emplacement);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

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

function deleteScene($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM concert WHERE idScene = :idScene; DELETE FROM Scene WHERE idScene = :idScene");
    $stmt->bindParam(":idScene", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getNameScene($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT nomScene FROM Scene WHERE idScene = :idScene;");
    $stmt->execute([':idScene' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>