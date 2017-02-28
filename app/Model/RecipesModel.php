<?php  

namespace Model;

class RecipesModel extends \W\Model\Model {


//insert recipe
	public function addRecipe($recipe, $pic){
		
		$this->setPrimaryKey("re_id");
		//on check si la recette n'est pas déjà présent dans la BDD
		if($this->recipeExists($recipe)){ //recipeExists dans W/MODEL
		echo 'Cette recette a déjà été enregistré !';
		}

		$data = array("re_name" =>$recipe, "re_picture" =>$pic); 

		return $this->insert($data); 
	}

		 
//select ALL les recipes de la database
	public function selectRecipes(){

		$this->setPrimaryKey("re_id");
		return $this->findAll(); 
	}

//select 1 recipe precise 
	public function selectRecipe($id){

		$this->setPrimaryKey("re_id");
		return $this->find($id); 
	}

//select toutes les recettes à afficher
	public function selectAllRecipes(){
		$this->setPrimaryKey("re_id");
		return $this->findAll();
	}

//update recipe
	public function updateRecipe($id, $recipe, $pic){

		$this->setPrimaryKey("re_id");
		$data = array("re_name" =>$recipe, "re_picture" =>$pic);
		return $this->update($data, $id); 
	}

//delete recipe
	public function deleteRecipe($id){

		$this->setPrimaryKey("re_id");
		return $this->delete($id); 
	}

//research recipe

	public function searchRecipe($search){
	 	$search =array("re_name"=>$search);
        return $this->search($search);

	}

}


 ?>