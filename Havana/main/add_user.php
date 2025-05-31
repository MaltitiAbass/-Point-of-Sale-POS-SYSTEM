<?php
include('connect.php');
include('auth.php');
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <title>Havana </title>
    <link rel="shortcut icon" href="images/pos.jpg">

    <!-- Facebox -->
    <link href="src/facebox.css" rel="stylesheet" type="text/css" />
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
          loadingImage : 'src/loading.gif',
          closeImage   : 'src/closelabel.png'
        })
      });
    </script>

    <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }

      .sidebar-nav {
         box-shadow: none !important;
         -webkit-box-shadow: none !important;
       }

      .sidebar-nav {
        padding: 9px;
        background-color: #28a745;
        color: white;
      }
      .sidebar-nav .nav-list li a {
        color: white;
        text-decoration: none;
      }
      .sidebar-nav .nav-list li a:hover {
        background-color: #218838;
        color: white;
      }
      .sidebar-nav .nav-list li.active a {
        background-color: #28a745;
        color: white;
        font-weight: bold;
      }
      .sidebar-nav .nav-list li.active a:hover {
        background-color: #218838;
      }
    </style>

    <script language="javascript" type="text/javascript">
    var timerID = null;
    var timerRunning = false;
    function stopclock () {
      if(timerRunning)
        clearTimeout(timerID);
      timerRunning = false;
    }
    function showtime () {
      var now = new Date();
      var hours = now.getHours();
      var minutes = now.getMinutes();
      var seconds = now.getSeconds()
      var timeValue = "" + ((hours > 12) ? hours - 12 : hours);
      if (timeValue == "0") timeValue = 12;
      timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
      timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
      timeValue += (hours >= 12) ? " P.M." : " A.M.";
      document.clock.face.value = timeValue;
      timerID = setTimeout(showtime, 1000);
      timerRunning = true;
    }
    function startclock() {
      stopclock();
      showtime();
    }
    window.onload=startclock;
    </script>
</head>

<body>
<?php include('navfixed.php'); ?>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <li class="active"><a href="index.php"><i class="icon-dashboard icon-2x"></i>Dashboard</a></li>
          <li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i>Sales</a></li>

          <?php if ($_SESSION['SESS_LAST_NAME'] == 'admin') { ?>
            <li class="active"><a href="products.php"><i class="icon-list-alt icon-2x"></i>Products</a></li>
            <li class="active"><a href="sales_inventory.php"><i class="icon-table icon-2x"></i>Product Inventory</a></li>
            <li class="active"><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Sales Report</a></li>
            <li class="active"><a href="users.php"><i class="icon-group icon-2x"></i>User Management</a></li>
          <?php } ?>

          <br><br><br><br><br><br>
          <li>
            <div class="hero-unit-clock">
              <form name="clock">
                <font color="white">Time:<br></font>&nbsp;
                <input style="width:150px;" type="text" class="trans" name="face" value="" disabled>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="span10">
      <div class="contentheader">
        <i class="icon-user"></i> Add New User
      </div>
      <ul class="breadcrumb">
        <a href="index.php"><li>Dashboard</li></a> /
        <li class="active">Add User</li>
      </ul>

      <div class="container" style="padding: 20px;">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $position = mysqli_real_escape_string($conn, $_POST['position']);

            $check_query = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='alert alert-danger'>Username already exists!</div>";
            } else {
                $query = "INSERT INTO user (username, password, name, position) 
                          VALUES ('$username', '$password', '$name', '$position')";

                if (mysqli_query($conn, $query)) {
                    echo "<div class='alert alert-success'>User added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
        }
        ?>

        <form method="POST" action="" class="form-horizontal" style="max-width: 600px;">
          <div class="control-group">
            <label class="control-label" for="username">Username:</label>
            <div class="controls">
              <input type="text" id="username" name="username" class="form-control" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
              <input type="password" id="password" name="password" class="form-control" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="name">Name:</label>
            <div class="controls">
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="position">Position:</label>
            <div class="controls">
              <select id="position" name="position" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="cashier">Cashier</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-success">
                <i class="icon-plus-sign icon-white"></i> Add User
              </button>
              <a href="users.php" class="btn btn-default">Back to User List</a>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
