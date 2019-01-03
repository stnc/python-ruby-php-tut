<?php

namespace Builder\Engine;

define ('DB_HOST', 	'localhost');
define ('DB_NAME', 	'stncmvc');
define ('DB_USER', 	'root');
define ('DB_PASS', 	'123456');

class Db
{
	private static $db;
	
	public static function init()
	{
		if (!self::$db)
		{
			try {
				$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=UTF8';

				self::$db = new PDO($dsn, DB_USER, DB_PASS);
				
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			} catch (PDOException $e) {
				die('Connection error: ' . $e->getMessage());
			}
		}
		return self::$db;
	}
}

