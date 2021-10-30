<?PHP
include('searchData.php');
if (empty($_SESSION['username'])) {
  header('location:signin.php');
}

$productName = "";
$batchNo = "";
$mfg = "";
$exp = "";
$qty = "";
$mrp = "";
if (isset($_GET['edit'])) {
  $batchNo = $_GET['edit'];


  $upquery = "SELECT productName,batchNo,mfg,exp,qty,mrp FROM medicines WHERE batchNo = '$batchNo'  UNION SELECT productName,batchNo,mfg,exp,qty,mrp FROM surgical WHERE batchNo = '$batchNo' UNION SELECT productName,batchNo,mfg,exp,qty,mrp FROM cosmetics WHERE batchNo = '$batchNo'";
  $rec = mysqli_query($db2, $upquery);

  $record = mysqli_fetch_array($rec);
  $productName = $record['productName'];
  $batchNo = $record['batchNo'];
  $mfg = $record['mfg'];
  $exp = $record['exp'];
  $qty = $record['qty'];
  $mrp = $record['mrp'];
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Search Page ...</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/searchStyle.css">
  <link rel="stylesheet" href="css/menuStyle.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/searchJs.js"></script>
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
          <li><a href="add.php">Add</a></li>
          <li><a href="bill.php">NewInvoice</a></li>
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

  <div class="searchPage">
    <div class="title">
      <p>Search<br>Medicine</p>
    </div>
    <div class="pageContent">

      <div class="row">
        <div class="col-md-9">
          <form method="POST" action="search.php">
            <div class="filterGroup row">
              <div class="col-md-3"><input type="radio" name="filter" value="medicine">&nbsp;Medicine &nbsp;&nbsp;</div>
              <div class="col-md-3"><input type="radio" name="filter" value="cosmetics">&nbsp;Cosmetics &nbsp;&nbsp;</div>
              <div class="col-md-3"><input type="radio" name="filter" value="surgical">&nbsp;Surgical &nbsp;&nbsp;</div>
              <div class="col-md-3"><input type="radio" name="filter" value="all" checked>&nbsp;All &nbsp;&nbsp;</div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="searchInput" class="form-control" placeholder="search product by name ...">
              <div class="input-group-append">
                <input type="submit" name="searchProduct" class="btn btn-outline-primary" id="searchBtn" value="Search">
              </div>
            </div>

            <div class="row">

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">BatchNo.</th>
                    <th scope="col">ProductName</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Expiry</th>
                    <th scope="col">Mrp</th>
                    <th scope="col">category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?PHP display(); ?>

                </tbody>
              </table>



            </div>


          </form>
        </div>

        <div class="updateBlock col-md-3">
          <div class="updateTitle text-center">Update Record ..</div>
          <form method="POST" action="search.php">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="productName">Product Name :.</label>
                  <input type="text" name="productName" class="form-control" value="<?PHP echo $productName ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="batchNo">Batch Number :.</label>
                  <input type="text" name="batchNo" class="form-control" value="<?PHP echo $batchNo ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="mfgDate">MFG Date :.</label>
                  <input type="date" ng-model="date" name="mfg" value="<?PHP echo $mfg ?>" class="form-control">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="expDate">EXP Date :.</label>
                  <input type="date" name="exp" value="<?PHP echo $exp ?>" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="quantity">Quantity :.</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="number" value="<?PHP echo $qty ?>" name="qty" ng-model="qty" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="mrp">MRP :.</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="text" ng-model="mrp" name="mrp" value="<?PHP echo $mrp ?>" class="form-control">
                </div>
              </div>
            </div>

            <hr style=" height: 2px; border: 2px solid #00ffff; border-radius: 50%;">

            <button type="submit" class="btn btn-block up-btn btn-primary" name="update">Update</button>

          </form>
        </div>
      </div>




    </div>


  </div>
</body>

</html>