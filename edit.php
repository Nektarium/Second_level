<?php

include 'functions.php';
$db = include 'database/start.php';

$id = $_GET['id'];	
$post = $db->getOne('posts', $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offet-md-2">
				<form action="update.php?id=<?php echo $post['id'];?>" method="POST">
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
					</div>
					<div class="form-group">
						<button class="btn btn-warning ">Edit Post</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>