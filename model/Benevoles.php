<?php
require_once __DIR__ . '/../config/database.php';

class Benevoles {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query(
            "SELECT b.*, COUNT(m.idMission) AS nbMissions
             FROM Benevole b
             LEFT JOIN Missioner m ON b.idBenevole = m.idBenevole
             GROUP BY b.idBenevole
             ORDER BY b.nomBenevole"
        );
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Benevole WHERE idBenevole = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($nomBenevole, $prenomBenevole, $email, $telephone) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Benevole (nomBenevole, prenomBenevole, email, telephone)
             VALUES (:nom, :prenom, :email, :telephone)"
        );
        $stmt->execute([
            'nom' => $nomBenevole,
            'prenom' => $prenomBenevole,
            'email' => $email,
            'telephone' => $telephone
        ]);
    }

    public function update($id, $nomBenevole, $prenomBenevole, $email, $telephone) {
        $stmt = $this->pdo->prepare(
            "UPDATE Benevole SET nomBenevole = :nom, prenomBenevole = :prenom,
             email = :email, telephone = :telephone WHERE idBenevole = :id"
        );
        $stmt->execute([
            'id' => $id,
            'nom' => $nomBenevole,
            'prenom' => $prenomBenevole,
            'email' => $email,
            'telephone' => $telephone
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Benevole WHERE idBenevole = :id");
        $stmt->execute(['id' => $id]);
    }

    public function getMissions($idBenevole) {
        $stmt = $this->pdo->prepare(
            "SELECT mi.* FROM Mission mi
             JOIN Missioner m ON mi.idMission = m.idMission
             WHERE m.idBenevole = :id ORDER BY mi.date, mi.heureDebut"
        );
        $stmt->execute(['id' => $idBenevole]);
        return $stmt->fetchAll();
    }
}
