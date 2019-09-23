<?php

class QueryBuilder {

	protected $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	function getAll() {
		//2. Подготовить запрос
		$sql = 'SELECT * FROM posts';
		//3. Выполнить запрос
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		//4. Получить ассоциативный массив ->  $posts
		$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $posts;
	}

	public function getOne($table, $id)
	{
		$sql = "SELECT * FROM posts WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute([
			'id' => $id
		]);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	public function create($table, $data)
	{
		$keys = implode(',', array_keys($data));
		$tags = ":" . implode(', :', array_keys($data));
		$sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($data);
	}

	public function update($table, $data, $id)
	{
		$keys = array_keys($data);

		$string = '';

		foreach ($keys as $key) {
			$string .= $key .  '=:' . $key . ',';
		}

		$keys = rtrim($string, ',');

		$data['id'] = $id;

		$sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($data);
	}

	public function delete($table, $id)
	{
		$sql = "DELETE FROM {$table} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute([
			'id' => $id
		]);
	}
}

?>