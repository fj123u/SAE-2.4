<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Ajouter un artiste</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?page=artistes&action=create">
    <div class="form-group">
        <label for="nom">Nom de l'artiste</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" required>
    </div>
    <div class="form-group">
        <label for="styleMusical">Style musical</label>
        <input type="text" id="styleMusical" name="styleMusical" value="<?= htmlspecialchars($_POST['styleMusical'] ?? '') ?>" required>
    </div>
    <div class="form-group">
        <label for="pays">Pays d'origine</label>
        <input type="text" id="pays" name="pays" value="<?= htmlspecialchars($_POST['pays'] ?? '') ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
    <a href="index.php?page=artistes&action=index" class="btn btn-primary">Annuler</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
