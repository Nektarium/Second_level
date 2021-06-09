<html>
<head>
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<nav>
	<ul>
		<li><a href="/home">Homepage</a></li>
		<li><a href="/about">About</a></li>
	</ul>
</nav>

<?=$this->section('content')?>

</body>
</html>