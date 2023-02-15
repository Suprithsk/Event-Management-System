<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Eventzzzz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="ticket_details.php"><b>Booked Events</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">User Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin/index.php">Admin Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="logout.php">Logout</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              My Profile
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="edit_prof.php">Edit Profile/change password</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              User Details
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item">User: <?php echo $_SESSION['name']; ?></a></li>
              <li><a class="dropdown-item">Email: <?php echo $_SESSION['email']; ?></a></li>
              <li><a class="dropdown-item">Unique id: <?php echo $_SESSION['id']; ?></a></li>
            </ul>
          </li>

        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search events">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <?php
  $connection = mysqli_connect("localhost", "root", "");
  $db = mysqli_select_db($connection, "ems");
  $query = "select events.event_name as event_name,events.event_id as event_id,events.creator_id as creator_id,events.category_id as category_id,events.event_details as event_details,events.venue as venue,category.category_name as category_name,creators.creator_name as creator_name from events,category,creators where events.category_id=category.category_id and events.creator_id=creators.creator_id";
  $query_run = mysqli_query($connection, $query);
  ?>
  <div class="container my-3">
    <div class="row">
      <h1>Events:</h1>
      <?php

      while ($row = mysqli_fetch_assoc($query_run)) {
      ?>
        <div class="col-lg-6 mb-4">
          <div class="card bg-dark">

            <div class="card-body">
              <form action="" method="post">
                <h5 class="card-title" style="color: white;">Event Name: <?php echo $row['event_name'] ?></h5>
                <h6 class="card-title" style="color: white;"></h6>
                <input type="hidden" name="eventId" value=<?php echo strval($row['event_id']) ?>>
                <input type="hidden" name="creatorId" value=<?php echo strval($row['creator_id']) ?>>
                <input type="hidden" name="categoryId" value=<?php echo strval($row['category_id']) ?>>
                <input type="hidden" name="userId" value=<?php echo strval($_SESSION['id']) ?>>
                <p class="card-text" style="color: white;"><b>Event Details:</b> <br><?php echo $row['event_details'] ?></p>
                <p class="card-text" style="color: white;"><b>Venue:</b> <br><?php echo $row['venue'] ?></p>
                <p class="card-text" style="color: white;"><b>Creator:</b> <br><?php echo $row['creator_name'] ?></p>
                <p class="card-text" style="color: white;"><b>Category:</b> <br><?php echo $row['category_name'] ?></p>

                <button class="btn btn-primary" type="submit" name="login">Book Event</button>
              </form>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <?php
  if (isset($_POST['login'])) {
  ?>
    <script>
      alert('event booked')
    </script>
  <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "ems");
    $radioVal1 = (int) $_POST['eventId'];
    $radioVal2 = (int) $_POST['creatorId'];
    $radioVal3 = (int) $_POST['categoryId'];
    $radioVal4 = (int) $_POST['userId'];
    $query = "insert into issued_events values(null,$radioVal1,$radioVal2,$radioVal3,$radioVal4)";
    $query_run = mysqli_query($connection, $query);
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>