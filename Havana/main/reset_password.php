<?php
include('auth.php');
include('connect.php');

if ($_SESSION['SESS_LAST_NAME'] !== 'admin') {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "<script>alert('No user selected.'); window.location='users.php';</script>";
    exit();
}

$userId = intval($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    
    <style>
        body {
            padding-top: 60px;
        }
        .form-box {
            margin: 0 auto;
            max-width: 400px;
            background: #f9f9f9;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
    <script>
        function generatePassword() {
            const password = Math.floor(1000 + Math.random() * 9000);
            document.getElementById('password').value = password;
        }
    </script>
</head>
<body>
<div style="width: 350px; margin: auto;">
    <h4 class="text-center">Reset Password</h4>
    <form action="update_password.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $userId; ?>">

        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="text" name="password" id="password" class="form-control" required style="width: 100%;" placeholder="Enter or generate new password">
        </div>

        <br>
        <div class="text-center">
            <button type="button" class="btn btn-warning" onclick="generatePassword()">Generate 4-digit Password</button>
            <br><br>
            <button type="submit" class="btn btn-primary">Reset Password</button>
            <a href="users.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
