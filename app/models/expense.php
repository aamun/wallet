<?php
/**
* Expense Model
*/
class Expense extends AppModel {
	public function create($values){
		$values['created'] = date("Y-m-d");
		return parent::create($values);
	}

	public function save(){
		if ($this['expense_date'] == "") {
			$this['expense_date'] = date('Y-m-d');
		}
		return parent::save();
	}
}
?>