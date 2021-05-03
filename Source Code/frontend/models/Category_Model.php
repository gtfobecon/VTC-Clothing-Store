<?php
class Category_Model extends Base_Model
{
	protected $table = 'categories';

	public function get_id_by_name($name)
	{
		$query = "select id from {$this->table} where name = :name";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':name' => $name
		]);
		$id = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $id;
	}
	
}
