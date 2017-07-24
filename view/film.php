<!--code html de la page d'ajout de film intitrulé "film"-->

<div class="panel panel-primary">

  	<div class="panel-heading">
	  	<h3 class="panel-title">

			<?php if (!empty($moviesInfos['idmovies'])) : ?>
				modification de <?=$moviesInfos['movies_title'] ?>
			<!--traduction: si l'idmovies du tableau moviesInfo n'est pas vide, alors on modifie la table movies_title de la variable $moviesInfos   -->
			<?php else:?>
			Ajout d'un film
			<?php endif;?>
		</h3>
	</div>

	<div class="panel-body">
		<?php if (!empty($errorList)) : ?>
			<div class="alert alert-danger" role="alert">
				<?php foreach ($errorList as $currentErrorText) : ?>
          <?php echo $currentErrorText ?><br>
				<?php endforeach;?>
			</div>
		<?php endif; ?>

<!--PARTIE HTML DU FORMULAIRE-->

		<form action="" method="post" enctype="multipart/form-data">

	  		<div class="row">

		  		<div class="col-md-6 col-sm-6 col-xs-12"> <!--colonne gauche-->

		<!--maquillage du formulaire suivant l'approche col -->

		<!--1. TITRE DU FILM AJOUTE et auto complete-->

					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="movies_title" value="<?= $moviesInfos['movies_title'] ?>" placeholder="Titre" />
					</div>
          <button type="submit" name="autocomplete">search</button>

<!--la donnée saisie dans "name" doit etre égale à l'index du tableau de recuperation de données saisie dans le fichier view/film.php-->

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
						<select name="idmovies_categories" class="form-control">
						<!--idmovies_categories est l'index de la table "movies_categories" qui contient les valeurs de la table "categories"-->
							<option value="">choisissez</option>
							<?php foreach ($categoryList as $index=>$categoryArray) :?>
								<!--$categoryArray est une nouvelle variable qui permet de lire (ligne par ligne les valeurs associées à l'index "idmovies_categories")
								pour idmovies_categories =1 ; movies_categories-name = Drame;
								pour idmovies_categories =2 ; movies_categories-name = Comedie;
								pour idmovies_categories =3 ; movies_categories-name = SciFi;
								pour idmovies_categories =4 ; movies_categories-name = Horror;-->
								<option value="<?= $categoryArray['idmovies_categories'] ?>"
								<?=$moviesInfos['idmovies_categories'] == $categoryArray['idmovies_categories'] ? ' selected="selected"':'' ?>>
								<?= $categoryArray['movies_categories_name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>

		<!--8. ACTORS DU FILM AJOUTE-->

					<div class="form-group">
						<label>Actors</label>
						<input type="text" class="form-control" name="movies_actors" value="<?= $moviesInfos['movies_actors'] ?>" placeholder="Acteurs" />
					</div>

		<!--9. NATIONALITY DU FILM AJOUTE-->

					<div class="form-group">
						<label>Nationalité</label>
						<select name="idmovies_nationality" class="form-control">
						<!--idmovies_nationality est l'index de la table "movies_nationality" qui contient les valeurs de la table "nationality"-->
							<option value="">choisissez</option>
							<?php foreach ($nationalityList as $index=>$nationality) :?>
								<!--$categoryArray est une nouvelle variable qui permet de lire (ligne par ligne les valeurs associées à l'index "idmovies_nationality")
								pour idmovies_nationality =1 ; movies_nationality-name = francais;
								pour idmovies_nationality =2 ; movies_nationality-name = americaine;
								pour idmovies_nationality =3 ; movies_nationality-name = tchetchenne;
								pour idmovies_nationality =4 ; movies_nationality-name = luxembourgeoise;
								pour idmovies_nationality =4 ; movies_nationality-name = portugaise;-->
								<option value="<?= $nationality['idmovies_nationality'] ?>"
								<?=$moviesInfos['idmovies_nationality'] == $nationality['idmovies_nationality'] ? ' selected="selected"':'' ?>>
								<?= $nationality['movies_nationality_name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>

		<!--10. SUPPORT DU FILM AJOUTE-->

					<div class="form-group">
						<label>Support</label>
						<select name="idmovies_support" class="form-control">
						<!--"idmovies_support" est l'index de la table "movies_support" qui contient en "valeur" l'ensemble des données-->
							<option value="">choisissez</option>
							<?php foreach ($movies_support as $index=>$support_movies) : ?>
								<!--$support_movies est une nouvelle variable qui permet de lire (ligne par ligne les valeurs associées à l'index "idmovies_support")
								pour idmovies_name =1 ; movies_support-name = CD;
								pour idmovies_name =2 ; movies_support-name = DVD;
								pour idmovies_name =3 ; movies_support-name = blu-ray;-->

								<option value=
								"<?= $support_movies['idmovies_support'] ?>"
								<?= $moviesInfos['idmovies_support'] == $support_movies['idmovies_support'] ? ' selected="selected"' : '' ?>>
								<?= $support_movies['movies_support_name'] ?></option>
								<!--
								a. supportList : variable contenant l'ensemble des formats de supports proposés par le "select"
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
