<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Modifier le bénévole : <?= htmlspecialchars($benevole['prenomBenevole'] . ' ' . $benevole['nomBenevole']) ?></h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?page=benevoles&action=edit&id=<?= $benevole['idBenevole'] ?>">
    <div class="form-group">
        <label for="nomBenevole">Nom</label>
        <input type="text" id="nomBenevole" name="nomBenevole" value="<?= htmlspecialchars($_POST['nomBenevole'] ?? $benevole['nomBenevole']) ?>" required>
    </div>
    <div class="form-group">
        <label for="prenomBenevole">Prénom</label>
        <input type="text" id="prenomBenevole" name="prenomBenevole" value="<?= htmlspecialchars($_POST['prenomBenevole'] ?? $benevole['prenomBenevole']) ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? $benevole['email']) ?>" required>
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone (optionnel)</label>
        <input type="tel" id="telephone" name="telephone" value="<?= htmlspecialchars($_POST['telephone'] ?? $benevole['telephone'] ?? '') ?>">
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
    <a href="index.php?page=benevoles&action=index" class="btn btn-primary">Annuler</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
