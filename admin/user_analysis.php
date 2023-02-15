<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
					<a class="nav-link" href="../index.php">User Login</a>
				</li>
			</ul>
		</div>
	</nav>
    <?php
    if (isset($_POST['login'])) {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "ems");
        $radioVal1 = (int) $_POST['eventId'];
        $radioVal2 = $_POST['eveName'];
        $query = "select users.name as name,events.event_name as eve_n from users,issued_events,events where issued_events.user_id=users.id and issued_events.event_id=events.event_id and issued_events.event_id=$radioVal1";
        $query_run = mysqli_query($connection, $query);
    }
    ?>
    <?php
    $val = "";
    while ($row = mysqli_fetch_assoc($query_run)) {
        $val = $row['eve_n'];
    }
    ?>



    <h1 class="my-4 mx-4">Registered Users for <?php echo $val?></h1>
    <?php
    $query = "select users.name as name, users.email as email,events.event_name as eve_n,issued_events.issue_id as ticket_id from users,issued_events,events where issued_events.user_id=users.id and issued_events.event_id=events.event_id and issued_events.event_id=$radioVal1";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
    ?>

        <div class="card my-4 mx-4 bg-dark" style="width:30%;">
            <div class="card-body" style="color: white">
                Name: <?php echo $row['name']?> <br>
                Email: <?php echo $row['email']?> <br>
                Ticket id: <?php echo $row['ticket_id'] ?>
            </div>
            <!-- <div class="card-body" style="color: white">
                
            </div> -->
        </div>

    <?php
    }
    ?>
</body>

</html>