<!DOCTYPE html>
<html>
<head>
<?php require_once ('auth.php');?>
<title>
Havana
</title>
<link rel="shortcut icon" href="images/pos.jpg">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style type="text/css">
	@page {
  margin: 0;
}

	
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
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint() { 
  var disp_setting = "toolbar=no,location=no,directories=no,menubar=no,"; 
      disp_setting += "scrollbars=no,width=300,height=500,left=100,top=25"; 
  var content_value = document.getElementById("content").innerHTML; 
  
  var docprint = window.open("", "", disp_setting); 
  docprint.document.open(); 
  docprint.document.write('<html><head><title></title>'); 
  docprint.document.write('<style>@media print { body { margin: 0; padding: 0; } #content { width: 58mm; margin: 0 auto; font-size: 10px; } table { width: 100%; border-collapse: collapse; } th, td { font-size: 10px; padding: 2px; } }</style>'); 
  docprint.document.write('</head><body onLoad="self.print()">');  
  docprint.document.write('<style>@media print { @page { margin: 0; } body { margin: 0; padding: 0; } ... }</style>');        
  docprint.document.write(content_value); 
  docprint.document.write('</body></html>'); 
  docprint.document.close(); 
  docprint.focus(); 
}
</script>

<?php
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];

$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['due_date'];
if($pt == 'cash') {
    $cash = is_numeric($cash) ? $cash : 0; // Ensure $cash is numeric
    $am = is_numeric($am) ? $am : 0; // Ensure $am is numeric
    $amount = $cash - $am;  // Now this will work as expected
}

}
}
?>
<?php
function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 7) {
        $num = rand() % strlen($chars); // Ensure proper random selection
        $tmp = substr($chars, $num, 1);
        $pass .= $tmp;
        $i++;
    }
    return $pass;
}
$finalcode = createRandomPassword(); 
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
<style type="text/css">
  @media print {
    #content {
      width: 58mm !important; /* Standard narrow receipt width */
      margin: 0 auto;
      font-size: 9px !important; /* Smaller base font size */
      padding: 2px !important; /* Reduced padding */
    }
    h5 {
      font-size: 9px !important; /* Smaller header text */
      margin: 2px 0 !important;
      line-height: 1.1 !important;
    }
    th, td {
      font-size: 8px !important; /* Compact table text */
      padding: 1px !important; /* Minimal cell padding */
    }
  }
</style>


<body>

<?php include('navfixed.php');?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             <div class="well sidebar-nav">
			 <ul class="nav nav-list">
  <li class="active">
    <a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard</a>
  </li>
  <li class="active">
    <a href="sales.php?id=cash&invoice"><i class="icon-shopping-cart icon-2x"></i> Sales</a>
  </li>

  <?php if (isset($_SESSION['SESS_POSITION']) && $_SESSION['SESS_POSITION'] == 'admin') { ?>
    <li class="active">
      <a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a>
    </li>
    <li class="active">
      <a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>
    </li>
    <li class="active">
      <a href="sales_inventory.php"><i class="icon-table icon-2x"></i> Product Inventory</a>
    </li>
  <?php } ?>
</ul>


          
          </div><!--/.well -->
        </div><!--/span-->
		
	<div class="span10">
	<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	<center>
  <h5 style="margin: 0; font-size: 12px;">
    <b>Sales Receipt</b><br>
    Havana <br>
    Russia-Accra <br>
    Tel: 0244617186<br>
    Email: havana@gmail.com
  </h5>
</center>

	<div>
	<?php
	$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['address'];
	$contact=$rowa['contact'];
	}
	?>
	</div>
	</div>
	<div style="width: 136px; float: left; height: 70px;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<td>Receipt #</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>		
			<td><?php echo $date ?></td>
            <td id="current-time"></td>
		</tr>
		<tr>
			
  <td>Cashier</td>
  <td><?php echo htmlspecialchars($cashier); ?></td>
</tr>

	
	</table>
	
	</div>
	<script>
    function displayCurrentTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const timeString = `${hours}:${minutes}:${seconds}`;
        document.getElementById("current-time").innerText = timeString;
    }
    // Update the time every second
    setInterval(displayCurrentTime, 1000);
    // Display the time immediately on page load
    displayCurrentTime();
</script>


	<div class="clearfix"></div>
	</div>
	<div style="width: 100%; margin-top:-70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 10px; text-align:left; width:100%;">
  <thead>
    <tr>
				<th>Item</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Discount</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['product_code']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$row['discount'];
				echo formatMoney($ddd, true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$row['amount'];
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px;">Total GH₵ &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="4"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Amount Paid GH₵ &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:12px;">
					<?php
					if($pt=='cash'){
					echo 'Balance  GH₵';
					}
					if($pt=='credit'){
					echo 'Due Date:';
					}
					?>&nbsp;
					</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
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
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					?>
					
					</strong></td>
				</tr>
				
			
		</tbody>
	</table>
	</div>	
		<div class="footer" style="text-align: center; margin-top: 10px;">
		<div>Thank you for your purchase!</div>
</div>
	</div>
	</div>
	</div>
	</div>
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		
</div>

</div>


