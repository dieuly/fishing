<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>diary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <nav class="navbar transparent">
    <div class="container-fluid">
      <div class="navbar-header">
      </div>
      <button class="btn btn-default navbar-btn pull-right" data-toggle="modal" data-target="#myModal" style="background-color:#827D79; color:#fff">Log out</button>
    </div>
  </nav>
  <div id="carousel-banner" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-banner" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-banner" data-slide-to="1"></li>
      <li data-target="#carousel-banner" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img src="images/ex1.jpg" alt="First slide">
        <div class="carousel-caption">
          <h3>Welcome to Fisherman!</h3>
          <p>Where you can easily find the best fishing spots</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/ex2.jpg" alt="Second slide">
        <div class="carousel-caption">
          <h3> Looking for a new place to fish</h3>
          <p>Try our Fishing Location Search</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/ex3.jpg" alt="Third slide">
        <div class="carousel-caption">
          <h3>Want to keep record of your catches</h3>
          <p>Check out our catch diary</p>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="icon-prev" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="icon-next" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container content">
    <div class="row">
      <div class="col-xs-8">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Diary</li>
        </ol>
        <table class="table table-hove">
          <thead>
            <tr>
              <th>No.</th>
              <th>Fishing location</th>
              <th>Date</th>
              <th>Fishing method</th>
              <th>Fish species</th>
              <th>Weight(kg)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $con=mysqli_connect("localhost","root","","test");
            // Check connection
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con,"SELECT * FROM fishing");
            // loop through the table and print out the information in each column accordingly
            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<th>" . $row['id'] ."</th>";
              echo "<td>" . $row['location'] . "</td>";
              echo "<td>" . $row['date'] . "</td>";
              echo "<td>" . $row['method'] . "</td>";
              echo "<td>" . $row['species'] . "</td>";
              echo "<td>" . $row['weight'] . "</td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            mysqli_close($con);
            ?>

          </div>
          <div class="col-xs-4" id="pic">
            <div class="col-xs-6">
              <img src="images/fish1.jpg" alt="..." class="img-thumbnail responsive">
            </div>
            <div class="col-xs-6">
              <img src="images/fish2.jpg" alt="..." class="img-thumbnail responsive">
            </div>
          </div>
        </div>
        <div class="row footer">
          <a href="index.php" name="button" class="btn btn-primary btn-sm">Add new</a>
        </div>
      </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Sign in/ Sign up</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="Login">
                    <form role="form" class="form-horizontal" data-toggle="validator">
                      <div class="form-group">
                        <label for="signinEmail" class="col-sm-2 control-label">
                          Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="signinEmail" placeholder="email" required />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="signinPass" class="col-sm-2 control-label">
                            Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="signinPass" placeholder="password" required />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-10">
                              <button id="signinBtn" class="btn btn-primary btn-sm">
                                Sign in</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane" id="Registration">
                          <form role="form" class="form-horizontal" data-toggle="validator">
                            <div class="form-group">
                              <label for="signupEmail" class="col-sm-2 control-label">
                                Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="signupEmail" placeholder="email" required/>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="signupPass" class="col-sm-2 control-label">
                                  Password</label>
                                  <div class="col-sm-10">
                                    <input type="password" data-minlength="6" class="form-control" id="signupPass" placeholder="password" required />
                                    <div class="help-block">Minimum of 6 characters</div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputPasswordConfirm" class="col-sm-2 control-label">
                                    Confirm password</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#signupPass" data-match-error="Whoops, these don't match" placeholder="confirm password" required>
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="offset-sm-2 col-sm-10">
                                      <button id="signupBtn" class="btn btn-primary btn-sm" style="margin-left:10px">
                                        Sign up</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="row text-center sign-with">
                                <div class="col-md-12">
                                  <h3>
                                    Or sign in with</h3>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="btn-group btn-group-justified">
                                      <a href="#" class="btn btn-primary">Facebook</a>
                                      <a href="#" class="btn btn-danger">Google</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  
</body>
</html>
