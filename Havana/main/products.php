<html>
<head>
<title>
Havana
</title>
<link rel="shortcut icon" href="images/pos.jpg">

<?php 
require_once('auth.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style type="text/css">
  .sidebar-nav {
  box-shadow: none !important;


    background-color: #28a745; /* Green background */
    color: white;
  }

  .sidebar-nav .nav-list li a {
    color: white; /* Default text color for menu items */
    text-decoration: none;
  }

  .sidebar-nav .nav-list li a:hover {
    background-color: #218838; /* Darker green on hover */
    color: white;
  }

  .sidebar-nav .nav-list li.active a {
    background-color: #28a745; /* Match the sidebar color to avoid white highlight */
    color: white; /* Ensure the text remains white */
    font-weight: bold; /* Optional: Highlight the active item with bold text */
  }

  .sidebar-nav .nav-list li.active a:hover {
    background-color: #218838; /* Ensure hover effect works for active items */
  }
</style>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 10;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
</head>
<?php

function createRandomPassword() {
    $chars = "003232303232023232023456789"; // Only numbers
    srand((double)microtime() * 1000000);
    $pass = '';
    for ($i = 0; $i < 8; $i++) { // Generate an 8-digit number
        $num = rand(0, 9); // Select a random digit
        $pass .= $num;
    }
    return $pass;
}
$finalcode = createRandomPassword();
?>


<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }
</script>


 <script language="javascript" type="text/javascript">

<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
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
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	

<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li class="active"><a href="index.php"><i class="icon-dashboard icon-2x"></i>Dashboard </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i>Sales</a>  </li>             
			<li class="active"><a href="products.php"><i class="icon-list-alt icon-2x"></i>Products</a>                                     </li>
			<li class="active"><a href="sales_inventory.php"><i class="icon-table icon-2x"></i>Product Inventory</a>                </li>
			<li class="active"><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i>Sales Report</a>                </li>


			<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>             
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-table"></i> Products
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Products</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products ORDER BY qty_sold DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products where qty < 10 ORDER BY product_id DESC");
				$result->execute();
				$rowcount123 = $result->rowcount();

			?>
				<div style="text-align:center;">
			Total Number of Items:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
			
			<div style="text-align:center;">
			<font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';">[<?php echo $rowcount123;?>]</font> Items are below QTY of 10 
			</div>
</div>


<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
<a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Item</button></a><br><br>
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
    <tr>
        <th width="12%">Item Name</th>
        <th width="14%">Category</th>
        <th width="10%">Expiry Date</th>
        <th width="6%">Original Price</th>
        <th width="6%">Selling Price</th>
        <th width="6%">QTY</th>
        <th width="5%">Qty Left</th>
        <th width="8%">Total</th>
        <th width="8%">Action</th>
    </tr>
</thead>
<tbody>
    <?php
    function formatMoney($number, $fractional = false) {
        if ($fractional) {
            $number = sprintf('%.2f', $number);
        }
        while (true) {
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
            if ($replaced != $number) {
                $number = $replaced;
            } else {
                break;
            }
        }
        return $number;
    }
    include('../connect.php');
    $result = $db->prepare("SELECT *, price * qty as total FROM products ORDER BY product_id DESC");
    $result->execute();
    for ($i = 0; $row = $result->fetch(); $i++) {
        $total = $row['total'];
        $availableqty = $row['qty'];
        if ($availableqty < 10) {
            echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
        } else {
            echo '<tr class="record">';
        }
    ?>
        <td><?php echo $row['product_code']; ?></td>
        <td><?php echo $row['gen_name']; ?></td>
        <td><?php echo $row['expiry_date']; ?></td>
        <td><?php
            $oprice = $row['o_price'];
            echo formatMoney($oprice, true);
            ?></td>
        <td><?php
            $pprice = $row['price'];
            echo formatMoney($pprice, true);
            ?></td>
        <td><?php echo $row['qty_sold']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td>
            <?php
            $total = $row['total'];
            echo formatMoney($total, true);
            ?>
        </td>
        <td>
            <a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $row['product_id']; ?>">
                <button class="btn btn-warning"><i class="icon-edit"></i></button>
            </a>
            <a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click to Delete the product">
                <button class="btn btn-danger"><i class="icon-trash"></i></button>
            </a>
        </td>
    </tr>
    <?php
    }
    ?>
</tbody>

		
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this Product? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteproduct.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>