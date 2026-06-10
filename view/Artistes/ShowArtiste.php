<?php

?>
<html>
<h1>Tous les Artistes</h1>
<a href="index.php?page=artistes&action=create" class="btn btn-success">Ajouter</a>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Style Musical</th>
        <th>Pays d'origine</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php foreach ($artistes as $artiste) {
        $idArtiste = $artiste["idArtiste"];
        $nom = $artiste["nom"];
        $style = $artiste["styleMusical"];
        $pays = $artiste["pays"];
        echo ("<tr><th>" . $idArtiste . "</th><th>" . $nom . "</th><th>" . $style . "</th><th>" . $pays . "</th><th>" . "<a href='index.php?page=artistes&action=edit&id=" . $idArtiste . "'>Modifier</a></th><th>" . "<a href='index.php?page=artistes&action=delete&id=" . $idArtiste . "'>Supprimer</a></th></tr>");
    } ?>
</table>    
<html>
