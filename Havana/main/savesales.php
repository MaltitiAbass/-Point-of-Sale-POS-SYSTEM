<?php
session_start();
include('../connect.php');

// Get POST values and set defaults where necessary
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];

// Set default value for customer name (if not provided)
$cname = isset($_POST['cname']) ? $_POST['cname'] : 'Anonymous';

// Handle 'credit' type
if ($d == 'credit') {
    // Ensure 'due' value is provided for credit transactions
    $f = isset($_POST['due']) ? $_POST['due'] : 0; // Default due to 0 if not provided

    // Prepare and execute the SQL query
    $sql = "INSERT INTO sales (invoice_number, cashier, date, type, amount, profit, due_date, name) 
            VALUES (:a, :b, :c, :d, :e, :z, :f, :g)";
    $q = $db->prepare($sql);
    $q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':z' => $z, ':f' => $f, ':g' => $cname));

    header("location: preview.php?invoice=$a");
    exit();
}

// Handle 'cash' type
if ($d == 'cash') {
    // Ensure 'cash' value is provided for cash transactions
    $f = isset($_POST['cash']) ? $_POST['cash'] : 0; // Default cash to 0 if not provided

    // Prepare and execute the SQL query
    $sql = "INSERT INTO sales (invoice_number, cashier, date, type, amount, profit, due_date, name) 
            VALUES (:a, :b, :c, :d, :e, :z, :f, :g)";
    $q = $db->prepare($sql);
    $q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':z' => $z, ':f' => $f, ':g' => $cname));

    header("location: preview.php?invoice=$a");
    exit();
}

?>
