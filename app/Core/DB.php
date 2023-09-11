<?php

namespace Pathology\Core;
use PDO;

class DB {
    protected $db;
	private $statement;
	private $stmt;

    public function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=pathology', 'root', '');
    }

    public function query($sql, $params = []) {
		// $this->stmt = $this->db->prepare($sql);
		// if (!empty($params)) {
		// 	foreach ($params as $key => $val) {
		// 		if (is_int($val)) {
		// 			$type = PDO::PARAM_INT;
		// 		} else {
		// 			$type = PDO::PARAM_STR;
		// 		}
		// 		$this->$stmt->bindValue(':'.$key, $val, $type);
		// 	}
		// }
		// $this->stmt->execute();
		// return $this->stmt;
		$this->statement = $this->db->prepare($sql);

	}

    public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	//Return a specific row as an object
	public function single() {
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_OBJ);
	}

	//Execute the prepared statement
	public function execute() {
		return $this->statement->execute();
	}

	//Bind values
	public function bind($parameter, $value, $type = null) {
		switch (is_null($type)) {
			case is_int($value):
				$type = PDO::PARAM_INT;
				break;
			case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
			case is_null($value):
				$type = PDO::PARAM_NULL;
				break;
			default:
				$type = PDO::PARAM_STR;
		}
		$this->statement->bindValue($parameter, $value, $type);
	}

	//Get's the row count
	public function rowCount() {
		return $this->statement->rowCount();
	}

}