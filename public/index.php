<?php  

include __DIR__ . '/../functions.php';

//1. Настроить сервер, чтобы  запросы автоматически шли на страницу/файл index.php
//2. Завардампить $_SERVER
// Router | Маршрутизатор

$routes = [
	"/" => 'functions/homepage.php',
	"/about" => 'functions/about.php'
];

$route = $_SERVER['REQUEST_URI'];

if(array_key_exists($route, $routes)) {
	include __DIR__ . '/../' . $routes[$route]; exit;
} else {
	dd(404);
}

die('123');

?>