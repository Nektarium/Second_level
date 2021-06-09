<?php  

// if( !session_id() ) @session_start();

require '../vendor/autoload.php';
use DI\ContainerBuilder;
use Delight\Auth\Auth;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
	Engine::class => function() {
		return new Engine('../app/views');
	},


	PDO::class => function() {
		$driver = "mysql";
		$host = "localhost";
		$database_name = "mysql";
		$username = "root";
		$password = "root";

		return new PDO("$driver:host=$host;dbname=$database_name", $username, $password);
	},

	Auth::class => function($container) {
		return new Auth($container->get('PDO'));
	},
]);
$container = $containerBuilder->build(); 


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/home', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/about', ['App\controllers\HomeController', 'about']);
    $r->addRoute('GET', '/verification', ['App\controllers\HomeController', 'email_verification']);
    $r->addRoute('GET', '/login', ['App\controllers\HomeController', 'login']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
    	echo "404";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "405";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($routeInfo[1], $routeInfo[2]);
        // ... call $handler with $vars
        break;
}

// if(true) {
// 	flash()->message('Hot!');
// }

// echo flash()->display();

// use App\QueryBuilder;

// $db = new QueryBuilder();

// // Create new Plates instance
// $templates = new League\Plates\Engine('../app/views');

// // Render a template
// echo $templates->render('homepage', ['name' => 'Jonathan']);

// if($_SERVER['REQUEST_URI'] == '/home') {
// 	require '../app/controllers/homepage.php';
// }

// exit;

// use App\QueryBuilder;

// $db = new QueryBuilder();

// use Aura\SqlQuery\QueryFactory;

// $queryFactory = new QueryFactory('mysql');

// $select = $queryFactory->newSelect();

// $select->cols(['*'])
// 	->from('posts');

// $pdo = new PDO('mysql:host=localhost;dbname=secondLevel;charset=utf8;', 'root', 'root');

// $sth = $pdo->prepare($select->getStatement());

// $sth->execute($select->getBindValues());

// $result = $sth->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

// include __DIR__ . '/../functions.php';


// $routes = [
// 	"/" => 'functions/homepage.php',
// 	"/about" => 'functions/about.php',
// ];

// $route = $_SERVER['REQUEST_URI'];

// if(array_key_exists($route, $routes)) {
// 	include __DIR__ . '/../' . $routes[$route]; exit;
// } else {
// 	dd(404);
// }

?>