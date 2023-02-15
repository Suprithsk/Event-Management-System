<?php
require('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Admin of Eventzzzz</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">

			<ul class="nav navbar-nav navbar-center">
				<li class="nav-item">
					<a class="nav-link" href="admin_dashboard.php">Admin Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="event_analysis.php" style="color: black;"><b>Event Analysis</b></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="add_event.php">Add new Event</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="add_category.php">Add new Category</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="add_creator.php">Add new Creator</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../index.php">User Login</a>
				</li>
			</ul>
		</div>
	</nav><br>
	<div class="row mx-4">
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-outline-secondary" style="width: 300px">
				<div class="card-header">Registered User</div>
				<div class="card-body" >
					<p class="card-text" >No. total Users: <?php echo get_user_count(); ?></p>
					<!-- <a class="btn btn-danger" href="Regusers.php" target="_blank">View Registered Users</a> -->
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Total Events</div>
				<div class="card-body">
					<p class="card-text">No of events available: <?php echo get_event_count(); ?></p>
					<!-- <a class="btn btn-success" href="Regbooks.php" target="_blank">View All Events</a> -->
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Event Categories</div>
				<div class="card-body">
					<p class="card-text">No of Categories: <?php echo get_category_count(); ?></p>
					<!-- <a class="btn btn-warning" href="Regcat.php" target="_blank">View Categories</a> -->
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Creators</div>
				<div class="card-body">
					<p class="card-text">No of Creators: <?php echo get_creator_count(); ?></p>
					<!-- <a class="btn btn-primary" href="Regauthor.php" target="_blank">View Creators</a> -->
				</div>
			</div>
		</div>
	</div><br><br>
	<div class="row mx-4">
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Number of events Issued</div>
				<div class="card-body">
					<p class="card-text">No of events issued: <?php echo get_issue_count(); ?></p>
					<!-- <a class="btn btn-success" href="view_issued_book.php" target="_blank">View Issued Events</a> -->
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>