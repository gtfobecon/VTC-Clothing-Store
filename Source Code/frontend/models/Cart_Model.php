<?php
class Cart_Model extends Base_Model
{
	protected $table = 'carts';
	
	public function find_product_from_cart($user_id)
	{

		$query = "select * from `{$this->table}` where `user_id` = :user_id;";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':user_id' => $user_id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function find_by_product_id($product_id, $size_id)
	{
		$query = "select `id`,`quantity` from `{$this->table}` where product_id = :product_id and `size_id` = :size_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':product_id' => $product_id,
			':size_id' => $size_id
		]);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function update_product_to_cart($user_id, $product_id, $size_id, $data = [])
	{
		if (!$user_id || !$product_id || !$size_id || count($data) == 0) {
			return;
		}
		$data += get_update_time();
		// auto gen values and fiels from a array
		$result = gen_update_fields_form_array($data);
		$query = "update `{$this->table}` set {$result->field_string} where `size_id` = {$size_id} and `product_id` = {$product_id} and `user_id` = {$user_id}";
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

	public function destroy_product_by_user($user_id)
	{
		$query = "delete from `{$this->table}` where `user_id` = :user_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':user_id' => $user_id
		]);
	}

	public function destroy_product_by_cart($user_id, $product_id, $size_id)
	{
		$query = "delete from `{$this->table}` where `user_id` = :user_id and `product_id` = :product_id and `size_id` = :size_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			'user_id' => $user_id,
			':product_id' => $product_id,
			':size_id' => $size_id
		]);
	}
}
