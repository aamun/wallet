<?php
/**
* Income Model
*/
class Income extends AppModel {
	
	public function create($values){
		$values['created'] = date("Y-m-d");
		return parent::create($values);
	}

	public function save(){
		if ($this['income_date'] == "") {
			$this['income_date'] = date('Y-m-d');
		}
		return parent::save();
	}
}
?>