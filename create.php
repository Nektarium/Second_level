<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offet-md-2">
				<form action="store.php" method="POST">
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-success">Add Post</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>