<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveproduct.php" method="post">
    <center><h4><i class="icon-plus-sign icon-large"></i> Add Item</h4></center>
    <hr>
    <div id="ac">
        <span>Item Name: </span>
        <input type="text" style="width:265px; height:30px;" name="code"><br>
        <span>Category: </span>
        <input type="text" style="width:265px; height:30px;" name="gen" required><br>
        <span>Expiry Date: </span>
        <input type="date" value="<?php echo date('M-d-Y'); ?>" style="width:265px; height:30px;" name="exdate"><br>
        <span>Selling Price: </span>
        <input type="text" id="txt1" style="width:265px; height:30px;" name="price" onkeyup="sum();" required><br>
        <span>Original Price: </span>
        <input type="text" id="txt2" style="width:265px; height:30px;" name="o_price" onkeyup="sum();" required><br>
        <span>Profit: </span>
        <input type="text" id="txt3" style="width:265px; height:30px;" name="profit" readonly><br>
        <span>Quantity: </span>
        <input type="number" style="width:265px; height:30px;" min="0" id="txt11" onkeyup="sum();" name="qty" required><br>
        <span></span>
        <input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" required><br>
        <div style="float:right; margin-right:10px;">
            <button class="btn btn-success btn-block btn-large" style="width:267px;">
                <i class="icon icon-save icon-large"></i> Save
            </button>
        </div>
    </div>
</form>
