<?php
//details du film seleccione

if (isset($movieDetail) && sizeof($movieDetail) > 0) : ?>
	<ul>
		<li><?= $movieDetail['movies_affiche_url'] ?></li>
		<li>Sortie en <?= $movieDetail['movies_release_date'] ?></li>
		<li>Support: <?= $movieDetail['movies_support_name'] ?></li>
		<li><?= $movieDetail['movies_title'] ?></li>
		<li><?= $movieDetail['movies_categories_name'] ?></li>
		<li><?= $movieDetail['movies_description'] ?></li>
		<li><?= $movieDetail['movies_actors'] ?></li>
		<li><?= $movieDetail['movies_path'] ?></li>
	</ul>
<?php endif; ?>
