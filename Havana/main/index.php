<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">		
	<link rel="shortcut icon" href="images/pos.jpg">
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<title>
Havana
</title>
<?php
require_once('auth.php'); // Handles session and login check

function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime() * 1000000);
    $pass = '';
    for ($i = 0; $i < 8; $i++) {
        $num = rand(0, 9);
        $pass .= $num;
    }
    return $pass;
}
$finalcode = createRandomPassword();
$position = $_SESSION['SESS_LAST_NAME']; // Either 'admin' or 'cashier' etc.
?>
<!DOCTYPE html>
<html>
<head>
<title>Havana</title>
<link rel="shortcut icon" href="images/pos.jpg">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/DT_bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" rel="stylesheet" type="text/css" />

<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    });
  });

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
    var seconds = now.getSeconds();
    var timeValue = "" + ((hours > 12) ? hours - 12 : hours);
    if (timeValue == "0") timeValue = 12;
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
    timeValue += (hours >= 12) ? " P.M." : " A.M.";
    document.clock.face.value = timeValue;
    timerID = setTimeout("showtime()", 1000);
    timerRunning = true;
  }
  function startclock() {
    stopclock();
    showtime();
  }
  window.onload = startclock;
</script>

<style type="text/css">
body {
  padding-top: 60px;
  padding-bottom: 40px;
}
.sidebar-nav {
  box-shadow: none !important;
  background-color: #28a745;
  color: white;
  padding: 9px;
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
  color: white;
  font-weight: bold;
}
.sidebar-nav .nav-list li.active a:hover {
  background-color: #218838;
}
.icon-2x {
  text-shadow: none !important;
}
</style>
</head>

<body>
<?php include('navfixed.php'); ?>

<div class="container-fluid">
  <div class="row-fluid">

    <div class="span2">
      <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <li class="active"><a href="index.php"><i class="icon-dashboard icon-2x"></i>Dashboard</a></li>
          
          <!-- Sales is visible to all -->
          <li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i>Sales</a></li>

          <?php if ($position == 'admin') { ?>
          <!-- Admin-only options -->
          <li class="active"><a href="products.php"><i class="icon-list-alt icon-2x"></i>Products</a></li>
          <li class="active"><a href="sales_inventory.php"><i class="icon-table icon-2x"></i>Product Inventory</a></li>
          <li class="active"><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Sales Report</a></li>
          <?php } ?>

          <br><br><br><br><br><br>
          <li>
            <div class="hero-unit-clock">
              <form name="clock">
                <font color="white">Time:<br></font>&nbsp;
                <input style="width:150px;" type="submit" class="trans" name="face" value="">
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="span10">
      <div class="contentheader">
        <i class="icon-dashboard"></i> Dashboard
      </div>
      <ul class="breadcrumb">
        <li class="active">Dashboard</li>
      </ul>

      <font class="title-text" style="font:bold 50px 'Aleo';">
        <center>HAVANA</center>
      </font>

      <div id="mainmain">
        <!-- Always visible -->
        <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Sales</a>

        <?php if ($position == 'admin') { ?>
        <a href="products.php"><i class="icon-list-alt icon-2x"></i><br> Products</a>
        <a href="users.php"><i class="icon-group icon-2x"></i><br> Manage Users</a>
        <a href="sales_inventory.php"><i class="icon-table icon-2x"></i><br> Product Inventory</a>
        <a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Sales Report</a>
        <?php } ?>

        <!-- Always visible -->
        <a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font><br> Logout</a>

        <div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
