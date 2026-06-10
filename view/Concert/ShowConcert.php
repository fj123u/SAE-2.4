<h1>Planning des concerts</h1>
<a href="index.php?page=concerts&action=add" class="btn btn-success">Ajouter</a>
<table>
    <tr>
        <th>Id</th>
        <th>Artiste</th>
        <th>Scene</th>
        <th>Date</th>
        <th>Heure Début</th>
        <th>Heure Fin</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php foreach ($concerts as $concert) {
        $artiste = getNameArtiste($pdo, $concert["idArtiste"])["nom"];
        $scene = getNameScene($pdo, $concert["idScene"])["nomScene"];
        $date = $concert["date"];
        $id = $concert["idConcert"];
        $hDebut = $concert["heureDebut"];
        $hFin = $concert["heureFin"];
        echo ("<tr><th>" . $id . "</th><th>" . $artiste . "</th><th>" . $scene . "</th><th>" . $date . "</th><th>" . $hDebut . "</th><th>" . $hFin . "</th><th>" . "<a href='index.php?page=concerts&action=modify&id=" . $id . "'>Modifier</a></th><th>" . "<a href='index.php?page=concerts&action=delete&id=" . $id . "'>Supprimer</a></th></tr>");
    } ?>
</table>