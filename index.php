<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>diary form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container form">
    <div class="row">
      <div class="offset-sm-2 col-sm-8">
        <h2>Keep you diary here</h2><br>
        <form class="" action="modified.php" method="post">
          <div class="form-group row">
            <label for="location" class="col-xs-2 col-form-label">Location</label>
            <div class="col-xs-10">
              <input class="form-control" type="text" placeholder="Espoo" id="" name="location">
            </div>
          </div>
          <div class="form-group row">
            <label for="date" class="col-xs-2 col-form-label">Date</label>
            <div class="col-xs-10">
              <input class="form-control" type="date" placeholder="2011-08-19" id="" name="date">
            </div>
          </div>
          <div class="form-group row">
            <label for="method" class="col-xs-2 col-form-label">Fishing method</label>
            <div class="col-xs-10">
              <input class="form-control" type="text" placeholder="catching" id="" name="method">
            </div>
          </div>
          <div class="form-group row">
            <label for="species" class="col-xs-2 col-form-label">Fish species</label>
            <div class="col-xs-10">
              <input class="form-control" type="text" placeholder="lohi" id="" name="species">
            </div>
          </div>
          <div class="form-group row">
            <label for="method" class="col-xs-2 col-form-label">Weight(kg)</label>
            <div class="col-xs-10">
              <input class="form-control" type="text" placeholder="7" id="" name="weight">
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>
</html>
