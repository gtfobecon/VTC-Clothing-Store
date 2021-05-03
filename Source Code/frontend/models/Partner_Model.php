<?php
class Partner_Model extends Base_Model
{
	protected $table = 'partners';

	// lấy partner theo email
	public function get_by_email($email)
	{
		$query = "select * from `{$this->table}` where email = " . ':email' . "";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':email' => $email
		]);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function get_by_phone($phone_number)
	{
		$query = "select * from `{$this->table}` where phone_number = " . ':phone_number' . "";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':phone_number' => $phone_number
		]);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
