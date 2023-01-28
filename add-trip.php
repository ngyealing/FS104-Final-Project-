
<?php
//include auth_session.php file on all user panel pages
include("./classes/auth_session.php");
if(!$_SESSION['role'] == 'admin'){
  header('location: login.php');
}
include("./classes/config.php");
$sql = "SELECT * FROM trips";
$result = mysqli_query($con, $sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trip - Travel</title>
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
            <a class="nav-link active" aria-current="page" href="/trips.php">
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
            <a class="nav-link" aria-current="page" href="/bookings.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Bookings
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Trips</h1>
        <a href="/trips.php">Back</a>
      </div>
      <form action="" id="trip_form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        required="required">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                        required="required" placeholder="Price in doller">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="sku_id">SKU ID <span style="font-size: 12px;">(should be unique)</span></label>
                    <input type="number" class="form-control" id="sku_id" name="sku_id"
                        required="required" placeholder="001">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        required="required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple
                        required="required">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        required="required"></textarea>
                </div>
            </div>
            <div class="col-lg-5 mt-3">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm" id="trip_save">Save</button>
              </div>
            </div>
        </div>
      </form>
    </main>
  </div>
</div>
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
  <script src="./assets/admin/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function(){

      $('#trip_save').click(function(e){
        e.preventDefault();
        if($('#trip_form').valid()){

        var title = $("input[name=title]").val();
        var price = $("input[name=price]").val();
        var sku_id = $("input[name=sku_id]").val();
        var quantity = $("input[name=quantity]").val();
        var description = $("textarea[name=description]").val();

        var form_data = new FormData();
        form_data.append('title', title);
        form_data.append('price', price);
        form_data.append('sku_id', sku_id);
        form_data.append('quantity', quantity);
        form_data.append('description', description);
        // Read selected files
        var totalfiles = document.getElementById('images').files.length;
        for (var index = 0; index < totalfiles; index++) {
            form_data.append("images[]", document.getElementById('images').files[index]);
        }
        
        // AJAX request
        $.ajax({
          url: '/classes/class.add-trip.php', 
          type: 'post',
          data: form_data,
          dataType: 'json',
          contentType: false,
          processData: false,
          success: function (response) {
              if (response == '200') {
                  $('#trip_form').trigger("reset");
                  alert('Record Save Successfully.');
              }
              else if (response == '201') {
                            alert("Error occured !");
                }

              },
            error: function (error) {
                 console.log(error);
            }
        });
        }

      });

      });
  </script>
  </body>
</html>
