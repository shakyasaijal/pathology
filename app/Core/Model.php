<?php

namespace Pathology\Core;

abstract class Model {

	public $db;
	
	public function __construct() {
		$this->db = new DB;
	}
}
