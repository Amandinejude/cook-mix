<?php 
 
namespace Model;


class FavoritesModel extends \W\Model\Model {

//insert Fav
	public function ajouterFav($user, $place){
		$this->setPrimaryKey("users_us_id");
		$data = array("users_us_id" =>$user, "places_pl_id" =>$place);
		
		$this->insert($data);

		return "favoris enregistré";
	}

//select TOUS les favoris de tel user
	public function selectFav($idUser){

		$sql = 'SELECT p.* FROM `favorites` f , `places` p WHERE f.`users_us_id`= :idUser AND places_pl_id=pl_id';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':idUser', $idUser);
		$sth->execute();
		return $sth->fetchAll();
		$search = array("users_us_id"=>$idUser);
		return $this->search($search);


	}


//delete fav
	public function deleteFav($idUser, $idPlace){

		return $this->deleteFavoris($idUser, $idPlace);
	}

}

?> 