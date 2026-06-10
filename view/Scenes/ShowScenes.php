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
        echo ("<tr><th>" . $id . "</th><th>" . $nomScene . "</th><th>" . $capacite . "</th><th>" . $emplacement . "</th><th>" . "<a href='index.php?page=scenes&action=modify&id=" . $id . "'>Modifier</a></th><th>" . "<a href='index.php?page=scenes&action=delete&id=" . $id . "'>Supprimer</a></th></tr>");
    } ?>
</table>