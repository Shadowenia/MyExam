<?php session_start(); ?>
<?php date_default_timezone_set('Europe/Istanbul'); ?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Welcome to MyExam</title>
</head>

<body>

  <!-- Welcome part  -->
  <br>
  <h1 align="center">Welcome to MyExam</h1>
  <h4 align="center">MyExam is an online examination platform which is created by Faruk Özkan</h4>
  <hr>
  <br>



  <!-- Warnings and notifications starts here -->

  <!-- Warning incase unsuccessful registeration -->
  <?php if ($_GET['registered'] == "no") { ?>
    <div class="alert alert-danger">
      Registeration Failed ! You may have entered an existing username.
    </div>
  <?php } ?>

  <!-- Notification for successful registeration -->
  <?php if ($_GET['registered'] == "yes") { ?>
    <div class="alert alert-success">
      Registeration Successful !
    </div>
  <?php } ?>

  <!-- Warning incase invalid username -->
  <?php if ($_GET['signedin'] == "nouser") { ?>
    <div class="alert alert-danger">
      Couldn't Sign in. Invalid username.
    </div>
  <?php } ?>

  <!-- Warning incase invalid password -->
  <?php if ($_GET['signedin'] == "nopass") { ?>
    <div class="alert alert-danger">
      Couldn't Sign in. Check your password.
    </div>
  <?php } ?>

  <!-- Log Out Notification -->
  <?php if ($_GET['logout'] == "yes") { ?>
    <div class="alert alert-success">
      Logged out successfuly. Session has closed.
    </div>
  <?php } ?>

  <!-- Warnings and notifications ends here -->



  <!-- Form starts here  -->
  <div align="center"> 
    <div class="card" style="width: 60%">
      <div class="card-header">
        <h4 align="center">Login to use MyExam</h4>
      </div>
      <div class="card-body">
        <form action="process.php" method="POST">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username_signin" placeholder="Enter your username" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password_signin" placeholder="Enter your password" required="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="rememberme_signin">
                <label class="form-check-label" for="gridCheck1">
                  Remember me
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary" name="btn_signin">Sign in</button>
            </div>
          </div>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="register.php">You don't have an account? Click here to sign up.</a>
      </div>
    </div>
  </div>
  <!-- Form ends here  -->





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>