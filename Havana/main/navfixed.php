<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#"><b>Havana</b></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_LAST_NAME']; ?></strong></a></li>
          <li>
            <a>
              <i class="icon-calendar icon-large"></i>
              <?php
              // Directly using date() with the desired format
              echo date('l, F d, Y');
              ?>
            </a>
          </li>
          <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
