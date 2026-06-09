<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Ajouter un bénévole</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?page=benevoles&action=create">
    <div class="form-group">
        <label for="nomBenevole">Nom</label>
        <input type="text" id="nomBenevole" name="nomBenevole" value="<?= htmlspecialchars($_POST['nomBenevole'] ?? '') ?>" required>
    </div>
    <div class="form-group">
        <label for="prenomBenevole">Prénom</label>
        <input type="text" id="prenomBenevole" name="prenomBenevole" value="<?= htmlspecialchars($_POST['prenomBenevole'] ?? '') ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone (optionnel)</label>
        <input type="tel" id="telephone" name="telephone" value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>">
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
    <a href="index.php?page=benevoles&action=index" class="btn btn-primary">Annuler</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
