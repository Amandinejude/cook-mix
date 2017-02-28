<?php  
 
namespace Controller;

use \W\Controller\Controller;
use Model\FavoritesModel;

class FavoritesController extends Controller{

//ajout dans la BDD des favorites
	public function favorite(){
		
		$ajout = new FavoritesModel(); 
	
		$ajout->ajouterFav(12, 50); 
	
		$this->show('default/home');
	}

//select FAV
	public 	function showFav(){
		$select = new FavoritesModel(); 
		
		$retour = $select->selectFav($_SESSION['user']['us_id']);
		if(isset($_GET["callback"]))
		$this->showJson($retour);
			//$this->show('default/home');
	}

//delete FAV
	public function delFav(){
	
		$del = new FavoritesModel(); 
		
		$del->deleteFav(1, 9);
	
		$this->show('default/home');
	}
}

?>