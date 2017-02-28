<?php 
//page servant à ajouter un nouveau lieu + modifier un lieu existant (form addplaces) OK

//view\abonne-edit.php
require('layouts/top.php'); ?>
    <h2>Editer un lieu</h2>
  
     <section>
      <div class="container text-center wow fadeIn">
            <div class="row content-row">
                <div class="col-lg-12">
                 

                    <form method="post" enctype="multipart/form-data" >

                        <label>Place Name</label> <br>
                        <input type="text" name="place" placeholder="Enter the place name here" value=<?= (isset($place))?$place['pl_name']:"" ?> ><br>

                        <label>Place Téléphone</label> <br>
                        <input type="text" name="tel" placeholder="Enter the place name here" value=<?= (isset($place))?$place['pl_tel']:"" ?> ><br>

                        <label>Place Adress</label><br>
                        <input type="text" name="address" placeholder="Enter the place address here" value=<?= (isset($place))?$place['pl_address']:"" ?> ><br>

                      
                        <label>City</label><br>
                        <input type="text" name="city" placeholder="Enter the city" value=<?= (isset($place))?$place['pl_city']:"" ?> ><br>

                        <label>District</label><br>
                        <input type="text" name="district" placeholder="Enter the district" value=<?= (isset($place))?$place['pl_district']:"" ?> ><br>

                        <label>Website</label><br>
                        <input type="text" name="website" placeholder="Enter the website" value=<?= (isset($place))?$place['pl_website']:"" ?> ><br>
                        
                        <label>Instagram</label><br>
                        <input type="text" name="instagram" placeholder="Enter the instagram" value=<?= (isset($place))?$place['pl_instagram']:"" ?> ><br>

                        <label>Picture</label><br>
                        <input type="file" name="pic" src=<?= (isset($place))?$place['pl_picture']:"" ?> accept="image/*"" width=""  ><br>

                        <input type="submit" name="addPlace" value="Enregistrer">
            
                    </form>
                  
                </div>
            </div>
            
    </section>

   
    
<?php require('layouts/bottom.php'); ?>
