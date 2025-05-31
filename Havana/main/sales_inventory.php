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

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script>
function Clickheretoprint() { 
  var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,"; 
  disp_setting += "scrollbars=yes,width=700, height=400, left=100, top=25"; 

  var content_value = document.getElementById("content").innerHTML; 

  // Create a temporary container to manipulate the content for printing
  var tempContainer = document.createElement('div');
  tempContainer.innerHTML = content_value;

  // Remove "Action" column header
  var headers = tempContainer.querySelectorAll('thead th');
  headers.forEach((header, index) => {
    if (header.innerText.trim() === "Action") {
      header.remove();
      // Remove corresponding column in all rows
      tempContainer.querySelectorAll('tbody tr').forEach(row => {
        row.children[index]?.remove();
      });
    }
  });

  var docprint = window.open("", "", disp_setting); 
  docprint.document.open(); 
  docprint.document.write('<html><head><title>Print Product Report</title>'); 
  docprint.document.write('<link rel="stylesheet" href="css/bootstrap.css" type="text/css">'); // Include your CSS for table styling
  docprint.document.write('<style> table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #ddd; padding: 8px; text-align: right; } th { background-color: #f2f2f2; text-align: center; }</style>');
  docprint.document.write('</head><body onload="self.print()">');          
  docprint.document.write('<h3 style="text-align:center;">Product Report</h3>'); // Add title
  docprint.document.write(tempContainer.innerHTML); 
  docprint.document.write('</body></html>'); 
  docprint.document.close(); 
  docprint.focus(); 
}

</script>


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
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='HA'.createRandomPassword();
?>



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
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
			<i class="icon-bar-chart"></i> Product Inventory
			</div>
<br>

<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	<div style="float:right;">		
	<button style="float:left; font-size: 1.2em; padding: 10px 20px;" class="btn btn-success btn-mini">
  <a href="javascript:Clickheretoprint()" style="color: white; text-decoration: none;">Print</a>
</button>

</div>
<br>
<br>
<br>


<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search here..." autocomplete="off" />
<div class="content" id="content">
<br><br><br>
<center><strong>Product Inventory</strong></center>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> Invoice </th>
			<th width="9%"> Date </th>
			<th width="14%"> Item Name </th>
			<th width="16%">  Category </th>
			<th > Price </th>
			<th> QTY </th>

			<th width="8%"> Total Amount </th>
			<th width="8%"> Profit </th>

			<th > Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			function formatMoney($number, $fractional=false) {
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
				$result = $db->prepare("SELECT * FROM sales_order ORDER BY transaction_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['invoice']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php
			$price=$row['price'];
			echo formatMoney($price, true);
			?></td>
						<td><?php echo $row['qty']; ?></td>
			<td><?php
			$oprice=$row['amount'];
			echo formatMoney($oprice, true);
			?></td>
				<td><?php
			$pprice=$row['profit'];
			echo formatMoney($pprice, true);
			?></td>
			<td> 				
			<a href="deletesalesinventory.php?id=<?php echo $row['transaction_id']; ?>&qty=<?php echo $row['qty'];?>"><button class="btn btn-mini btn-danger"><i class="icon icon-trash"></i> Delete </button></a>
			</tr>
			<?php
				}
			?>
		
				
			
			<tr>
				
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Total Amount</th>
				<th>Total Profit</th>
				<th></th>
			<tr>
				
			<tr>
				<th colspan="6"><strong style="font-size: 20px; color: #222222;">Total: GH₵</strong></th>
				<th colspan="1"><strong style="font-size: 13px; color: #222222;">
				<?php
				$resultas = $db->prepare("SELECT sum(amount) from sales_order");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></th>
				<th colspan="1"><strong style="font-size: 13px; color: #222222;">
				<?php
				$resultas = $db->prepare("SELECT sum(profit) from sales_order");
				$resultas->bindParam(':b', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(profit)'];
				echo formatMoney($fgfg, true);
				}
				?>
				
					</th>
					
					<th></th>
			</tr>
		
		
		
		
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
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
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesalesinventory.php",
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