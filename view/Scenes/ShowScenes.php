<h1>Liste des scènes</h1>
<a href="index.php?page=scenes&action=add" class="btn btn-success">Ajouter</a>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Capacité</th>
        <th>Emplacement</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php foreach ($scenes as $scene) {
        $id = $scene["idScene"];
        $nomScene = $scene["nomScene"];
        $capacite = $scene["capacite"];
        $emplacement = $scene["emplacement"];
        echo ("<tr><td>" . $id . "</td><td>" . $nomScene . "</td><td>" . $capacite . "</td><td>" . $emplacement . "</td><td>" . "<a href='index.php?page=scenes&action=modify&id=" . $id . "' class='btn btn-warning'>Modifier</a></td><td>" . "<a href='index.php?page=scenes&action=delete&id=" . $id . "' class='btn btn-danger'>Supprimer</a></td></tr>");
    } ?>
</table>