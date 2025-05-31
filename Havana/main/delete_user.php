<?php
include('auth.php');
include('connect.php');

if ($_SESSION['SESS_LAST_NAME'] !== 'admin') {
  header("Location: index.php");
  exit();
}

if (isset($_GET['id'])) {
  $user_id = intval($_GET['id']);

  // Get the ID of the first admin
  $first_admin_query = mysqli_query($conn, "SELECT id FROM user WHERE position = 'admin' ORDER BY id ASC LIMIT 1");
  $first_admin_row = mysqli_fetch_assoc($first_admin_query);
  $first_admin_id = $first_admin_row['id'];

  // Prevent deletion of the first admin
  if ($user_id == $first_admin_id) {
    echo "<script>alert('The primary admin account cannot be deleted.'); window.location='users.php';</script>";
    exit();
  }

  // Proceed with deletion
  $delete = mysqli_query($conn, "DELETE FROM user WHERE id = $user_id");

  if ($delete) {
    echo "<script>alert('User deleted successfully.'); window.location='users.php';</script>";
  } else {
    echo "<script>alert('Failed to delete user.'); window.location='users.php';</script>";
  }
} else {
  header("Location: users.php");
}
?>
