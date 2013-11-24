<?php
/**
 * AppModel
 *
 * Extend models class functionality
 */
class AppModel extends Models {
	
	protected $total;

	/**
	 * Get total of rows found
	 * @return int
	 */
	public function getTotal(){
		return $this->total;
	}

	/**
	 * Override findAllBySql to user SQL_CALC_FOUND_ROWS for get total of rows found without limit query
	 * 
	 * @param string $sql
	 * @return array
	 */
	public function findAllBySql($sql){

		// Add "SQL_CALC_FOUND_ROWS" After SELECT
		$sql = substr_replace(trim($sql), "SELECT SQL_CALC_FOUND_ROWS ", 0, 6);
		$result = parent::findAllBySql($sql);

		// Query total
		$this->db->query("SELECT FOUND_ROWS() AS total");
		$row = $this->db->fetchRow();
		$this->total = $row['total'];

		return $result;
	}
}
?>