<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Planning des concerts</h1>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        <?php if ($_GET['success'] == 1): ?>Concert ajouté avec succès.
        <?php elseif ($_GET['success'] == 2): ?>Concert modifié avec succès.
        <?php elseif ($_GET['success'] == 3): ?>Concert supprimé avec succès.
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<a href="index.php?page=concerts&action=create" class="btn btn-success" style="margin-bottom:1rem;display:inline-block;">+ Ajouter un concert</a>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Artiste</th>
            <th>Scène</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($concerts as $c): ?>
        <tr>
            <td><?= $c['date'] ?></td>
            <td><?= substr($c['heureDebut'], 0, 5) ?></td>
            <td><?= substr($c['heureFin'], 0, 5) ?></td>
            <td><?= htmlspecialchars($c['nomArtiste']) ?></td>
            <td><?= htmlspecialchars($c['nomScene']) ?></td>
            <td class="actions">
                <a href="index.php?page=concerts&action=edit&id=<?= $c['idConcert'] ?>" class="btn btn-warning">Modifier</a>
                <form method="POST" action="index.php?page=concerts&action=delete&id=<?= $c['idConcert'] ?>" style="display:inline;" onsubmit="return confirm('Confirmer la suppression ?');">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
