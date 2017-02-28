<?php 
 
namespace Controller;

use \W\Controller\Controller;
use Model\PlacesModel;
use Model\RecipesModel;

class PlacesController extends Controller{

//ajout PLACE OK +> A MODIFIER EN FONCTION DE LA CONNEXION POUR LE USER ID
	public function addPlace(){
		//$this->allowTo('admin'); pour toutes les méthodes qui nécessitent des privilèges d'admin
		$this->allowTo('admin');
		if(!empty($_POST)){
			$ajout = new  placesModel(); 
			$_POST['pic'] = $this->movePicture();
			$ajout->ajouterPlace($_POST["place"], $_POST['tel'], $_POST['address'], $_POST['city'], $_POST['website'], $_POST['instagram'], $_POST['pic'],  $_POST['district'], 1); 
			$this->redirectToRoute('adminPlace');
		}
		$this->show('admin/placesForm');
	}

//update PLACE OK
	public function upPlace($id){
		//$this->allowTo('admin'); pour toutes les méthodes qui nécessitent des privilèges d'admin
		$this->allowTo('admin');
		$select = new PlacesModel(); // Instanciation de la class PlacesModel
		
 
		if(!empty($_POST)){
			$_POST['pic'] = $this->movePicture();
			$select->updatePlace($id, $_POST["place"], $_POST['tel'], $_POST['address'], $_POST['city'], $_POST['district'], $_POST['website'], $_POST['instagram'], $_POST['pic']);	
			$place = $select->selectPlace($id); // Renvoie les données de la place - paramètre id de la place
			echo "Place modifiée";
		}else{
			$place = $select->selectPlace($id); // Renvoie les données de la place - paramètre id de la place	 
		}
		$this->show('admin/placesForm',["place" => $place]);  

	}


//delete PLACE  OK

	public function delPlace($id){
		//$this->allowTo('admin'); pour toutes les méthodes qui nécessitent des privilèges d'admin
		$this->allowTo('admin');
		$del = new PlacesModel(); // Instanciation de la class PlacesModel

		$del->deletePlace($id);

		// Redirection vers la route AdminPlace
		$this->redirectToRoute('adminPlace');
	}


//select 1 PLACE
	public 	function showPlace(){
	$select = new PlacesModel(); 
	
	$retour = $select->selectPlace(29);
	$this->show('default/home');
	}


//select 1 PLACE
	public 	function showAllPlacesByRecette(){
		$select = new PlacesModel(); 
		
		$retour = $select->selectPlace(29);
		$this->show('default/home');
	}


//select ALL PLACES en fonction de la recipe 
    public function showPlaces(){
        $select = new PlacesModel(); 
		if(!empty($_GET)){
			$pl_name = $_GET["nom"];
			$retour = $select->selectAllPlacesByName($pl_name);
			if(isset($_GET["callback"]))
				$this->showJson($retour);
		}
        // instanciation de la class Recipe model: on a besoin de la fonction selectRecipes
        $selectRecipes = new RecipesModel();

        $retour = $select->selectPlaces($id); //id de la recette qui correspond
    
        $recipes = $selectRecipes->selectRecipes($id);
        $this->show('default/home',["places" => $retour, "recipes" => $recipes]);  
        //ok j'arrive à afficher le form avec le select intégrant les recettes
    }
	
//select ALL PLACES pour la partie admin pour pouvoir les modifier OK OK
	public 	function showAllPlaces(){
		$select = new PlacesModel(); 
		if(!empty($_GET)){
			$pl_name = $_GET["nom"];
			$retour = $select->searchPlace($pl_name);
			if(isset($_GET["callback"]))
				$this->showJson($retour);
		}else{
			$retour = $select->selectAllPlaces(); 
			$pl_name = "";
		}
		$this->show('admin/places', ["places" => $retour, "pl_name"=>$pl_name]);
	}
	

//ajout de la fonction correspondant à l'ajout d'image dans la base de données OK OK 
	public 	function movePicture(){
		$this->allowTo('admin');
		if($_FILES['pic']['size'] > 0) {
			//il stocké dans les dossiers temporaires, le temps de la session d'utilisateur (max 30 minutes après la dernière action) ou le temps de la durée d'exécution du script
			//on va le stocker dans une variable //pas le droit d'utiliser un chemin absolu comme une URL. 
			$dir = 'assets/upload';// => pour l'upload uniquement dans MA BITE
			
			//je vérifie que le dossier de destination existe 
			if (file_exists($dir) && is_dir($dir)) {
				// timestamp => timestamp converter
				//.trouver la bonne extension du fichier : .l'extensiondufichierd'origine qui va être dans son nom ['name'] (et si name ne fonctionne pas, utiliser tmpname) / on utilise path info pour avoir l'info sur l'extension : 
				// ne pas oublier la concaténation
				$filename = time().".".pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
			
				// je déplace le fchier depuis le dossier temporaire vers la destination choisie en haut ($dir)  
				// if => si ça ne marche pas if(move_uploaded_file(filename (nom du fichier temporaire, destination))
				if(move_uploaded_file($_FILES['pic']['tmp_name'], $dir."/".$filename)) {
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