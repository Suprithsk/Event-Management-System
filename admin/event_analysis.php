<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Analysis</title>
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
    </nav>
    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "ems");
    $query = "select issued_events.event_id as eve_id,events.event_name as eve,creators.creator_name as cre_n,category.category_name as cat_n,COUNT(*) as count from issued_events,events,category,creators where issued_events.event_id=events.event_id and issued_events.creator_id=events.creator_id and issued_events.category_id=events.category_id and issued_events.creator_id=creators.creator_id and issued_events.category_id=category.category_id GROUP BY issued_events.event_id";
    $query_run = mysqli_query($connection, $query);
    ?>
    <div class="container my-3">
        <div class="row">
            <h1>Event Analysis</h1>
            <?php

            while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-dark">

                        <div class="card-body">
                            <form action="user_analysis.php" method="post">
                                <h5 class="card-title" style="color: white"><?php echo $row['eve'] ?></h5>
                                <p class="card-text" style="color: white">Creator: <?php echo $row['cre_n'] ?></p>
                                <p class="card-text" style="color: white">Category: <?php echo $row['cat_n'] ?></p>
                                <p class="card-text" style="color: pink">No of users registered: <?php echo $row['count'] ?></p>
                                <input type="hidden" name="eventId" value=<?php echo strval($row['eve_id']) ?>>
                                <input type="hidden" name="eveName" value=<?php echo $row['eve'] ?>>
                                <button class="btn btn-outline-primary btn-sm" name="login" type="submit">User Details</button>
                            </form>
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