<?php
 
namespace Controller;

use \W\Controller\Controller;
use Model\PlacesModel;
use Model\RecipesModel;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home(){   
		$select = new PlacesModel(); 
        // instanciation de la class Recipe model: on a besoin de la fonction selectRecipes
        $selectRecipes = new RecipesModel();

        $retour = $select->selectAllPlaces(); //id de la recette qui correspond
    
        //ok j'arrive à afficher le form avec le select intégrant les recettes
        $this->show('default/home',["places" => $retour]); // Lancement de la pages d'acceuil avec les données de toutes les places
	}


	public function admin(){
		$this->show('admin/index');
	}

}