<?php
class Product_Model extends Base_Model
{
	protected $table = 'products';

	// find new product by time
	public function find_by_new_products()
	{
		$query = "select * from {$this->table} order by id desc";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	// count by category
	public function count_by_category($category_id, $no_of_records_per_page)
	{
		$count_sql = "select count(*) as total from `{$this->table}` where category_id = :category_id";
		$sth = $this->db->prepare($count_sql);
		$sth->execute([
			':category_id' => $category_id
		]);
		$rows = $sth->fetchAll();
		$sth->closeCursor();

		$total_rows = $rows[0]['total'];

		$total_pages = ceil($total_rows / $no_of_records_per_page);
		return $total_pages;
	}

	// pagination by category
	public function pagination_by_category($category_id, $offset, $no_of_records_per_page)
	{
		$query = "select * from `{$this->table}` where `category_id`= :category_id limit $no_of_records_per_page offset $offset";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':category_id' => $category_id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function pagination($name, $offset, $no_of_records_per_page)
	{
		$query = "select * from `{$this->table}` where 	`name` like '%" . $name . "%' limit $no_of_records_per_page offset $offset";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	// search products
	public function search_products($name)
	{
		$query = "select * from `{$this->table}` where `name` like '%$name%' ";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function find_last_product_inserted()
	{
		$query = "select *  from `{$this->table}` where (created_at) IN  ( SELECT  MAX(created_at) FROM `{$this->table}`)";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
