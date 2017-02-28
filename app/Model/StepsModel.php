<?php 

namespace Model;

class StepsModel extends \W\Model\Model {

//insert step
	public function addStep($description, $recipe){
		$this->setPrimaryKey("st_id");
		$data = array("st_description" =>$description, "recipes_re_id" =>$recipe);
		return $this->insert($data); 
	}

//select ALL steps d'une telle recipe
	public function selectSteps($re_id){
		// FONCTION FAUSSE, A REFAIRE (JOINTURE)
			$sql = 'SELECT * FROM `steps`, `recipes` WHERE `steps`.`recipes_re_id` = `recipes`.re_id AND recipes_re_id = :id ';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $re_id);
		$sth->execute();

		return $sth->fetchAll();
            $search =array("recipes_re_id"=>$re_id);
			
        return $this->search($search);


	}

//update step
	public function updateStep($id, $description){
		$this->setPrimaryKey("st_id");
		$data = array("st_description" => $description);
		return $this->update($data, $id); 
	}

//delete step
	public function deleteStep($id){
		$this->setPrimaryKey("st_id");
		return $this->delete($id); 
	}

}










 ?>