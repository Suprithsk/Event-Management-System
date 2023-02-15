<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
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
                        <a class="nav-link active" href="#">Booked Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="user_dashboard.php">User Dashboard</a>
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

    $va = (int) $_SESSION['id'];
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "ems");

    $query = "select events.event_name as eve_n,issued_events.issue_id as ticket_id from issued_events,events where issued_events.event_id=events.event_id and issued_events.user_id=$va";
    $query_run = mysqli_query($connection, $query);
    ?>
    <div class="container my-3">
        <div class="row">
            <h1>Booked Events:</h1>
            <?php

            while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-dark">

                        <div class="card-body">
                            <h5 class="card-title" style="color: white;"> <b>Event Name: </b><?php echo $row['eve_n'] ?></h5>
                            <h6 class="card-title" style="color: white;"></h6>
                            <p class="card-text" style="color: white;"><b>Unique Ticket ID: </b><?php echo $row['ticket_id'] ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>