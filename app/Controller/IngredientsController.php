<?php 

namespace Controller;

use \W\Controller\Controller;
use Model\IngredientsModel;

class IngredientsController extends Controller{

//ajout INGREDIENTS
	public function ingredient(){
		
		$ajout = new IngredientsModel(); 

		$ajout->ajouterIngredient("myrtille")
		//($_POST['ingredients'])
		; 

		$this->show('default/home');
	}


//select INGREDIENT
	public 	function showIngredients(){
		$select = new IngredientsModel(); 
		
		$retour = $select->selectIngredients(3);
		print_r($retour);
		die();
		$this->show('default/home');
	}



}

?>