<?php 
//view\places.php


//Page d'accueil du dashbord admin qui affiche l'état de la  base de données et qui permet d'ajouter, de modifier ou de supprimer des recettes OK OK

require('layouts/top.php');
 ?>
 
<h2>Recipes</h2>

<p><a href=<?= $this->url('adminRecipesAdd') ?>>Ajouter une nouveau recette</a></p>
<div class="well">
    <form>
        <div class="form-group">
            <label>Nom</label>
                
            <input type="text" name="nom" class="form-control" value="<?= $re_name; ?>" />           


        </div>
        <button type="submit" class="btn btn-default">Recherchez</button>    
    </form>
</div>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Picture</th>
        <th>Option</th>
    </tr>

    <?php foreach ($recipes as $recipe) { ?>
 
     <tr>
        <td><?= $recipe['re_id'];?></td>
        <td><?= $recipe['re_name'];?></td>
        <td><img src=<?= $this->assetUrl($recipe['re_picture']);?> alt="image" height="50" width="50"></td>
        
        <td>
            <a style="margin-right:5%" href=<?= $this->url('adminRecipesEdit', ["id" => $recipe['re_id']]) ?>>Modifier</a>
            <a href=<?= $this->url('adminRecipesDelete', ["id" => $recipe['re_id']]) ?>>Supprimer</a>
        </td>
    </tr>

  <?php } ?>
 

<?php require('layouts/bottom.php'); ?>
