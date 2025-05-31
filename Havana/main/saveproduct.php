<?php
session_start();
include('../connect.php');

$a = $_POST['code'];
$c = $_POST['exdate'];
$d = $_POST['price'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['gen'];
$k = $_POST['qty_sold'];

// Updated query: Removed product_name (name), supplier, and date_arrival
$sql = "INSERT INTO products (product_code, expiry_date, price, qty, o_price, profit, gen_name, qty_sold) 
        VALUES (:a, :c, :d, :f, :g, :h, :i, :k)";
$q = $db->prepare($sql);
$q->execute(array(
    ':a' => $a,
    ':c' => $c,
    ':d' => $d,
    ':f' => $f,
    ':g' => $g,
    ':h' => $h,
    ':i' => $i,
    ':k' => $k
));

header("location: products.php");
?>
