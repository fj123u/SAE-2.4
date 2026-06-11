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
    $style = $nfo["styleMusical"];
    $nomScene = $info["nomScene"];
    $emplacement = $info["emplacement"];
    echo ("<tr><th>" . $date . "</th><th>" . $nom . "</th><th>" . $nomScene . "</th><th>" . $emplacement . "</th><th>" . $style . "</th><th>" . $hDebut . "</th><th>" . $hFin);
} ?>