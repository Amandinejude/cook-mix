<?php 

namespace Controller; 

use \W\Controller\Controller;
use Model\UsersModel;
use \W\Security\AuthentificationModel;
use Model\FavoritesModel;

class UsersController extends Controller{

	/**
	 * Page d'accueil par défaut
	 */
	public function accueil()
	{
		$this->show('default/home');
	}

//ajout USER
	public function user(){
		//créer une nouvelle instance avec 	NEW, on precise le model que l'on appel
		$ajout = new UsersModel(); 
	 
		//on reprend cette meme variable pour preciser la function du model dont on a besoin (new / model / function, on crée le chemin)
		$ajout->ajouterUser($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['email']);
		$this->show('default/home');
	}

//select USER
	public 	function showUser(){
		$select = new FavoritesModel(); 
		
		$retour = $select->selectFav($_SESSION['user']['us_id']);

		$this->show('default/profil',["favorites" => $retour]); 
	}

//update USER
	public function upUser(){
		
	/*
		$up = new UsersModel(); 
		
		$retour = $up->updateUser($id, $_POST['name'], $_POST['firstname'], $_POST['password'], $_POST['email']
			);
*/
		$this->show('default/profilup'); 
	}

//delete USER
	public function delUser(){
	
		$del = new UsersModel(); 
		
		$del->deleteUser(17);
	
		$this->show('default/home'); 
	}



//login USER
	public function login(){
	
		// Traite le cas où le formulaire est vide
		if (trim($_POST['email'])=='' || trim($_POST['password'])==''){
			$message = [
            	'msg' => 'Vous ne pouvez pas envoyé un formulaire vide',
            	'type' => 'error'
            ];
			return $this->showJson($message);
		}	

		// Si les infos sont valides, on connecte l'utilisateur 
			$log = new UsersModel();
			$message = $log->logUser($_POST['password'], $_POST['email']);

			$this->showJson($message);
		// si le login ou MDP sont erronés
	}

	public function register() {

		if (trim($_POST['email'])=='' || trim($_POST['password'])=='' || trim($_POST['name'])=='' || trim($_POST['firstname'])==''){
				$message = [
	            	'msg' => 'Tous les champs sont requis',
	            	'type' => 'error'
	            ];
				return $this->showJson($message);
			}		

		$user = new UsersModel;
		$user->signUp($_POST['name'], $_POST['firstname'], $_POST['password'], $_POST['email']);
		$message = $user->logUser($_POST['password'], $_POST['email']);
		return $this->showJson($message);
	}

//logout Users

	public function logout(){
		$log = new UsersModel();
		$log->logOut();
		$auth= new AuthentificationModel;
		$auth->setFlash('Vous êtes déconnectée', 'success');
		$this->redirectToRoute('default_home');

	}

}

 ?>