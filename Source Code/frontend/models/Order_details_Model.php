<?php
class Order_details_Model extends Base_Model
{
	protected $table = 'order_details';

	public function find_order_by_order_id($order_id)
	{
		$query = "select * from `{$this->table}` where `order_id` = :order_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':order_id' => $order_id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
