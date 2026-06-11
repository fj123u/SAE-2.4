    <h1>Planning du Festival</h1>
    <table>
    <tr>
        <th>Date du concert</th>
        <th>Artiste</th>
        <th>Scene</th>
        <th>Emplacement</th>
        <th>Style Musical</th>
        <th>Heure Début</th>
        <th>Heure Fin</th>
    </tr>
<?php foreach ($allInfos as $info) {
    $date = $info["date"];
    $nom = $info["nom"];
    $hDebut = $info["heureDebut"];
    $hFin = $info["heureFin"];
    $style = $info["styleMusical"];
    $nomScene = $info["nomScene"];
    $emplacement = $info["emplacement"];
    echo ("<tr><td>" . $date . "</td><td>" . $nom . "</td><td>" . $nomScene . "</td><td>" . $emplacement . "</td><td>" . $style . "</td><td>" . $hDebut . "</td><td>" . $hFin . "</td></tr>");
} ?>
</table>