<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Liste des scènes</h1>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        <?php if ($_GET['success'] == 1): ?>Scène ajoutée avec succès.
        <?php elseif ($_GET['success'] == 2): ?>Scène modifiée avec succès.
        <?php elseif ($_GET['success'] == 3): ?>Scène supprimée avec succès.
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<a href="index.php?page=scenes&action=create" class="btn btn-success" style="margin-bottom:1rem;display:inline-block;">+ Ajouter une scène</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Capacité</th>
            <th>Emplacement</th>
            <th>Concerts</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($scenes as $s): ?>
        <tr>
            <td><?= $s['idScene'] ?></td>
            <td><?= htmlspecialchars($s['nomScene']) ?></td>
            <td><?= $s['capacite'] ?></td>
            <td><?= htmlspecialchars($s['emplacement']) ?></td>
            <td><?= $s['nbConcerts'] ?></td>
            <td class="actions">
                <a href="index.php?page=scenes&action=edit&id=<?= $s['idScene'] ?>" class="btn btn-warning">Modifier</a>
                <form method="POST" action="index.php?page=scenes&action=delete&id=<?= $s['idScene'] ?>" style="display:inline;" onsubmit="return confirm('Confirmer la suppression ?');">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
