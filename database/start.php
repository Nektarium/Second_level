<?php

$config = include __DIR__ . '/../config.php';
include __DIR__ . '/../QueryBuilder.php';
include __DIR__ . '/../Connection.php';

return new QueryBuilder(
	Connection::make($config['database'])
);

?>