<?php  

namespace Model; 

use \W\Security\AuthentificationModel;

class UsersModel extends \W\Model\UsersModel {

//insert user
	public function ajouterUser($name, $firstname, $pwd, $email){
		$this->setPrimaryKey("us_id");
		//on check si le mail n'est pas déjà présent dans la BDD
		if($this->emailExists($email)){
			echo 'Cet email a déjà été enregistré !';
		} //sinon insertion 

		//cryptage mot de passe
		$hash = new AuthentificationModel();
		$pwd = $hash->hashPassword($pwd, CRYPT_BLOWFISH);
	

		$data = array("us_name" =>$name, "us_firstname" =>$firstname, "us_password" =>$pwd, "us_email" =>$email);

		return $this->insert($data); 
	}

//select 1 user precis
	//avec un FIND need param $id
	public function selectUser($id){
		$this->setPrimaryKey("us_id");
		return $this->find($id);
	}

//update user
	public function updateUser($id, $name, $firstname, $pwd, $email){
		$this->setPrimaryKey("us_id");
		$data = array("us_name" =>$name, "us_firstname" =>$firstname, "us_password" =>$pwd, "us_email" =>$email); 
		return $this->update($data, $id); 
	}

//delete user
	public function deleteUser($id){
		$this->setPrimaryKey("us_id");
		$data = array("active" => 0); 
		//ce delete est un UPDATE car on ne doit pas supprimer un user, mais le passer en inactif
		return $this->update($data, $id);
	}

//login user
	public function logUser($pwd, $email){


		$log = new AuthentificationModel();
		$user = $log->isValidLoginInfo($email, $pwd);
		if($user != 0){
			// $user = getUserByUsernameOrEmail($email);
			$log->logUserIn($user);
			$message = [
            	'msg' => 'Vous êtes connecté',
            	'type' => 'success',
            	'user' => $user['us_firstname']
            ];
			return $message;
 		}
 		else{
 			$message = [
            	'msg' => 'Email ou Mot de passe erroné',
            	'type' => 'error'
            ];
			return $message;
 		}	
	}

//logout user
	public function logOut(){
        $auth = new AuthentificationModel;
		$auth->logUserOut();
	}
	
//sign up
	public function signUp($name, $firstname, $pwd, $email) {
		$this->setPrimaryKey("us_id");
		if($this->emailExists($email)){
			$message = [
            	'msg' => 'Email existant. Veuillez en choisir un autre.',
            	'type' => 'error'
            ];
            return $message;
		} //sinon insertion 

		//cryptage mot de passe
		$hash = new AuthentificationModel();
		$pwd = $hash->hashPassword($pwd, CRYPT_BLOWFISH);
	
		$data = [
		"us_name" =>$name, 
		"us_firstname" =>$firstname, 
		"us_password" =>$pwd, 
		"us_email" =>$email,
		'us_type' => 'user'
		];

		 if($this->insert($data)) {
		 	$message = [
            	'msg' => 'vous êtes bien inscrit',
            	'type' => 'success'
            ];
            return $message;
		 }; 

	}

}

 ?>