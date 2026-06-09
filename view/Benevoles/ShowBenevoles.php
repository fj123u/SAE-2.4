<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Liste des bénévoles</h1>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        <?php if ($_GET['success'] == 1): ?>Bénévole ajouté avec succès.
        <?php elseif ($_GET['success'] == 2): ?>Bénévole modifié avec succès.
        <?php elseif ($_GET['success'] == 3): ?>Bénévole supprimé avec succès.
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<a href="index.php?page=benevoles&action=create" class="btn btn-success" style="margin-bottom:1rem;display:inline-block;">+ Ajouter un bénévole</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Missions</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($benevoles as $b): ?>
        <tr>
            <td><?= $b['idBenevole'] ?></td>
            <td><?= htmlspecialchars($b['nomBenevole']) ?></td>
            <td><?= htmlspecialchars($b['prenomBenevole']) ?></td>
            <td><?= htmlspecialchars($b['email']) ?></td>
            <td><?= htmlspecialchars($b['telephone'] ?? '-') ?></td>
            <td><?= $b['nbMissions'] ?></td>
            <td class="actions">
                <a href="index.php?page=benevoles&action=edit&id=<?= $b['idBenevole'] ?>" class="btn btn-warning">Modifier</a>
                <form method="POST" action="index.php?page=benevoles&action=delete&id=<?= $b['idBenevole'] ?>" style="display:inline;" onsubmit="return confirm('Confirmer la suppression ?');">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
