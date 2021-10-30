<?PHP
include('billData.php');
if (empty($_SESSION['username'])) {
  header('location:signin.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Billing Page ...</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/billStyle.css">
  <link rel="stylesheet" href="css/menuStyle.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/menuJs.js"></script>
  <script type="text/javascript" src="js/billJs.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">

</head>

<body>
  <div class="fullMenu">
    <div id="bg">

      <!-- <img src="img/bg2.png" alt="BackgroundImage" /> -->

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
      <p>Generate<br>Bill</p>
    </div>
    <div class="pageContent">



      <div class="container">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <div class="card" style="box-shadow: 0 0 25px 0 lightgray;">
              <div class="card-header">
                <h4>New Invoice ...</h4>
              </div>
              <div class="card-body">
                <form id="getOrderData" onsubmit="return false">
                  <div class="form-group row">
                    <label class="col-sm-3 text-right">Order Date</label>
                    <div class="col-sm-6">
                      <input type="text" id="orderDate" name="orderDate" readonly class="form-control form-control-sm" value="<?PHP echo date('Y-m-d'); ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 text-right">Patient Name</label>
                    <div class="col-sm-6">
                      <input type="text" id="custName" name="custName" class="form-control form-control-sm" placeholder="Enter patient name ... " required>
                    </div>
                  </div>

                  <div class="card" style="box-shadow: 0 0 15px 0 lightgray;">
                    <div class="card-body">
                      <h3>Make a order list</h3>
                      <table align="center" style="width: 800px;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="text-center">Item Name</th>
                            <th class="text-center">Total Quantity</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>

                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody id="invoiceItem">


                        </tbody>

                      </table>
                      <center style="padding: 10px;">
                        <button id="add" class="btn btn-success" style="width: 150px;">Add</button>
                        <button id="remove" class="btn btn-danger" style="width: 150px;">Remove</button>
                      </center>
                    </div>
                  </div>

                  <p></p>
                  <div class="form-group row">
                    <label for="subTotal" class="col-sm-3 text-right col-form-label">Sub Total</label>
                    <div class="col-sm-6">
                      <input type="text" name="subTotal" class="form-control form-control-sm" id="subTotal" readonly />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="gst" class="col-sm-3 text-right col-form-label">GST (18%)</label>
                    <div class="col-sm-6">
                      <input type="text" name="gst" class="form-control form-control-sm" id="gst" readonly />
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="netTotal" class="col-sm-3 text-right col-form-label">Net Total</label>
                    <div class="col-sm-6">
                      <input type="text" name="netTotal" class="form-control form-control-sm" id="netTotal" readonly />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="paid" class="col-sm-3 text-right col-form-label">Paid</label>
                    <div class="col-sm-6">
                      <input type="text" name="paid" class="form-control form-control-sm" id="paid" required />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="due" class="col-sm-3 text-right col-form-label">Due</label>
                    <div class="col-sm-6">
                      <input type="text" name="due" class="form-control form-control-sm" id="due" readonly />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="paymentType" class="col-sm-3 text-right col-form-label">Payment Method</label>
                    <div class="col-sm-6">
                      <select name="paymentType" class="form-control form-control-sm" id="paymentType" required />
                      <option>Cash</option>
                      <option>Card</option>
                      <option>Draft</option>
                      <option>UPI</option>

                      </select>
                    </div>
                  </div>

                  <center>
                    <input type="submit" id="orderForm" style="width: 150px;" class="btn btn-info" value="Order">
                    <input type="submit" id="printInvoice" style="width: 150px;" class="btn btn-success d-none" value="Print Invoice">
                  </center>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
</body>

</html>