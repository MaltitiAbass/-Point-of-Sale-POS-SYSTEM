<?php
    // Start session
    session_start();

    // Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_FIRST_NAME']);
    unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
    <title>Havana</title>
    <link rel="shortcut icon" href="main/images/pos.jpg">
    <link href="main/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="style.css" media="screen" rel="stylesheet" type="text/css" />

    <style type="text/css">
        body {
            padding-top: 80px;
            padding-bottom: 40px;
        }

        .black-button {
    background-color: #000000 !important;
    border: none !important;
    color:rgb(9, 9, 9) !important;
}

.black-button:hover,
.black-button:focus,
.black-button:active {
    background-color: #000000 !important;
    color: #ffffff !important;
    border: none !important;
    box-shadow: none !important;
}



        .title-text {
            color: black;
        }

        #login {
            position: relative;
            width: 400px;
            margin: 0 auto;
        }

        .error-message {
            color: white;
            background-color: red;
            padding: 10px;
            text-align: center;
            position: absolute;
            top: -50px;
            width: 80%;
            border-radius: 5px;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span4">
            </div>
        </div>

        <div id="login">
            <?php
            if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
                foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                    echo '<div class="error-message">' . $msg . '</div>';
                }
                unset($_SESSION['ERRMSG_ARR']);
            }
            ?>

            <form action="login.php" method="post">
                <font class="title-text" style="font:bold 50px 'Aleo';"><center>HAVANA</center></font>
                <br>

                <div class="input-prepend">
                    <span style="height:30px; width:25px;" class="add-on">
                        <i class="fa fa-user icon-2x"></i>
                    </span>
                    <input style="height:40px;" type="text" name="username" placeholder="Username" required /><br>
                </div>

                <div class="input-prepend">
                    <span style="height:30px; width:25px;" class="add-on">
                        <i class="fa fa-lock icon-2x"></i>
                    </span>
                    <input type="password" style="height:40px;" name="password" placeholder="Password" required /><br>
                </div>

                <div class="qwe">
                <button class="btn btn-large btn-block pull-right green-button" type="submit">
                        <i class="icon-signin icon-large"></i> Login
                    </button>
</div>

            </form>
        </div>
    </div>
</body>
</html>
