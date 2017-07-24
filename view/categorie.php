<!-- titre -->
<h3>Gestion des categories</h3>
<!-- menu -->
<form action="">
  <fieldset>
    <select name="categorie" class="">
      <option>categories</option>
      <?php foreach ($categoryList as $category) : ?>
        <option value="<?php echo $category['idmovies_categories'] ?>"><?php echo $category['movies_categories_name'] ?></option>
      <?php endforeach; ?>
    </select>
    <br><br>
    <!-- formulaire -->
    <h4>Nouvelle Categorie</h4>
    Categorie<br>
    <input type="text" name="newCat" value="" placeholder="categorie"/><br>
    <input type="submit" value="Valider"/>
  </fieldset>
  <br>
</form>
