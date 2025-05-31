<?php
session_start();

// Connect to MySQL server
$conn = mysqli_connect('localhost', 'root', '', 'sales');
if (!$conn) {
    die('Failed to connect to server: ' . mysqli_connect_error());
}

// Sanitize input
function clean($str, $conn) {
    $str = trim($str);
    return mysqli_real_escape_string($conn, $str);
}

$login = clean($_POST['username'], $conn);
$password = clean($_POST['password'], $conn);

// Input Validations
$errmsg_arr = array();
$errflag = false;

if ($login == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
}

// Use prepared statement for login
$query = "SELECT * FROM user WHERE username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $login);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $member = mysqli_fetch_assoc($result);

    // Verify hashed password
    if (password_verify($password, $member['password'])) {
        session_regenerate_id();
        $_SESSION['SESS_MEMBER_ID'] = $member['id'];
        $_SESSION['SESS_FIRST_NAME'] = $member['name'];
        $_SESSION['SESS_LAST_NAME'] = $member['position']; // used to check admin
        $_SESSION['SESS_USERNAME'] = $member['username'];
        $_SESSION['IS_ADMIN'] = strtolower($member['username']) === 'admin';
        session_write_close();
        header("location: main/index.php");
        exit();
    } else {
        $_SESSION['ERRMSG_ARR'][] = 'Invalid login credentials';
        session_write_close();
        header("location: index.php");
        exit();
    }
} else {
    $_SESSION['ERRMSG_ARR'][] = 'User not found';
    session_write_close();
    header("location: index.php");
    exit();
	
}
?>
