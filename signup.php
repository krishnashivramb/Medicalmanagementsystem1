<?PHP

include('server.php');

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signupStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Chewy|Coiny" rel="stylesheet">


    <title>Sign Up Page...</title>
</head>

<body>

    <form method="post" action="signup.php">


        <div class="card outer-card shadow-lg">
            <div class="card-header text-center bg-info text-dark h3">
                *** Sign UP For Free ***
            </div>
            <div class="card-text">
                <?PHP include('error.php'); ?>
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Name :.</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username ... ">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="mail">Email :.</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter E-mail ...">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="storeName">Store Name :.</label>
                            <input type="text" class="form-control" name="storeName" placeholder="Enter Store Name ... ">
                        </div>
                    </div>

                </div>
                <hr>
                <fieldset>
                    <legend>Store Address ... </legend>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="pinCode">Address :.</label>
                                <textarea name="address" class="form-control" placeholder="Enter your store address ...">

                                </textarea>
                            </div>
                        </div>


                        <!-- <div class="row">
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="pinCode">Pin Code :.</label>
                      <input type="text" class="form-control" name="pinCode" placeholder="Pin Code ... ">
                  </div>
                      </div>
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="state">State :.</label>
                      <input type="text" class="form-control" name="state" placeholder="State ...">
                  </div>
                      </div>
                      
                  </div>
                      
                      <div class="row">
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="district">District :.</label>
                      <input type="text" class="form-control" name="dist" placeholder="District ... ">
                  </div>
                      </div>
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="taluka">Taluka :.</label>
                      <input type="text" class="form-control" name="tal" placeholder="Taluuka ...">
                  </div>
                      </div>
                          </div>
                          
                          <div class="row">
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="village">Village :.</label>
                      <input type="text" class="form-control" name="village" placeholder="Village Name ... ">
                  </div>
                      </div>
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Road">Road :.</label>
                      <input type="text" class="form-control" name="road" placeholder="Road Name ...">
                  </div>
                      </div>
                      
                  </div>
                          
                  <div class="row">
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="at">A/T :.</label>
                      <input type="text" class="form-control" name="at">
                  </div>
                      </div>
                      
                      <div class="col-sm-6">
                  <div class="form-group">
                      <label for="post">Post :.</label>
                      <input type="text" class="form-control" name="post">
                  </div>
                      </div>
                      
                  </div> -->
                    </div>
                </fieldset>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="password">Password :.</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-sm-6">
                        <label for="confirmPassword">Confirm Password :.</label>
                        <input type="password" class="form-control" name="cpassword">
                    </div>
                </div>
                <div class="row">

                    <label for="slogan">Your Slogan ... </label>
                    <textarea class="form-control" name="slogan"></textarea>
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-outline-info btn-block submit-btn" name="regester">Submit</button>
                <p class="text-dark text-right text-muted" style="margin-top:15px;"><b>... Already User, <a href="signin.php" class="text-danger">Sign in</a></b></p>
            </div>
        </div>

</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>