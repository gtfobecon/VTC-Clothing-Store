<?php
class Order_Model extends Base_Model
{
	protected $table = 'orders';

	public function get_order_by_user($id)
	{
		$query = "select * from `{$this->table}` where user_id = :user_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':user_id' => $id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function count_by_order($user_id, $no_of_records_per_page)
	{
		$count_sql = "select count(*) as total from `{$this->table}` where `user_id` = :user_id";
		$sth = $this->db->prepare($count_sql);
		$sth->execute([
			':user_id' => $user_id
		]);
		$rows = $sth->fetchAll();
		$sth->closeCursor();

		$total_rows = $rows[0]['total'];

		$total_pages = ceil($total_rows / $no_of_records_per_page);
		return $total_pages;
	}

	public function pagination_by_order($user_id, $offset, $no_of_records_per_page)
	{
		$query = "select * from `{$this->table}` where `user_id`= :user_id order by `id` desc  limit $no_of_records_per_page offset $offset ";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':user_id' => $user_id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
