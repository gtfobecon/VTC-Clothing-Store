<?php
class Product_Size_Model extends Base_Model
{
	protected $table = 'product_size';

	function update_product_quantity($product_id, $size_id, $data = [])
	{
		$data += get_update_time();
		// auto gen values and fiels from a array
		$result = gen_update_fields_form_array($data);
		$query = "update `{$this->table}` set {$result->field_string} where product_id = {$product_id} and size_id = {$size_id}";
		try {
			$this->db->beginTransaction();
			$sth = $this->db->prepare($query);
			$sth->execute($result->bind_values);
			$this->db->commit();
			return true;
		} catch (PDOException $e) {
			$this->db->rollback();
			exit("Error!: " . $e->getMessage());
		}
		return false;
	}
	public function find_quantity_stock($product_id, $size_id)
	{
		$query = "select `quantity_stock` from `{$this->table}` where `product_id` = :product_id and `size_id` = :size_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':product_id' => $product_id,
			':size_id' => $size_id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
	public function delete_by_product_id($product_id)
	{
		$query = "DELETE FROM `{$this->table}` WHERE `product_id` = :product_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':product_id' => $product_id
		]);
	}

	public function find_by_product_size_id($id)
	{
		$query = "select * from `{$this->table}` where product_id = :id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':id' => $id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function find_by_product_id($product_id,$size_id)
	{
		$query = "select `quantity_stock` from `{$this->table}` where product_id = :product_id and `size_id` = :size_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':product_id' => $product_id,
			':size_id' => $size_id
		]);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	function find_by_product($product_id, $size_id)
	{
		$query = "select `id`,`quantity_stock` from `{$this->table}` where product_id = :product_id and `size_id` = :size_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':product_id' => $product_id,
			':size_id' => $size_id
		]);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
