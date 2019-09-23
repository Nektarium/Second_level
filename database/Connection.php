<?php  

class Connection {

	public static function make($config) {
		//1. Соед. с базой
		return new PDO(
			"{$config['connection']};dbname={$config['database']};charset={$config['charset']};",
			$config['username'], 
			$config['password']);
		return $pdo;
	}
}

?>