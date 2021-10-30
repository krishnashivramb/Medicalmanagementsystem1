<?PHP
include("homeData.php");
//if user is not logged in then it can not access this page
if (empty($_SESSION['username'])) {
  header('location:signin.php');
}
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Home Page ...</title>

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

  <div class="billPage">
    <div class="title">
      <p>Welcome<br>Home</p>
    </div>
    <div class="pageContent">

      <h1 class="storeName text-center">~~ <?PHP echo $storeName; ?> ~~</h1>
      <div class="slogan text-center"><?PHP echo $slogan; ?></div>

      <hr>

      <div class="notifications row">

        <div class="alert alert-danger card border border-danger">
          <div class="card-body text-center">
            Expired Products !!!<br>
            <div class="text-center">( <span class="ecount"><?PHP expProducts();
                                                            echo $ecount; ?></span> )</div>
          </div>
          <div class="card-footer text-center">
            <a href="#" id="epRecordDisplayClick1" class="moreInfo alert-danger">More Info >></a>
          </div>
        </div>

        <div class="alert alert-warning card border border-warning">
          <div class="card-body text-center">
            Products Near to Expiry !!!<br>
            <div class="text-center">( <span class="necount"><?PHP echo $necount; ?></span> )</div>
          </div>
          <div class="card-footer text-center">
            <a href="#" id="nepRecordDisplayClick1" class="moreInfo alert-warning">More Info >></a>
          </div>
        </div>

        <div class="alert alert-danger card border border-danger">
          <div class="card-body text-center">
            Product Out Of Stock !!!<br>
            <div class="text-center">( <span class="oscount"><?PHP echo $oscount; ?></span> )</div>
          </div>
          <div class="card-footer text-center">
            <a href="#" id="osRecordDisplayClick1" class="moreInfo alert-danger">More Info >></a>
          </div>
        </div>

        <div class="alert alert-warning card border border-warning">
          <div class="card-body text-center">
            Painding Dues !!!<br>
            <div class="text-center">( <span class="pdcount"><?PHP echo $pdcount; ?></span> )</div>
          </div>
          <div class="card-footer text-center">
            <a href="#" id="pdRecordDisplayClick1" class="moreInfo alert-warning">More Info >></a>
          </div>
        </div>
      </div>


      <div class="alert alert-success text-center border border-success" id="epRecordDisplayClick">
        Expired Products Records
      </div>
      <div id="epRecordDisplay">
        <table align='center' style='width: 800px;'>
          <thead>
            <tr>
              <th class='text-center'>Batch No.</th>
              <th class='text-center'>productName</th>
              <th class='text-center'>Expiry</th>
              <th class='text-center'>Quantity</th>
              <th class='text-center'>Mrp</th>
            </tr>
          </thead>
          <tbody id='epRecords'>
            <?PHP epRecordDisplay(); ?>
          </tbody>
        </table>
      </div>



      <div class="alert alert-success text-center border border-success" id="nepRecordDisplayClick">
        Near to Expiry Products Records
      </div>
      <div id="nepRecordDisplay">
        <table align='center' style='width: 800px;'>
          <thead>
            <tr>
              <th class='text-center'>Batch No.</th>
              <th class='text-center'>productName</th>
              <th class='text-center'>Expiry</th>
              <th class='text-center'>Quantity</th>
              <th class='text-center'>Mrp</th>
            </tr>
          </thead>
          <tbody id='nepRecords'>
            <?PHP nepRecordDisplay(); ?>
          </tbody>
        </table>
      </div>



      <div class="alert alert-success text-center border border-success" id="osRecordDisplayClick">
        Out Of Stock Products
      </div>
      <div id="osRecordDisplay">
        <table align='center' style='width: 800px;'>
          <thead>
            <tr>
              <th class='text-center'>Batch No.</th>
              <th class='text-center'>productName</th>
              <th class='text-center'>Expiry</th>
              <th class='text-center'>Quantity</th>
              <th class='text-center'>Mrp</th>
            </tr>
          </thead>
          <tbody id='osRecords'>
            <?PHP osRecordDisplay(); ?>
          </tbody>
        </table>
      </div>


      <div class="alert alert-success text-center border border-success" id="pdRecordDisplayClick">
        Painding Dues
      </div>
      <div id="pdRecordDisplay">
        <form id="payDue" onsubmit="return false">
          <table align='center' style='width: 800px;'>
            <thead>
              <tr>
                <th class='text-center'>Invoice No.</th>
                <th class='text-center'>Patient Name</th>
                <th class='text-center'>Invoice Date</th>
                <th class='text-center'>Net Total</th>
                <th class='text-center'>Paid Amount</th>
                <th class='text-center'>Due</th>
                <th class='text-center'>Pay</th>
              </tr>
            </thead>
            <tbody id='pdRecords'>
              <?PHP pdRecordDisplay(); ?>
            </tbody>
          </table>
        </form>
      </div>



      <div>

      </div>



    </div>
  </div>
</body>

</html>