
<?php
//include auth_session.php file on all user panel pages
include("./classes/auth_session.php");
if(!$_SESSION['role'] == 'admin'){
  header('location: login.php');
}
include("./classes/config.php");
$sql = "SELECT * FROM bookings";
$result = mysqli_query($con, $sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacts - Travel</title>
    <link href="./assets/admin/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/admin/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><?php echo $_SESSION['full_name'];?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/dashboard.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/trips.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Trips
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/contacts.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Contacts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/bookings.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Bookings
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookings</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone No.</th>
              <th scope="col">Destination</th>
              <th scope="col">Members</th>
              <th scope="col">Date of Departure</th>
              <th scope="col">Date of Arrival</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              $count =0;
              while($row = mysqli_fetch_assoc($result)) {
                $count++;
               ?>
            <tr>
              <td><?php echo $count ;?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['phone_number'];?></td>
              <td><?php echo $row['destination'];?></td>
              <td><?php echo $row['members'];?></td>
              <td><?php echo $row['date_of_departure'];?></td>
              <td><?php echo $row['date_of_arrival'];?></td>
              <td><a href="/classes/class.delete.bookings.php?id=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
               <?php
              }
            } else {
              echo "0 results";
            }
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="./assets/admin/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
