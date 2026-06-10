<h1>Ajouter un concert</h1>
<?php if (isset($error)): ?>
    <p style="color: red;">
        <?= htmlspecialchars($error) ?>
    </p>
<?php endif; ?>
<form method="post" action="index.php?page=concerts&action=create">
    <div>
        <label for="artiste">Artiste</label>
        <select id="artiste" name="artiste" required>
            <option value="">Sélectionner un artiste</option>
            <?php foreach ($artistes as $artiste): ?>
                <option value="<?= $artiste['idArtiste'] ?>" <?= (isset($_POST['idArtiste']) && $_POST['idArtiste'] == $artiste['idArtiste']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($artiste['nom']) ?> (<?= htmlspecialchars($artiste['styleMusical']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="scene">Scene</label>
        <select id="scene" name="scene" required>
        <option value="">Sélectionner une scène</option>
            <?php foreach ($scenes as $scene): ?>
                <option value="<?= $scene['idScene'] ?>" <?= (isset($_POST['idScene']) && $_POST['idScene'] == $scene['idScene']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($scene['nomScene']) ?> (<?= $scene['capacite'] ?> places)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
    </div>
    <div>
        <label for="hDebut">Heure Début</label>
        <input type="time" id="hDebut" name="hDebut" required>
    </div>
    <div>
        <label for="hFin">Heure Fin</label>
        <input type="time" id="hFin" name="hFin" required>
    </div>
    <button type="submit">Ajouter</button>
</form>