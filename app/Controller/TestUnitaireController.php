<?php 
namespace Controller;

use \W\Controller\Controller;
use Model\CrudModel;

class TestUnitaireController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function accueil()
	{
		$this->show('default/home');
	}

//AJOUT
	//ajout dans la BDD des USERS
		public function user(){
			//créer une nouvelle instance avec 	NEW, on precise le model que l'on 	appel
			$ajout = new CrudModel(); 
	
			//on reprend cette meme variable 	pour preciser la function du model 	dont on a besoin (new / model / 	function, on crée le chemin)
			$ajout->ajouterUser("Sheldon", "	Cooper", "bazinga", "	shelly@bbang.fr"); //parametre à 	ajouter à transformer en $_POST 	apres avoir fait les form
			$this->show('default/home');
		}
	
	//ajout dans la BDD des PLACES
		public function place(){
			
			$ajout = new CrudModel(); 
	
			$ajout->ajouterPlace("BOOM", "	54879564125", "55 rue bim", "	Paris", "11", "http://test.com/",	 "@boomtest", "cheminIse"); 
	
			$this->show('default/home');
		}
	
	//ajout dans la BDD des RECIPES
		public function recipe(){
			
			$ajout = new CrudModel(); 
	
			$ajout->ajouterRecipe("banana bread",	 "cheminImange"); 
	
			$this->show('default/home');
		}
	
	//ajout dans la BDD des INGREDIENTS
		public function ingredient(){
			
			$ajout = new CrudModel(); 
	
			$ajout->ajouterIngredient("peach"); 
	
			$this->show('default/home');
		}
	
	//ajout dans la BDD des STEPS
		public function step(){
			
			$ajout = new CrudModel(); 
	
			$ajout->ajouterStep('shake it', 4); 
	
			$this->show('default/home');
		}
	
	//ajout dans la BDD des favorites
		public function favorite(){
			
			$ajout = new CrudModel(); 
	
			$ajout->ajouterFav(1, 4); 
	
			$this->show('default/home');
		}

//UPDATE	
	//update dans la BDD USERS
		public function upUser(){
	
			$up = new CrudModel(); 
			
			$retour = $up->updateUser(2, "Alice",	 "Wonderland", "secret", "	aa@wonderland.fr");
			print_r($retour);
			die();
			$this->show('default/home'); 
		}
	
	//update dans la BDD PLACE
		public function upPlace(){
	
			$up = new CrudModel(); 
			
			$up->updatePlace(4,"test UPDATE", "	+33 (0)9 51 80 22 33", "55 rue 	Charlot", "Paris", "04", "http://	www.wildandthemoon.com/", "	@wildandthemoon", "cheminImage");
	
			$this->show('default/home'); 
		}
	
	//update dans la BDD RECIPE
		public function upRecipe(){
	
			$up = new CrudModel(); 
			
			$up->updateRecipe(2,"CUPCAKE", "	cheminImange");
	
			$this->show('default/home'); 
		}
	
	//update dans la BDD STEP
		public function upStep(){
	
			$up = new CrudModel(); 
			
			$up->updateStep(6, "updating");
	
			$this->show('default/home'); 
		}
	
//DELETE	
	//delete USER
		public function delUser(){
	
			$del = new CrudModel(); 
			
			$del->deleteUser(0);
	
			$this->show('default/home'); 
		}
	
	//delete FAV
		public function delFav(){
	
			$del = new CrudModel(); 
			
			$del->deleteFav(1, 4);
	
			$this->show('default/home');
		}
	
	//delete PLACE
		public function delPlace(){
	
			$del = new CrudModel(); 
			
			$del->deletePlace(4);
	
			$this->show('default/home');
		}
	
	
	//delete STEP
		public function delStep(){
	
			$del = new CrudModel(); 
			
			$del->deleteStep(6);
	
			$this->show('default/home');
		}
	
	
	//delete RECIPE
		public function delRecipe(){
	
			$del = new CrudModel(); 
			
			$del->deleteRecipe(2);
	
			$this->show('default/home');
		}
	
//SELECT	
	//select USER
		public 	function showUser(){
			$select = new CrudModel(); 
			
			$retour = $select->selectUser(1);
			print_r($retour);
			die();
			$this->show('default/home');
		}
	
	//select FAV
		public 	function showFav(){
			$select = new CrudModel(); 
			
			$retour = $select->selectFav(1, 4);
			print_r($retour);
			die();
			$this->show('default/home');
		}
		
	//select 1 PLACE
			public 	function showPlace(){
			$select = new CrudModel(); 
			
			$retour = $select->selectPlace(7);
			print_r($retour);
			die();
			$this->show('default/home');
		}
		
	//select ALL PLACES
			public 	function showPlaces(){
			$select = new CrudModel(); 
			
			$retour = $select->selectPlaces();
			print_r($retour);
			die();
			$this->show('default/home');
		}
		
	//select 1 RECIPE
			public 	function showRecipe(){
			$select = new CrudModel(); 
			
			$retour = $select->selectRecipe(3);
			print_r($retour);
			die();
			$this->show('default/home');
		}
		
	//select ALL RECIPES
			public 	function showRecipes(){
			$select = new CrudModel(); 
			
			$retour = $select->selectRecipes();
			print_r($retour);
			die();
			$this->show('default/home');
		}
		
	//select STEPS
			public 	function showSteps(){
			$select = new CrudModel(); 
			
			$retour = $select->selectSteps(1);
			print_r($retour);
			die();
			$this->show('default/home');
		}
		
	//select INGREDIENT
		public 	function showIngredients(){
			$select = new CrudModel(); 
			
			$retour = $select->selectIngredients(	2);
			print_r($retour);
			die();
			$this->show('default/home');
		}
		
	
	

}

 ?>