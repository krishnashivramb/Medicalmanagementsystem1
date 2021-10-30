<?PHP

include('server.php');

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signInStyle.css">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/jquery-3.3.1.min.js"></script>

    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>







    <form method="post" action="signin.php">
        <div class="card card1 shadow-lg float-right bg-info">
            <div class="card-header bg-info text-center h3 text-dark">Login </div>
            <img src="img/1.jpg" class="card-img ">
            <div class="card-body ">

                <?PHP include('error.php'); ?>

                <div class="form-group">
                    <label for="username"><b> UserName : </b></label>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="form-group">
                    <label for="password"><b> Password :</b></label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block form-control" name="login"><b>Sign In </b> </button>
                    <div class=" border border-info new-user">Create New Account<br>
                        <button type="submit" class="btn btn-primary btn-block form-control"> <b><a href="signup.php" style="color: white;"> Sign Up</a></b></button>
                        <!-- <a href="signup.php" class="text-danger"> Sign Up</a></b> -->
                    </div>
                </div>

            </div>
        </div>
    </form>





</body>

</html>