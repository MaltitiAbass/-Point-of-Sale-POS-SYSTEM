<?php
include('auth.php');
include('connect.php');

if ($_SESSION['SESS_LAST_NAME'] !== 'admin') {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    
  <title>Havana</title>
  <link rel="shortcut icon" href="images/pos.jpg">

  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
  <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
  

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
    }
    .sidebar-nav .nav-list li.active a {
      background-color: #28a745;
      font-weight: bold;
    }
    .hero-unit-clock {
      padding: 10px 0;
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
      var timeValue = "" + ((hours >12) ? hours -12 :hours)
      if (timeValue == "0") timeValue = 12;
      timeValue += ((minutes < 10) ? ":0" : ":") + minutes
      timeValue += ((seconds < 10) ? ":0" : ":") + seconds
      timeValue += (hours >= 12) ? " P.M." : " A.M."
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
          <li><a href="index.php"><i class="icon-dashboard icon-2x"></i>Dashboard </a></li>
          <a href="sales.php?id=cash&invoice"><i class="icon-shopping-cart icon-2x"></i>Sales</a>
          <?php if ($_SESSION['SESS_LAST_NAME'] == 'admin') { ?>
            <li><a href="products.php"><i class="icon-list-alt icon-2x"></i>Products</a></li>
            <li><a href="sales_inventory.php"><i class="icon-table icon-2x"></i>Product Inventory</a></li>
            <li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Sales Report</a></li>
            <?php } ?>
          <br><br><br><br><br><br>
          <li>
            <div class="hero-unit-clock">
              <form name="clock">
                <font color="white">Time: <br></font>
                <input style="width:150px;" type="text" class="trans" name="face" value="" disabled>
              </form>
            </div>
          </li>
        </ul>
      </div><!--/.well -->
    </div><!--/span-->

    <div class="span10">
      <div class="contentheader">
        <i class="icon-user"></i>Manage Users
      </div>
      <ul class="breadcrumb">
        <a href="index.php"><li>Dashboard</li></a> /
        <li class="active">Manage Users</li>
      </ul>

      <div style="margin-top: -19px; margin-bottom: 21px;">
        <a href="index.php"><button class="btn btn-default btn-large"><i class="icon icon-circle-arrow-left icon-large"></i>Back</button></a>
      </div>

      <a href="add_user.php" class="btn btn-success"><i class="icon-plus icon-white"></i>Add New User</a>
      <br><br>

      <table class="table table-bordered table-hover" id="resultTable" data-responsive="table">
        <thead>
          <tr>
            
            <th>Username</th>
            <th>Name</th>
            <th>Position</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = "SELECT * FROM user";
          $result = mysqli_query($conn, $query);

          if (!$result) {
              echo "<tr><td colspan='5'>Error fetching users: " . mysqli_error($conn) . "</td></tr>";
          }

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    
                    <td>{$row['username']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['position']}</td>
                    <td>

               <div class='btn-group'>
            <a href='reset_password.php?id={$row['id']}' rel='facebox' class='btn btn-warning btn-xs' title='Reset Password'>
              <i class='icon-refresh'></i>
            </a>
            <a href='delete_user.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this user?');\" class='btn btn-danger btn-xs' title='Delete User'>
              <i class='icon-trash'></i>
            </a>
          </div>
        </td>
      </tr>";
        }
        
        ?>
        </tbody>
      </table>
    </div><!--/span10-->
  </div><!--/row-->
</div><!--/container-->

<?php include('footer.php'); ?>
</body>
</html>
