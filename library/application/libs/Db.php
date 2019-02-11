<?php

/**
 * 
 */
class Db 
{
	protected $db;
	
	public function __construct()
	{
		$dbConfig = require 'application/config/db.php';
		$host = $dbConfig['host'];
		$dbName = $dbConfig['db_name'];
		$login = $dbConfig['login'];
		$password = $dbConfig['password'];

		$this->db = new PDO("mysql:host=$host;dbname=$dbName", $login, $password);
	}

	public function query($sql, $params = []) {

		$stmt = $this->db->prepare($sql); 
		if( !empty($params)) {
			foreach ($params as $key => $value) {
				$stmt->bindValue(':' . $key, $value);
			}
		}
		$stmt->execute($params);
		return $stmt;
	}

	public function row($sql) {
		$result = $this->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql) {
		$result = $this->query($sql);
		return $result->fetchColumn(PDO::FETCH_ASSOC);
	}

	public function lastInsertId() {
		return $this->db->lastInsertId();
	}


}