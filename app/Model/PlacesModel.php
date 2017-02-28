<?php 

namespace Model;


class PlacesModel extends \W\Model\Model {

//insert place
	public function ajouterPlace($place, $tel, $address, $city, $district, $website, $instagram, $pic, $user){
		$this->setPrimaryKey("pl_id");

		//on check si le lieu n'est pas déjà présent dans la BDD
		if($this->placeExists($place)){
		echo 'Cet endroit a déjà été enregistré !';
		}

		$data = array("pl_name" =>$place, "pl_tel" =>$tel, "pl_address" =>$address, "pl_city" =>$city, "pl_district" =>$district, "pl_website" =>$website, "pl_instagram" =>$instagram, "pl_picture" =>$pic, "users_us_id" =>$user); 

		return $this->insert($data); 
		echo 'bien enregistré !';
	}

//select des lieux à afficher pour telle recipe
	public function selectPlaces($re_id){
			
		    $sql = 'SELECT * FROM `places`, `places_has_recipes` WHERE `places_has_recipes`.`places_pl_id` = `places`.pl_id AND recipes_re_id = :id';
        $sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $re_id);
		$sth->execute();

		return $sth->fetchAll();
            $search =array("recipes_re_id"=>$re_id);
			
        return $this->search($search);
	}

//select des lieux à afficher pour telle recipe
	public function selectAllPlacesByName($name){
			
		    $sql = 'SELECT * FROM `places`, `places_has_recipes`, recipes WHERE `places_has_recipes`.`places_pl_id` = `places`.pl_id AND `places_has_recipes`.`recipes_re_id` = `recipes`.`re_id` AND `recipes`.`re_name` LIKE "%'.$name.'%"';
        $sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

//select 1 lieu précis à afficher
	public function selectPlace($id){
		$this->setPrimaryKey("pl_id");
		return $this->find($id);
	}

//select tous les lieux à afficher
	public function selectAllPlaces(){
		$this->setPrimaryKey("pl_id");
		return $this->findAll();
	}

//update place
	public function updatePlace($id, $place, $tel, $address, $city, $district, $website, $instagram, $pic){
		$this->setPrimaryKey("pl_id");
		$data = array("pl_name" =>$place, "pl_tel" =>$tel, "pl_address" =>$address, "pl_city" =>$city, "pl_district" =>$district, "pl_website" =>$website, "pl_instagram" =>$instagram, "pl_picture" =>$pic); 

		return $this->update($data, $id);
	}

//delete place 
	public function deletePlace($id){
		$this->setPrimaryKey("pl_id");
		return $this->delete($id);
	}

//research place

	public function searchPlace($search){
	 	$search =array("pl_name"=>$search);
        return $this->search($search);

	}
  

}
  




 ?>