<?php
 
namespace Model;


class CrudModel extends \W\Model\UsersModel { 
//INSERT

	public function ajouterUser($name, $firstname, $pwd, $email){
		//on precise la table où on intervient
		$this->setTable("users");
		//on check si le mail n'est pas déjà présent dans la BDD
		if($this->emailExists($email)){
			return 'Cet email a déjà été enregistré !';
		}
		$data = array("us_name" =>$name, "us_firstname" =>$firstname, "us_password" =>$pwd, "us_email" =>$email); 
		return $this->insert($data); 
	}
	
	public function ajouterPlace($place, $tel, $address, $city, $district, $website, $instagram, $pic){
		//on precise la table où on intervient
		$this->setTable("places");

		//on check si le lieu n'est pas déjà présent dans la BDD
		if($this->placeExists($place)){
		return 'Cet endroit a déjà été enregistré !';
		}

		$data = array("pl_name" =>$place, "pl_tel" =>$tel, "pl_address" =>$address, "pl_city" =>$city, "pl_district" =>$district, "pl_website" =>$website, "pl_instagram" =>$instagram, "pl_picture" =>$pic); 
		$this->insert($data);
		return $this."bien enregistré";
	}

	public function ajouterRecipe($recipe, $pic){
		//on precise la table où on intervient
		$this->setTable("recipes");

		//on check si la recette n'est pas déjà présent dans la BDD
		if($this->recipeExists($recipe)){
		return 'Cet endroit a déjà été enregistré !';
		}

		$data = array("re_name" =>$recipe, "re_picture" =>$pic); 
		$this->insert($data); 
		return "bien enregistré";
	}

	public function ajouterIngredient($ingredient){
		//on precise la table où on intervient
		$this->setTable("ingredients");

		//on check si l'ingredient n'est pas déjà présent dans la BDD
		if($this->ingredientExists($ingredient)){
		return 'Cet ingredient a déjà été enregistré !';
		}

		$data = array("in_name" =>$ingredient);
		$this->insert($data); 
		return "bien enregistré";
	}

	public function ajouterStep($description, $recipe){
		//on precise la table où on intervient
		$this->setTable("steps");

		$data = array("st_description" =>$description, "recipes_re_id" =>$recipe);
		$this->insert($data); 
		return "bien enregistré";
	}

	public function ajouterFav($user, $place){
		//on precise la table où on intervient
		$this->setTable("favorites");

		$data = array("users_us_id" =>$user, "places_pl_id" =>$place);
		$this->insert($data);
		return "favoris enregistré";
	}


//SELECT

	//avec un FIND need $id, si FINDALL aucun parametre

	//un user precis
	public function selectUser($id){
		$this->setTable("users");
		$this->setPrimaryKey("us_id");

		return $this->find($id);
	}

	//TOUS les favoris de tel user
	public function selectFav(){
		$this->setTable("favorites");


		$data = array("places_pl_id" =>$place, "users_us_id" =>$user);
		return $this->findAll($data);
	}

	//TOUS les ingredients de telle recipe
	public function selectIngredients(){
		$this->setTable("ingredients");
		$this->setPrimaryKey("in_id");

		return $this->findAll();
	}

	//TOUS les lieux à afficher pour telle recipe
	public function selectPlaces(){
		$this->setTable("places");
		$this->setPrimaryKey("pl_id");

		return $this->findAll();
	}

	//UN SEUL lieu précis
	public function selectPlace($id){
		$this->setTable("places");
		$this->setPrimaryKey("pl_id");

		return $this->find($id);
	}

	//TOUTES les steps d'une telle recipe
	public function selectSteps(){
		$this->setTable("steps");
		$this->setPrimaryKey("st_id");

		return $this->findAll(); 
	}
		
	//TOUTES les recipes de la database
	public function selectRecipes(){
		$this->setTable("recipes");
		$this->setPrimaryKey("re_id");
 
		return $this->findAll(); 
	}

	//UNE recette precise 
	public function selectRecipe($id){
		$this->setTable("recipes");
		$this->setPrimaryKey("re_id");

		return $this->find($id); 
	}


//UPDATE

	// Le premier argument est un tableau associatif de valeurs à insérer (ici mis en variable $data)
	// Le second est l'identifiant de la ligne à modifier

	//update user
	public function updateUser($id, $name, $firstname, $pwd, $email){
		//on definie la table dans laquelle on intervient et la primaryKey
		$this->setTable("users");
		$this->setPrimaryKey("us_id");
		$data = array("us_id" =>$id, "us_name" =>$name, "us_firstname" =>$firstname, "us_password" =>$pwd, "us_email" =>$email); 
		return $this->update($data, $id); 
	}


	//update place
	public function updatePlace($id, $place, $tel, $address, $city, $district, $website, $instagram, $pic){

		$this->setTable("places");
		$this->setPrimaryKey("pl_id");
		$data = array("pl_id" =>$id, "pl_name" =>$place, "pl_tel" =>$tel, "pl_address" =>$address, "pl_city" =>$city, "pl_district" =>$district, "pl_website" =>$website, "pl_instagram" =>$instagram, "pl_picture" =>$pic); 
		return $this->update($data, $id);
	}


	//update recipe
	public function updateRecipe($id, $recipe, $pic){

		$this->setTable("recipes");
		$this->setPrimaryKey("re_id");
		$data = array("re_id" =>$id, "re_name" =>$recipe, "re_picture" =>$pic); 
		return $this->update($data, $id); 
	}


	//update step
	public function updateStep($id, $description){

		$this->setTable("steps");
		$this->setPrimaryKey("st_id");
		$data = array("st_id" =>$id, "st_description" =>$description);
		return $this->update($data, $id); 
	}


//DELETE 

	//les foreign key doivent etre en CASCADE pour que l'action fonctionne (delete de la place -> cascade -> delete impacté sur les favoris et toutes les associations avec la place supprimée)

	//delete user
	public function deleteUser($id){

		$this->setTable("users");
		$this->setPrimaryKey("us_id");
		$data = array("active" => 0); 
		//ce delete est un UPDATE car on ne doit pas supprimer un user, mais le passer en inactif
		return $this->update($data, $id);
	}

	//delete fav
	public function deleteFav($user, $place){

		$this->setTable("favorites");
		$this->setPrimaryKey("users_us_id");
		$data = array("users_us_id" =>$user, "places_pl_id" =>$place);
		return $this->delete($data);
	}

	//delete place
	public function deletePlace($id){

		$this->setTable("places");
		$this->setPrimaryKey("pl_id");
		return $this->delete($id);
	}

	//delete step
	public function deleteStep($id){

		$this->setTable("steps");
		$this->setPrimaryKey("st_id");
		return $this->delete($id); 
	}

	//delete recipe
	public function deleteRecipe($id){

		$this->setTable("recipes");
		$this->setPrimaryKey("re_id");
		return $this->delete($id); 
	}
}


 ?>