<?php

$db = include __DIR__ . '/../database/start.php';

$posts = $db->getAll();

//$posts = getAllPosts($pdo);

include __DIR__ . '/../index.view.php';

?>