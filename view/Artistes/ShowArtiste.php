<?php

?>
<html>
<h1>Tous les Artistes</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Style Musical</th>
        <th>Pays d'origine</th>
        <th>Ajouter</th>
        <th>Supprimer</th>
    </tr>
    <?php foreach ($artistes as $artiste) {
        $idArtiste = $artiste["idArtiste"];
        $nom = $artiste["nom"];
        $style = $artiste["styleMusical"];
        $pays = $artiste["pays"];
        echo ("<tr><th>" . $idArtiste . "</th><th>" . $nom . "</th><th>" . $style . "</th><th>" . $pays . "</th><th>" . "<a href='index.php?action=modify&id=" . $idArtiste . "'>Modifier</a></th><th>" . "<a href='index.php?action=delete&id=" . $idArtiste . "'>Supprimer</a></th></tr>");
    } ?>
</table>    
<html>
