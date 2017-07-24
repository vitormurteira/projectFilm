<!-- texte -->
<h3>Eodem tempore etiam Hymetii praeclarae indolis viri negotium est
actitatum, cuius hunc novimus esse textum. cum Africam pro consule
regeret Carthaginiensibus victus inopia iam lassatis, ex horreis
Romano populo destinatis frumentum dedit, pauloque postea cum
provenisset segetum copia, integre sine ulla restituit mora.</h3>

<!--ajout d'un questionnaire de recherche-->

<form action="list.php" class="navbar-form navbar-right">
    <div class="form-group">
      <input type="text" name="s" class="form-control" placeholder="Recherche">
    </div>
  <button type="submit" class="btn btn-default">OK</button>
</form>
<br>

<!--recherche par categorie-->

<ul>
  <?php foreach ($catList as $cat) : ?>
    <li><?= $cat['cats'].' ('.$cat['numMovies'].')' ?></li>
  <?php endforeach; ?>
</ul>
<br>
<!--derniers films-->

<ul>
  <?php foreach ($lastMovies as $movie) : ?>
    <li>
      <ul>
        <li><?= $movie['movies_affiche_url'] ?></li>
        <li><?= $movie['movies_title'] ?></li>
      </ul>
    </li>
  <?php endforeach; ?>
</ul>
