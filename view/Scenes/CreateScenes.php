<h1>Ajouter une scène</h1>
<?php if (isset($error)): ?>
    <p style="color: red;">
        <?= htmlspecialchars($error) ?>
    </p>
<?php endif; ?>
<form method="post" action="index.php?page=scenes&action=create">
    <div>
        <label for="nomScene">Nom de la scène</label>
        <input type="text" id="nomScene" name="nomScene" required>
    </div>
    <div>
        <label for="capacite">Capacité</label>
        <input type="number" id="capacite" name="capacite" min="1" required>
    </div>
    <div>
        <label for="emplacement">Emplacement</label>
        <input type="text" id="emplacement" name="emplacement" required>
    </div>
    <button type="submit">Ajouter</button>
</form>