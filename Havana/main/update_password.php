<?php
include('auth.php');
include('connect.php');

if ($_SESSION['SESS_LAST_NAME'] !== 'admin') {
    header("Location: index.php");
    exit();
}

if (isset($_POST['id']) && isset($_POST['password'])) {
    $userId = intval($_POST['id']);
    $newPassword = trim($_POST['password']);

    if (strlen($newPassword) < 4) {
        echo "<script>alert('Password must be at least 4 characters.'); window.location='users.php?reset_id={$userId}&error=short';
</script>";
        exit();
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $hashedPassword, $userId);

    if ($stmt->execute()) {
        echo "<script>alert('Password reset successfully!'); window.location='users.php';</script>";
    } else {
        echo "<script>alert('Failed to reset password.'); window.location='reset_password.php?id={$userId}';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.location='users.php';</script>";
}
?>
