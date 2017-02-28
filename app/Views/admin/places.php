<?php 
// OK
//view\places.php

//Page d'accueil du dashbord admin qui affiche l'état de la base de données et qui permet d'ajouter, de modifier ou de supprimer des lieux

require('layouts/top.php');?>

<h2>Places</h2>

<p><a href=<?= $this->url('adminPlacesAdd') ?>>Ajouter un nouveau lieu</a></p>

<div class="well">
    <form>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="<?= $pl_name; ?>" />           

        </div>
        <button type="submit" class="btn btn-default">Recherchez</button>    
    </form>
</div>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Téléphone</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Code Postal</th>
        <th>Site</th>
        <th>Instagram</th>
        <th>Images</th>
    </tr>

    <?php foreach ($places as $place) { ?>
 
     <tr>
        <td><?php echo $place['pl_id'];?></td>
        <td><?php echo $place['pl_name'];?></td>
        <td><?php echo $place['pl_tel'];?></td>
        <td><?php echo $place['pl_address'];?></td>
        <td><?php echo $place['pl_city'];?></td>
        <td><?php echo $place['pl_district'];?></td>
        <td><?php echo $place['pl_website'];?></td>
        <td><?php echo $place['pl_instagram'];?></td>
        <td><?php echo $place['pl_picture'];?></td>


        <td><a href=<?= $this->url('adminPlacesEdit', ["id" => $place['pl_id']]) ?>>Modifier</a></td>

        <td><a href=<?= $this->url('adminPlacesDelete', ["id" => $place['pl_id']]) ?>>Supprimer</a></td>
    </tr>

    <?php } ?>


<?php require('layouts/bottom.php'); ?>