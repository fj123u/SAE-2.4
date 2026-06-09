<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Liste des artistes</h1>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        <?php if ($_GET['success'] == 1): ?>Artiste ajouté avec succès.
        <?php elseif ($_GET['success'] == 2): ?>Artiste modifié avec succès.
        <?php elseif ($_GET['success'] == 3): ?>Artiste supprimé avec succès.
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="search-form">
    <form method="GET" action="index.php" style="display:flex;gap:0.5rem;align-items:center;">
        <input type="hidden" name="page" value="artistes">
        <input type="hidden" name="action" value="index">
        <input type="text" name="style" placeholder="Rechercher par style..." value="<?= htmlspecialchars($_GET['style'] ?? '') ?>">
        <button type="submit" class="btn btn-primary">Rechercher</button>
        <a href="index.php?page=artistes&action=index" class="btn btn-warning">Réinitialiser</a>
    </form>
</div>

<a href="index.php?page=artistes&action=create" class="btn btn-success" style="margin-bottom:1rem;display:inline-block;">+ Ajouter un artiste</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Style musical</th>
            <th>Pays</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artistes as $a): ?>
        <tr>
            <td><?= $a['idArtiste'] ?></td>
            <td><?= htmlspecialchars($a['nom']) ?></td>
            <td><?= htmlspecialchars($a['styleMusical']) ?></td>
            <td><?= htmlspecialchars($a['pays']) ?></td>
            <td class="actions">
                <a href="index.php?page=artistes&action=edit&id=<?= $a['idArtiste'] ?>" class="btn btn-warning">Modifier</a>
                <form method="POST" action="index.php?page=artistes&action=delete&id=<?= $a['idArtiste'] ?>" style="display:inline;" onsubmit="return confirm('Confirmer la suppression ?');">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
