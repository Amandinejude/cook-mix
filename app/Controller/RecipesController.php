<?php  
namespace Controller;
use \W\Controller\Controller;
use Model\RecipesModel;
use Model\StepsModel;
use Model\PlacesModel;

class RecipesController extends Controller{
//ajout RECIPE OK OK OK 
	public function addRecipe(){
		//$this->allowTo('admin'); pour toutes les méthodes qui nécessitent des privilèges d'admin
		//$this->allowTo('admin');
		$addRecipe = new RecipesModel(); 
		$addStep = new StepsModel();
		$addPlace = new PlacesModel();


		if(!empty($_POST)){
			$pictureRecipePath = $this->movePicture();
			$recipe = $addRecipe->addRecipe($_POST['recipe'], $pictureRecipePath);
			$addStep->addStep($_POST['step1'], $recipe["re_id"]);
			$addStep->addStep($_POST['step2'], $recipe["re_id"]);
		}

		$places = $addPlace->selectAllPlaces();

		$this->show('admin/recipesForm',["places" => $places]); 		
}


//update dans la BDD RECIPE OK OK OK OK 
	public function upRecipe($id){
		//$this->allowTo('admin');
		//$this->allowTo('admin'); pour toutes les méthodes qui nécessitent des privilèges d'admin
		//$this->allowTo('admin');
		$upRecipe = new RecipesModel();
		$upStep = new StepsModel();
		// Instanciation de la class PlacesModel parce qu'on a besoin des deux
		$upPlace = new PlacesModel();

		if(!empty($_POST)){
			if (isset($_FILES["pictureRecipe"]) && isset($_POST["recipe"])) {
				$pictureRecipePath = $this->movePicture();
				$upRecipe->updateRecipe($id,$_POST['recipe'], $pictureRecipePath);
				echo'Nom et image ajoutées';
			}if(isset($_POST["step1"])){
				$upStep->updateStep($_POST["idstep1"],$_POST['step1']);
				echo' Etape 1 (ingrédients) ajoutée';
			}if(isset($_POST["step2"])) {
				$upStep->updateStep($_POST['idstep2'],$_POST['step2']);
				echo'Etape 2 ajoutée ';
			}
		}

		$recipe = $upRecipe->selectRecipe($id); // Renvoie les données de la place - paramètre id de la place
		$step = $upStep->selectSteps($id);


		$places = $upPlace->selectAllPlaces();

		$this->show('admin/recipesForm',["recipe" => $recipe, "step" => $step, "places" => $places]); 
	}

//delete RECIPE OK OK

	public function delRecipe($id){
		//$this->allowTo('admin'); pour toutes les méthodes qui nécessitent des privilèges d'admin
		//$this->allowTo('admin');
		$del = new RecipesModel(); 
		
		$del->deleteRecipe($id);
		// Redirection vers la route AdminPlace
		$this->redirectToRoute('adminRecipes');
	}




//select 1 RECIPE
		public 	function showRecipe(){
		$select = new RecipesModel(); 
		
		$retour = $select->selectRecipe(3);
		print_r($retour);
		die();
		$this->show('default/home');
	}
	
//select ALL RECIPES
		public 	function showRecipes(){
		$select = new RecipesModel(); 
		
		$retour = $select->selectRecipes();
		print_r($retour);
		die();
		$this->show('default/home');
	}

	//select ALL recipes pour la partie admin pour pouvoir les modifier OK OK OK
	public 	function showAllRecipes(){
		$select = new RecipesModel();

		if(!empty($_GET)){
			$re_name = $_GET["nom"];
			$retour = $select->searchRecipe($re_name);
			if(isset($_GET["callback"]))
				$this->showJson($retour);
		}else{
			$retour = $select->selectAllRecipes(); 
			$re_name = "";
		}
		$this->show('admin/recipes', ["recipes" => $retour, "re_name"=>$re_name]);
	}


// /ajout de la fonction correspondant à l'ajout d'image dans la base de données OK OK OK
	public 	function movePicture(){
		if($_FILES['pictureRecipe']['size'] > 0) {
			//il stocké dans les dossiers temporaires, le temps de la session d'utilisateur (max 30 minutes après la dernière action) ou le temps de la durée d'exécution du script
			//on va le stocker dans une variable //pas le droit d'utiliser un chemin absolu comme une URL. 
			$dir = 'assets/upload';// => pour l'upload uniquement dans MA BITE
			
			//je vérifie que le dossier de destination existe 
			if (file_exists($dir) && is_dir($dir)) {
				// timestamp => timestamp converter
				//.trouver la bonne extension du fichier : .l'extensiondufichierd'origine qui va être dans son nom ['name'] (et si name ne fonctionne pas, utiliser tmpname) / on utilise path info pour avoir l'info sur l'extension : 
				// ne pas oublier la concaténation
				$filename = time().".".pathinfo($_FILES['pictureRecipe']['name'], PATHINFO_EXTENSION);
			
				// je déplace le fchier depuis le dossier temporaire vers la destination choisie en haut ($dir)  
				// if => si ça ne marche pas if(move_uploaded_file(filename (nom du fichier temporaire, destination))
				if(move_uploaded_file($_FILES['pictureRecipe']['tmp_name'], $dir."/".$filename)) {
					//création de la variable filepath qui est le chemin du dossier à partir de la racine du site
					$filepath = 'upload/'.$filename; 
				}else{
					$filepath = "upload failed";
				}
				return $filepath;
			}
		}
		return false;
	}



}

 ?>
