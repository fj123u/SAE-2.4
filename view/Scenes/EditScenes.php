<h1>Modifier la scène</h1>
<?php foreach ($scenes as $scene)
{
    if ($scene["idScene"] == $id)
    {
        $nomScene = $scene["nomScene"];
        $capacite = $scene["capacite"];
        $emplacement = $scene["emplacement"];
    }
}?>

<form method="post" action="index.php?page=scenes&action=update">
    <input type="hidden" name="idScene" value="<?php echo $id; ?>">
    <div>
        <label for="nomScene">Nom de la scène</label>
        <input type="text" id="nomScene" name="nomScene" value="<?php echo htmlspecialchars($nomScene); ?>" required>
    </div>
    <div>
        <label for="capacite">Capacité</label>
        <input type="number" id="capacite" name="capacite" min="1" value="<?php echo htmlspecialchars($capacite); ?>" required>
    </div>
    <div>
        <label for="emplacement">Emplacement</label>
        <input type="text" id="emplacement" name="emplacement" value="<?php echo htmlspecialchars($emplacement); ?>" required>
    </div>
    <button type="submit">Modifier</button>
</form>