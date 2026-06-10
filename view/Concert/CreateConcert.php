<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Ajouter un concert</h1>
<form method="POST" action="index.php?page=concerts&action=create">
    <div class="form-group">
        <label for="idArtiste">Artiste</label>
        <select id="idArtiste" name="idArtiste" required>
            <option value="">-- Sélectionner un artiste --</option>
            <?php foreach ($artistes as $a): ?>
                <option value="<?= $a['idArtiste'] ?>" <?= (isset($_POST['idArtiste']) && $_POST['idArtiste'] == $a['idArtiste']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($a['nom']) ?> (<?= htmlspecialchars($a['styleMusical']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="idScene">Scène</label>
        <select id="idScene" name="idScene" required>
            <option value="">-- Sélectionner une scène --</option>
            <?php foreach ($scenes as $s): ?>
                <option value="<?= $s['idScene'] ?>" <?= (isset($_POST['idScene']) && $_POST['idScene'] == $s['idScene']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($s['nomScene']) ?> (<?= $s['capacite'] ?> places)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($_POST['date'] ?? '') ?>" required>
    </div>
    <div class="form-group">
        <label for="heureDebut">Heure de début</label>
        <input type="time" id="heureDebut" name="heureDebut" value="<?= htmlspecialchars($_POST['heureDebut'] ?? '') ?>" required>
    </div>
    <div class="form-group">
        <label for="heureFin">Heure de fin</label>
        <input type="time" id="heureFin" name="heureFin" value="<?= htmlspecialchars($_POST['heureFin'] ?? '') ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
    <a href="index.php?page=concerts&action=index" class="btn btn-primary">Annuler</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
