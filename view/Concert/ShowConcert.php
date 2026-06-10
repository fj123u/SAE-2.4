<h1>Planning des concerts</h1>
<<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Annee</th>
        <th>Genre</th>
        <th>Resume</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php foreach ($concerts as $concert) {
        $idArtiste = $concert["idArtiste"];
        $idScene = $concert["idScene"];
        $date = $concert["date"];
        $id = $concert["idConcert"];
        $hDebut = $concert["heureDebut"];
        $hFin = $concert["heureFin"];
        echo ("<tr><th>" . $id . "</th><th>" . $idArtiste . "</th><th>" . $idScene . "</th><th>" . $date . "</th><th>" . $hDebut . "</th><th>" . $hFin . "</th><th>" . "<a href='index.php?action=modify&id=" . $id . "'>Modifier</a></th><th>" . "<a href='index.php?action=delete&id=" . $id . "'>Supprimer</a></th></tr>");
    } ?>
</table>