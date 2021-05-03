<?php
class Base_Model
{

	protected $db;

	public function __construct()
	{
		$this->db_connect();
	}

	// connect db
	public function db_connect()
	{
		if (!empty($this->db)) {
			return;
		}

		$db_config_path = BASE_PATH . '/config/database.php';

		if (!file_exists($db_config_path)) {
			exit("File not found $db_config_path");
		}

		$config = require $db_config_path;
		$db_host = $config['db_host'];
		$db_port = $config['db_port'];
		$db_name = $config['db_name'];
		$db_username = $config['db_username'];
		$db_password = $config['db_password'];

		try {
			$this->db = new PDO("mysql:host={$db_host}:{$db_port};dbname=$db_name", $db_username, $db_password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->exec("set names utf8");
		} catch (PDOException $e) {
			exit("Connection failed: " . $e->getMessage());
		}
	}

	// find all record
	public function find()
	{
		$query = "select * from `{$this->table}`";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	// find a record by id
	public function find_by_id($id)
	{
		$query = "select * from `{$this->table}` where id = :id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':id' => $id
		]);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	// create a record
	public function create($data = [])
	{
		if (count($data) == 0) {
			return;
		}
		$data += get_create_time();

		// auto gen values and fiels from a array
		$result = gen_insert_fields_form_array($data);
		$query = "insert into `{$this->table}`"
			. " ({$result->field_string}) "
			. "values ({$result->value_string})";

		try {
			$this->db->beginTransaction();
			$sth = $this->db->prepare($query);
			$sth->execute($result->bind_values);
			$insert_id = $this->db->lastInsertId();
			$this->db->commit();
			return $this->find_by_id($insert_id);
		} catch (PDOException $e) {
			$this->db->rollback();
			exit("Error!: " . $e->getMessage());
		}
	}

	// update record
	public function update($id, $data = [])
	{
		if (!$id || count($data) == 0) {
			return;
		}
		$data += get_update_time();

		// auto gen values and fiels from a array
		$result = gen_update_fields_form_array($data);
		$query = "update `{$this->table}` set {$result->field_string}";

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

	// update a record by id
	public function update_by_id($id, $data = [])
	{
		if (!$id || count($data) == 0) {
			return;
		}
		$data += get_update_time();
		// auto gen values and fiels from a array
		$result = gen_update_fields_form_array($data);
		$query = "update `{$this->table}` set {$result->field_string} where `id` = {$id} ";
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
	
	// delete a record
	public function destroy($id)
	{
		$query = "delete from `{$this->table}` where `id` = :id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':id' => $id
		]);
	}
}
