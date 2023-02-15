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
      <a class="navbar-brand" href="admin_dashboard.php">Admin of Eventzzzz</a>
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
					<a class="nav-link" href="add_category.php">Add new Category</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../index.php">User Login</a>
				</li>
				

			</ul>
		</div>
	</nav>
  <section class="vh-100 my-3" style="background-color: white;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black bg-dark" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: white;">Add new event</p>

                  <form class="mx-1 mx-md-4" action="" method="post">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="name" class="form-control" />
                        <label class="form-label" for="name" style="color: white;">Event Name</label>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <h6 style="color:#ADD8E6;">Select creator-</h6>
                      </div>
                    </div>

                    <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "ems");
                    $query = "select * from creators";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radioone" value=<?php echo strval($row['creator_id']) ?>>
                          <label class="form-check-label" for="radioone" style="color:aliceblue">
                            <?php echo $row['creator_name'] ?>
                          </label>
                        </div>
                      </div>
                    <?php
                    }

                    ?>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <h6 style="color:#ADD8E6;">Select category-</h6>
                      </div>
                    </div>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "ems");
                    $query = "select * from category";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-check">

                          <input class="form-check-input" type="radio" name="radiotwo" value=<?php echo strval($row['category_id']) ?>>
                          <label class="form-check-label" for="radiotwo" style="color:aliceblue">
                            <?php echo $row['category_name'] ?>
                          </label>
                        </div>
                      </div>
                    <?php
                    }

                    ?>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="textareao" class="form-control" />
                        <label class="form-label" for="textareao" style="color: white;">Event details</label>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="venue" class="form-control" />
                        <label class="form-label" for="venue" style="color: white;">Venue</label>
                      </div>
                    </div>


                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="login" class="btn btn-primary btn-lg">Add Event</button>
                    </div>
                  </form>
                  <?php
                  if (isset($_POST['login'])) {
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "ems");
                    $radioVal1 = (int) $_POST['radioone'];
                    $radioVal2 = (int) $_POST['radiotwo'];
                    $query = "insert into events values(null,'$_POST[name]',$radioVal1,$radioVal2,'$_POST[textareao]','$_POST[venue]')";
                    $query_run = mysqli_query($connection, $query);
                  ?>
                  <?php
                  }
                  ?>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>