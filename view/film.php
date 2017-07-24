<!--code html de la page d'ajout de film intitrulé "film"-->

<div class="panel panel-primary">

  	<div class="panel-heading">
	  	<h3 class="panel-title">

			<?php if (!empty($moviesInfos['idmovies'])) : ?>
				modification de <?=$moviesInfos['movies_title'] ?>
			<!--traduction: si l'idmovies du tableau moviesInfo n'est pas vide, alors on modifie la table movies_title de la variable $moviesInfos   ->
			<?php else:?>
			Ajout d'un film
			<?php endif;?>
		</h3>
	</div>

	<div class="panel-body">
		<?php if (!empty($errorList)) : ?>
			<div class="alert alert-danger" role="alert">
				<?php foreach ($errorList as $currentErrorText) : ?>
				<?php endforeach;?>
			</div>	
		<?php endif; ?>

<!---PARTIE HTML DU FORMULAIRE-->

		<form action="" method="post" enctype="multipart/form-data">

	  		<div class="row">

		  		<div class="col-md-6 col-sm-6 col-xs-12"> <!--colonne gauche-->

		<!--maquillage du formulaire suivant l'approche col -->

		<!--1. TITRE DU FILM AJOUTE-->

					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="movies_title" value="<?= $moviesInfos['movies_title'] ?>" placeholder="Titre" />
					</div>

<!--la donnée saisie dans "name" doit etre égale à l'index du tableau de recuperation de données saisie dans le fichier view/film.php

		<!--2. SYNOPSIS DU FILM AJOUTE-->

					<div class="form-group">
						<label>Synopsis</label>
						<input type="text" class="form-control" name="movies_synopsis" value="<?= $moviesInfos['movies_synopsis'] ?>" placeholder="Synopsis" />
					</div>

		<!--3. AFFICHE DU FILM AJOUTE-->

					<div class="form-group">
						<label>Affiche</label>
						<input type="text" class="form-control" name="movies_affiche_url" value="<?= $moviesInfos['movies_affiche_url'] ?>" placeholder="Affiche" />
					</div>

		<!--4. DATE DE SORTIE / RELEASE DATE DU FILM AJOUTE-->

					<div class="form-group">
						<label>Date de sortie</label>
						<input type="text" class="form-control" name="movies_release_date" value="<?= $moviesInfos['movies_release_date'] ?>" placeholder="Date de sortie" />
					</div>

		<!--5. DATE DE SAISIE / REGISTERY DATE DU FILM AJOUTE-->

					<div class="form-group">
						<label>Date de saisie</label>
						<input type="text" class="form-control" name="movies_registery_date" value="<?= $moviesInfos['movies_registery_date'] ?>" placeholder="Date de sortie" />
					</div>

				</div>


				<div class="col-md-6 col-sm-6 col-xs-12"><!--colonne droite-->


		<!--6. DESCRIPTION DU FILM AJOUTE-->

					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" name="movies_description" value="<?= $moviesInfos['movies_description'] ?>" placeholder="Description" />
					</div>

		<!--7. CATEGORIE DU FILM AJOUTE-->

					<div class="form-group">
						<label>Categorie</label>
						<input type="text" class="form-control" name="idmovies_categories" value="<?= $moviesInfos['idmovies_categories'] ?>" placeholder="Categorie" />
					</div>

		<!--8. ACTORS DU FILM AJOUTE-->

					<div class="form-group">
						<label>Actors</label>
						<input type="text" class="form-control" name="movies_actors" value="<?= $moviesInfos['movies_actors'] ?>" placeholder="Acteurs" />
					</div>

		<!--9. NATIONALITY DU FILM AJOUTE-->

					<div class="form-group">
						<label>Nationalité</label>
						<input type="text" class="form-control" name="idmovies_nationality" value="<?= $moviesInfos['idmovies_nationality'] ?>" placeholder="Nationalité" />
					</div>

		<!--10. SUPPORT DU FILM AJOUTE-->

					<div class="form-group">
						<label>Support</label>
						<select name="idmovies_support" class="form-control">
							<option value="">choisissez</option>
							<?php foreach ($supportList as $idmovies_support=>$movies_support) : ?>
								<option value="<?= $movies_support['idmovies_support'] ?>"<?= $moviesInfos['idmovies_support'] == $movies_support['idmovies_support'] ? ' selected=selected"' : '' ?>><?= $movies_support['movies_support_name'] ?></option>
								<!--
								a. supportList : variable contenant l'ensemble des formats de supportrs proposés par le select
								b. $idmovies_support : index du tableau movies_support compilant les noms de support
								c. $movies_support_name : champ de nom de support pour les formats de films
								d. $moviesInfos['idmovies_support']: colonne de la table "movies" permettant une jointure avec la table de support-->


							<?php endforeach; ?>
						</select>
					</div>

<!--la donnée saisie dans "name" doit etre égale à l'index du tableau de recuperation de données saisie dans le fichier view/film.php-->

		<!--11. CHEMIN DU FILM AJOUTE-->

					<div class="form-group">
						<label>Chemin</label>
						<input type="text" class="form-control" name="movies_path" value="<?= $moviesInfos['movies_path'] ?>" placeholder="Chemin" />
					</div>



				</div>

			</div>

		<!--RECONCILIER MODIFICATION ET AJOUT-->

			<?php if (!empty($moviesInfos['idmovies'])) : ?>
				<input type="submit" class="btn btn-success btn-block" value="Modifier" />
	    	<?php else : ?>
				<input type="submit" class="btn btn-success btn-block" value="Ajouter" />
			<?php endif; ?>

		</form>
  	</div>
</div>


<!--definition de variable 

$currentPage -> utilisé dans header -> définit dans le fichier config.php
$moviesInfo -> utilisé dans view/film.php -> définit dans le fichier public/film.php 
$errorList -> utilisé dans view/php.php -> définit dans le fichier view/php.php
$currentErrorText -> utilisé dans le fichier view/php.php -> définit dans le fichier view/php.php

-->