<?php foreach ($artistes as $artiste)
{
    if ($artiste["idArtiste"] == $id)
    {
        $nom = $artiste["nom"];
        $style = $artiste["styleMusical"];
        $pays = $artiste["pays"];
    }
}?>

<html>
<form method="post" action="index.php?page=artistes&action=modify">
      <input type="hidden" name="idArtiste" value="<?php echo $id; ?>">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
</br>
      <label for="nom">Style Musical</label>
      <input type="text" id="style" name="style" value="<?php echo htmlspecialchars($style); ?>" required>
</br>
      <label for="nom">Pays</label>
      <input type="text" id="pays" name="pays" value="<?php echo htmlspecialchars($pays); ?>" required>
      <button type="submit">Envoyer</button>
   </form>
</html>
