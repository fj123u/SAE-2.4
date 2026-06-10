<h1>Ajouter un concert</h1>
<?php if (isset($error)): ?>
    <p style="color: red;">
        <?= htmlspecialchars($error) ?>
    </p>
<?php endif; ?>
<form method="post" action="index.php?page=concerts&action=create">
    <div>
        <label for="artiste">Artiste</label>
        <select id="idArtiste" name="idArtiste" required>
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
        <select id="idScene" name="idScene" required>
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
        <input type="date" id="date" name="date">
    </div>
    <div>
        <label for="hDebut">Heure Début</label>
        <input type="time" id="hDebut" name="hDebut">
    </div>
    <div>
        <label for="hFin">Heure Fin</label>
        <input type="time" id="hFin" name="hFin">
    </div>
    <button type="submit">Ajouter</button>
</form>