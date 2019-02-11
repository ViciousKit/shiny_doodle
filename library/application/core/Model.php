<?php

require 'application/libs/Db.php';

//подключает базу данных
abstract class Model
{
	protected $database;
	
	function __construct()
	{
		$this->database = new Db;
	}
}