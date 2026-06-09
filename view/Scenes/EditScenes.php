<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Modifier la scène : <?= htmlspecialchars($scene['nomScene']) ?></h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?page=scenes&action=edit&id=<?= $scene['idScene'] ?>">
    <div class="form-group">
        <label for="nomScene">Nom de la scène</label>
        <input type="text" id="nomScene" name="nomScene" value="<?= htmlspecialchars($_POST['nomScene'] ?? $scene['nomScene']) ?>" required>
    </div>
    <div class="form-group">
        <label for="capacite">Capacité d'accueil</label>
        <input type="number" id="capacite" name="capacite" min="1" value="<?= htmlspecialchars($_POST['capacite'] ?? $scene['capacite']) ?>" required>
    </div>
    <div class="form-group">
        <label for="emplacement">Emplacement</label>
        <input type="text" id="emplacement" name="emplacement" value="<?= htmlspecialchars($_POST['emplacement'] ?? $scene['emplacement']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
    <a href="index.php?page=scenes&action=index" class="btn btn-primary">Annuler</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
