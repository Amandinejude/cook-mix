<?php  

namespace Model;

class IngredientsModel extends \W\Model\Model {

//insert ingredient
	public function ajouterIngredient($ingredient){
		$this->setPrimaryKey("in_id");
		//on check si l'ingredient n'est pas déjà présent dans la BDD
		if($this->ingredientExists($ingredient)){
		return 'Cet ingredient a déjà été enregistré !';
		}

		$data = array("in_name" =>$ingredient);
		$this->insert($data); 
		return $this->insert($data); 
	}

//select TOUS les ingredients de telle recipe
	public function selectIngredients($re_id){
		$sql = 	'SELECT * FROM `recipes`, `recipes_has_ingredients` WHERE `recipes_has_ingredients`.recipes_re_id = `recipes`.re_id AND re_id= '.$re_id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch();
	}




}









 ?>