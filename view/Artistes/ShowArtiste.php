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
        echo ("<tr><td>" . $idArtiste . "</td><td>" . $nom . "</td><td>" . $style . "</td><td>" . $pays . "</td><td>" . "<a href='index.php?page=artistes&action=edit&id=" . $idArtiste . "' class='btn btn-warning'>Modifier</a></td><td>" . "<a href='index.php?page=artistes&action=delete&id=" . $idArtiste . "' class='btn btn-danger'>Supprimer</a></td></tr>");
    } ?>
</table>    
<html>
