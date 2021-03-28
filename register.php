<?php require_once 'database_connection.php'; ?>
<?php date_default_timezone_set('Europe/Istanbul'); ?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Sign Up</title>
</head>

<body>

  <br>
  <h2 align="center">Sign Up</h2>
  <hr><br>


  <!-- form starts here  -->
  <div align="center"> 
    <div class="card" style="width: 60%">

      <div class="card-header">
        <h4 align="center">Create an account</h4>
      </div>

      <div class="card-body">

        <form action="process.php" method="POST">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username_signup" placeholder="Enter your username" required="">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password_signup" placeholder="Enter your password" required="">
            </div>
          </div>

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">User Type</legend>
              <div class="col-sm-10">

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" value="instructor" checked>
                  <label class="form-check-label">
                    Instructor
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" value="student">
                  <label class="form-check-label">
                    Student
                  </label>
                </div>
                
              </div>
            </div>
          </fieldset>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary" name="btn_signup">Sign up</button>
            </div>
          </div>

        </form>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="index.php">You already have an account? Click here to sign in.</a>

      </div>
    </div>
  </div>
  <!-- form ends here  -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>