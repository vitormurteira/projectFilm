
<!doctype html>

<html>
  <head>
    <style>

      body{
        background-color: #cccccc;
      }

      h3{
        margin-right: 15rem;
        margin-left: 15rem;
        text-align: center;
        color:  #6495ED;
      }

      #Search{
        width: 100%;
      }

      #Searchblank{
        width: 100rem;
        height: 10rem;
      }

      #Searchbutton{
         height: 10rem;
         width: 10rem;
      }

      .grandeListe{
        display: inline;
        margin-left: 5rem;
        text-decoration: none;
      }

      .petiteList{
        display: inline-block;
        text-decoration: none;
        margin-left: 5rem;
        margin-bottom: 15rem;
      }

      .Affiche{
        border: 2px solid red; 
        padding: 5rem;
      }

      .deco{
        text-decoration: none;
      }

    </style>
  </head>
  <body>


    <!-- texte -->
    <h3>Eodem tempore etiam Hymetii praeclarae indolis viri negotium est
    actitatum, cuius hunc novimus esse textum. cum Africam pro consule
    regeret Carthaginiensibus victus inopia iam lassatis, ex horreis
    Romano populo destinatis frumentum dedit, pauloque postea cum
    provenisset segetum copia, integre sine ulla restituit mora.</h3>

    <!--ajout d'un questionnaire de recherche-->

    <form action="list.php" id="Search" class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" id="Searchblank" name="s" class="form-control" placeholder="Recherche">
        </div>
      <button type="submit" id="Searchbutton" class="btn btn-default">OK</button>
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

    <ul class="grandeListe">
      <?php foreach ($lastMovies as $movie) : ?>
        <li class="petiteList">
          <ul class="deco">
            <li class="Affiche"><?= $movie['movies_affiche_url'] ?></li>
            <li class="Titre"><?= $movie['movies_title'] ?></li>
          </ul>
        </li>
      <?php endforeach; ?>
    </ul>

  </body>
</html>