
<!--dropdown menu-->

<select class="">
  <option>pages</option>
  <?php for ($p=1;$p<=$maxPageNum;$p++) : ?>
    <option value="#?page=<?php echo $p ?>">page <?php echo $p ?></option>
  <?php endfor; ?>
</select>
<br>

<!--list-->

<?php if (isset($movieList) && sizeof($movieList) > 0) : ?>
<?php foreach ($movieList as $currentMovie) : ?>
			<ul>
				<li><?= $currentMovie['movies_affiche_url'] ?></li>
				<li><?= $currentMovie['idmovies'] ?></li>
				<li><?= $currentMovie['movies_title'] ?></li>
				<li><?= $currentMovie['movies_synopsis'] ?></li>
				<li><a href="detail.php?id=<?= $currentMovie['idmovies'] ?>" class="">details</a></li>
				<li><a href="film.php?id=<?= $currentMovie['idmovies'] ?>" class="">modifier</a></li>
			</ul>
<?php endforeach; ?>
<?php else :?>
	aucun film
<?php endif; ?>
<br>

<!--pagination-->

<ul>
  <li>
    <?php if ($page > 1) : ?>
      <a href="list.php?page=<?= ($page-1) ?>" class="">précédent</a>
    <?php endif; ?>
  </li>
  <li>
    Page <?php $page ?>
  </li>
  <li>
      <?php if ($page < $maxPageNum) : ?>
        <a href="list.php?page=<?= ($page+1) ?>" class="">suivant</a>
        <?php endif; ?>
  </li>
</ul>
