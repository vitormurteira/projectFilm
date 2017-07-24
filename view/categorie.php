<!-- titre -->

<div class="panel-group">

  <div class="panel with panel-primary class">

    <div class="panel-heading"><h3>Gestion des categories</h3></div>
    <!-- menu -->
    
      <form action="" enctype="multipart/form-data">
      
       <div class="panel-body">
 
          <select name="categorie" class="">
          <option>Categories</option>
          <?php foreach ($categoryList as $category) : ?>
          
          <option value="<?php echo $category['idmovies_categories'] ?>"><?php echo  $category['movies_categories_name'] ?></option>
            <?php endforeach; ?>
          </select><br><br>
        </div>
     
        <div class="panel-footer">
            <!-- formulaire -->
            <h4>Nouvelle Categorie</h4>
       
            <input type="text" name="newCat" value="" placeholder="categorie"/><br>
            <br>
            <input type="submit" class="btn btn-success"value="Valider"/>
          
        </div>

      </form>
    </div>
  </div>
</div>