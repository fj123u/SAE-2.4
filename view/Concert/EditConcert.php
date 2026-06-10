<h1>Modifier le concert</h1>
<?php foreach ($concerts as $concert)
{
    if ($concert["idConcert"] == $id)
    {
        $idArtiste = $concert["idArtiste"];
        $idScene = $concert["idScene"];
        $date = $concert["date"];
        $hDebut = $concert["heureDebut"];
        $hFin = $concert["heureFin"];
    }
}?>

<form method="post" action="index.php?page=concerts&action=update">
    <input type="hidden" name="idConcert" value="<?php echo $id; ?>">
    <div>
        <label for="artiste">Artiste</label>
        <select id="artiste" name="artiste" required>
            <?php foreach ($artistes as $artiste): ?>
                <option value="<?= $artiste['idArtiste'] ?>"
                    <?= $artiste['idArtiste'] == $idArtiste ? 'selected' : '' ?>>
                    <?= htmlspecialchars($artiste['nom']) ?> (<?= htmlspecialchars($artiste['styleMusical']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="scene">Auteur</label>
        <select id="scene" name="scene" required>
            <?php foreach ($scenes as $scene): ?>
                <option value="<?= $scene['idScene'] ?>"
                    <?= $scene['idScene'] == $idScene ? 'selected' : '' ?>>
                    <?= htmlspecialchars($scene['nomScene']) ?> (<?= htmlspecialchars($scene['capacite']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
    </div>
    <div>
        <label for="hDebut">Heure Début</label>
        <input type="time" id="hDebut" name="hDebut" value="<?php echo htmlspecialchars($hDebut); ?>">
    </div>
    <div>
        <label for="hFin">Heure Fin</label>
        <input type="time" id="hFin" name="hFin" value="<?php echo htmlspecialchars($hFin); ?>">
    </div>
    <button type="submit">Modifier</button>
</form>