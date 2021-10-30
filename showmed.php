<?php
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "krishnamedicinestore";
//create  a connection
$conn = mysqli_connect($sname, $uname, $password, $db_name);
//die if connection was not successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "connection was successfully<br>";
}
$sql = "SELECT * FROM `cosmetics`";
$result = mysqli_query($conn, $sql);

//find the numbers of records returned
$num = mysqli_num_rows($result);
echo $num;
echo "<br>";
//display the rows returned by the sql query
if ($num > 0) {
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>"; 

    //we can fetch in a better way using the while loop
    while ($row = mysqli_fetch_assoc($result)) {
        // echo var_dump($row);
        echo $row['productName'] . "  Hello  " . $row['productName'] . " welcome to " . $row['mrp'];
        echo "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShowMed</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/menuStyle.css">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/homeScript.js"></script>
    <script type="text/javascript" src="js/menuJs.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
</head>

<body>
    <div class="fullMenu">
        <div id="bg">
        </div>
        <div id="main">

            <img src="img/menuIcon.png" alt="menuIcon" id="icon">
            <div id="menu">

                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li><a href="home.php?logout='1'">Log Out</a></li>
                </ul>

            </div>
        </div>
        <div id="menuCircleLayer"></div>

        <div id="social_media">
            <div id="container">
                <div id="msg">FOLLOW US</div>
                <ul>
                    <li><img src="img/Facebook.png" /></li>
                    <li><img src="img/Instagram.png" /></li>
                    <li><img src="img/Twitter.png" /></li>
                </ul>
            </div>
        </div>
        <div id="social_circle_layer"></div>
    </div>


    <div class="container">
        <ul class="nav nav-tabs nav-fill " id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="medicine-tab" data-toggle="tab" href="#medicine" role="tab" aria-controls="medicine" aria-selected="true">
                    <h3>medicine</h3>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="surgical-tab" data-toggle="tab" href="#surgical" role="tab" aria-controls="surgical" aria-selected="false">
                    <h3>Surgical</h3>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cosmetics-tab" data-toggle="tab" href="#cosmetics" role="tab" aria-controls="cosmetics" aria-selected="false">
                    <h3>Cosmetics</h3>
                </a>
            </li>
        </ul>
    </div>
    <div class="contain">
        <table>
            <th>product Name</th>
            <br>
            <th>Price</th>
            <th>Price</th>
            <th>Price</th>
        </table>
    </div>
</body>

</html>