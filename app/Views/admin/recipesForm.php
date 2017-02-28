<?php 
//page servant à ajouter une nouvelle recette  + modifier la recette  existante (form addrecipes)

require('layouts/top.php'); ?>

    <h2>Editer une recette</h2>


    <section>
      	<div class="container text-center wow fadeIn">
        	<div class="row content-row">
           		<div class="col-lg-12">
      			<!-- ISSET -> quand on va dans modifier => on affiche 4 boutons submit des forms (autrement on en affiche qu'un pour add) -->
			<?php if(isset($step)): ?>
			      	<form method="post" enctype="multipart/form-data" >
			      	    <h3>Nom et photos</h3>

			      	    <label>Recipe Name</label> <br>
			      	    <input type="text" name="recipe" placeholder="Enter the recipe name here" value=<?= (isset($recipe))?$recipe['re_name']:"" ?> ><br>

			      	    <label>Recipe Picture</label> <br>
			            <input type="file" name="pictureRecipe" src=<?= (isset($recipe))?$recipe['re_picture']:"" ?> accept="image/*"" width=""  ><br>

			            <input type="submit" name="addRecipePart1" value="Enregistrer">
			           
			        </form>

			        <!-- Form modification Ingrédients -->

			        <h3>Ingrédients</h3>
			        
			        <form method="post">
			        	<label>Ingredients Name</label> <br>

			        	<input type="hidden" name="idstep1" value="<?= $step[0]['st_id']; ?>"/>
			        	

			        	<textarea row="1000" cols="1000" name="step1" placeholder="Enter the first step of the recipe here"><?= $step[0]['st_description'];?></textarea> <br>
			            
			            <input type="submit" name="addRecipePart2" value="Enregistrer">

					</form>

			        <form method="post">
			        	<h3>Steps</h3>
			        	<input type="hidden" name="idstep2" value="<?= $step[1]['st_id']; ?>"/>

			        	<label>Step 2</label> <br>
			        	<textarea row="1000" cols="1000" name="step2" placeholder="Enter the second step of the recipe here"><?= $step[1]['st_description'];?></textarea> <br>

			        	<input type="submit" name="addRecipePart3" value="Enregistrer">
	
			        </form>

					<form>
						<h3>Lieux où on peut trouver la recette</h3>

						<select name="whereToFind">
							<?php foreach ($places as $place) { ?>

							<option value="<?=$place['pl_name'];?>"><?=$place['pl_name'];?></option>
							<?php } ?>

						</select>

						<input type="submit" name="addRecipePart4" value="Enregistrer">

					</form>
			<?php else:?>
			      	<form method="post" enctype="multipart/form-data" >
			      	    <h3>Nom et photos</h3>

			      	    <label>Recipe Name</label> <br>
			      	    <input type="text" name="recipe" placeholder="Enter the recipe name here" value=<?= (isset($recipe))?$recipe['re_name']:"" ?> ><br>

			      	    <label>Recipe Picture</label> <br>
			            <input type="file" name="pictureRecipe" src=<?= (isset($recipe))?$recipe['re_picture']:"" ?> accept="image/*"" width=""  ><br>
			        <!-- Form modification Ingrédients -->

			        <h3>Ingrédients</h3>

			        	<label>Ingredients Name</label> <br>

			        	<input type="hidden" name="idstep1" value="<?= $step[0]['st_id']; ?>"/>

			        	<textarea row="1000" cols="1000" name="step1" placeholder="Enter the first step of the recipe here"><?= (isset($step))?$step[0]['st_description']:"";?></textarea> <br>
			            
			        	<h3>Steps</h3>
			        	<input type="hidden" name="idstep2" value="<?= $step[1]['st_id']; ?>"/>

			        	<label>Step 2</label> <br>
			        	<textarea row="1000" cols="1000" name="step2" placeholder="Enter the second step of the recipe here"><?= (isset($step))?$step[0]['st_description']:"";?></textarea> <br>
						<h3>Lieux où on peut trouver la recette</h3>

						<select name="whereToFind">
							<?php foreach ($places as $place) { ?>

							<option value="<?=$place['pl_name'];?>"><?=$place['pl_name'];?></option>
							<?php } ?>

						</select> <br> <br>

						<input type="submit" name="addRecipePart4" value="Enregistrer">

					</form>
		<?php endif;?>
        		</div>
            </div>
    </section>
    
<?php require('layouts/bottom.php'); ?>


