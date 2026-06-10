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
?>