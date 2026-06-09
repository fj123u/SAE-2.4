<?php require __DIR__ . '/header.php'; ?>

<h1>Tableau de bord du Festival</h1>

<div class="stats-grid">
    <div class="stat-card">
        <div class="number"><?= $stats['nbConcerts'] ?></div>
        <div class="label">Concerts programmés</div>
    </div>
    <div class="stat-card">
        <div class="number"><?= $stats['nbArtistes'] ?></div>
        <div class="label">Artistes</div>
    </div>
    <div class="stat-card">
        <div class="number"><?= $stats['nbScenes'] ?></div>
        <div class="label">Scènes</div>
    </div>
    <div class="stat-card">
        <div class="number"><?= $stats['nbBenevoles'] ?></div>
        <div class="label">Bénévoles</div>
    </div>
    <div class="stat-card">
        <div class="number"><?= $stats['nbBillets'] ?></div>
        <div class="label">Billets vendus</div>
    </div>
    <div class="stat-card">
        <div class="number"><?= number_format($stats['chiffreAffaires'], 2, ',', ' ') ?> &euro;</div>
        <div class="label">Chiffre d'affaires</div>
    </div>
</div>

<h2>Concerts par scène</h2>
<table>
    <thead>
        <tr>
            <th>Scène</th>
            <th>Nombre de concerts</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stats['concertsParScene'] as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['nomScene']) ?></td>
            <td><?= $row['nb'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/footer.php'; ?>
