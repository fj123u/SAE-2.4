<h1>Modifier le concert</h1>
<form method="POST" action="index.php?page=concerts&action=modify&id=<?= $concert['idConcert'] ?>">
    <div class="form-group">
        <label for="idArtiste">Artiste</label>
        <select id="idArtiste" name="idArtiste" required>
            <?php foreach ($artistes as $a): ?>
                <option value="<?= $a['idArtiste'] ?>" <?= ($a['idArtiste'] == ($_POST['idArtiste'] ?? $concert['idArtiste'])) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($a['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="idScene">Scène</label>
        <select id="idScene" name="idScene" required>
            <?php foreach ($scenes as $s): ?>
                <option value="<?= $s['idScene'] ?>" <?= ($s['idScene'] == ($_POST['idScene'] ?? $concert['idScene'])) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($s['nomScene']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($_POST['date'] ?? $concert['date']) ?>" required>
    </div>
    <div class="form-group">
        <label for="heureDebut">Heure de début</label>
        <input type="time" id="heureDebut" name="heureDebut" value="<?= htmlspecialchars($_POST['heureDebut'] ?? substr($concert['heureDebut'], 0, 5)) ?>" required>
    </div>
    <div class="form-group">
        <label for="heureFin">Heure de fin</label>
        <input type="time" id="heureFin" name="heureFin" value="<?= htmlspecialchars($_POST['heureFin'] ?? substr($concert['heureFin'], 0, 5)) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
    <a href="index.php?page=concerts&action=index" class="btn btn-primary">Annuler</a>
</form>