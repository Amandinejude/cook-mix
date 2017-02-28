<?php 

	//include le top
	require('/top.php');

	if(isset($user)): ?>
	
			      	<form method="post" enctype="multipart/form-data" >
			      	    

			      	    <label>Email</label> <br>
			      	    <input type="firstname" name="firstname" placeholder="votre prénom" value=<?= (isset($user))?$user['us_firstname']:"" ?> ><br>

						<input type="name" name="name" placeholder="votre nom" value=<?= (isset($user))?$user['us_name']:"" ?> ><br>

                        <input type="email" name="email" placeholder="votre nouvel email" value=<?= (isset($user))?$user['us_email']:"" ?> ><br>

                        <label>Mot de passe</label><br>
                        <input type="password" name="pwd" placeholder="Votre nouveau mot de passe" value=<?= (isset($user))?$user['us_password']:"" ?> ><br>

                         <input type="submit" name="upUser" value="Enregistrer">
			        </form>



<?php 
	//include le footer
	require('/footer.php');
 ?>

