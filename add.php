<?PHP
include('addData.php');

if (empty($_SESSION['username'])) {
  header('location:signin.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Add Medicine Page ...</title>


  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/addStyle.css">
  <link rel="stylesheet" href="css/menuStyle.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/menuJs.js"></script>
  <script type="text/javascript" src="js/angular.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Chewy|Coiny" rel="stylesheet">

</head>

<body ng-app="">
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

  <div class="addPage">

    <div class="title">
      <p>Add <br> Medicine</p>
    </div>

    <div class="pageContent">

      <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
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

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="medicine" role="tabpanel" aria-labelledby="medicine-tab">

          <form class="medicineform" action="add.php" method="POST">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="manufacturer">Manufacturer :.</label>
                  <input type="text" name="manufacturer" class="form-control" placeholder="Enter manufacturer ...">
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="productName">Product Name :.</label>
                  <input type="text" name="productName" class="form-control" placeholder="Enter Product Name ...">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="batchNo">Batch Number :.</label>
                  <input type="text" name="batchNo" class="form-control" placeholder="Enter Batch Number pof product ...">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="mfgDate">MFG Date :.</label>
                  <input type="date" ng-model="date" name="mfg" class="form-control">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="expDate">EXP Date :.</label>
                  <input type="date" name="exp" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="category">Category :.</label>
                  <select class="form-control" ng-model="category" name="category" id="category">
                    <option value=" " selected>Select Category ...</option>
                    <option value="tablet">Tablet</option>
                    <option value="capsul">Capsul</option>
                    <option value="oinment">Oinment</option>
                    <option value="syrup">Syrup</option>
                    <option value="gel">Gel</option>
                    <option value="sprey">Sprey</option>
                    <option value="drop">Drop</option>
                    <option value="lotion">lotion</option>
                  </select>
                </div>
              </div>
            </div>


            <div class="" ng-switch="category">
              <div ng-switch-when="tablet">
                <label for="category">Quantity :.</label>
                <div class="row form-group">
                  <div class="col-sm-4">
                    <input type="number" name="tabs" class="form-control" ng-model="tabs" placeholder="Enter Tablets in each strips ..">
                  </div>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="strips" ng-model="strips" placeholder="Enter strips ..">
                  </div>
                  <div class="col-sm-1">
                    <h4>=</h4>
                  </div>
                  <div class="col-sm-3">

                    {{tabs*strips}}
                  </div>
                </div>

                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" ng-model="mrp" name="mrp" placeholder="Price per strip" class="form-control">
                    </div>
                    <div class="col-sm-7 text-right">
                      Cost of single tablet is <h3>{{mrp/tabs}} &#8377;</h3>
                    </div>
                  </div>
                </div>
              </div>

              <div ng-switch-when="capsul">
                <label for="category">Quantity :.</label>
                <div class="row form-group">
                  <div class="col-sm-4">
                    <input type="number" name="tabs" class="form-control" ng-model="tabs" placeholder="Enter Capsules in each strips ..">
                  </div>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="strips" ng-model="strips" placeholder="Enter strips ..">
                  </div>
                  <div class="col-sm-1">
                    <h4>=</h4>
                  </div>
                  <div class="col-sm-3">
                    {{tabs*strips}}
                  </div>
                </div>

                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" name="mrp" ng-model="mrp" placeholder="Price per strip" class="form-control">
                    </div>
                    <div class="col-sm-7 text-right">
                      Cost of single capsule is <h3>{{mrp/tabs}} &#8377;</h3>
                    </div>
                  </div>
                </div>
              </div>

              <div ng-switch-when="syrup">
                <div class="form-group">
                  <label for="quantity">Quantity :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="number" placeholder="Totaol number of product ..." name="qty" ng-model="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" name="mrp" ng-model="mrp" placeholder="Price per Product .." class="form-control">
                    </div>
                  </div>
                </div>
              </div>

              <div ng-switch-when="oinment">
                <div class="form-group">
                  <label for="quantity">Quantity :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="number" placeholder="Totaol number of product ..." name="qty" ng-model="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" ng-model="mrp" name="mrp" placeholder="Price per Product .." class="form-control">
                    </div>
                  </div>
                </div>
              </div>

              <div ng-switch-when="gel">
                <div class="form-group">
                  <label for="quantity">Quantity :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="number" placeholder="Totaol number of product ..." name="qty" ng-model="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" ng-model="mrp" name="mrp" placeholder="Price per Product .." class="form-control">
                    </div>
                  </div>
                </div>
              </div>

              <div ng-switch-when="sprey">
                <div class="form-group">
                  <label for="quantity">Quantity :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="number" placeholder="Totaol number of product ..." name="qty" ng-model="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" ng-model="mrp" name="mrp" placeholder="Price per Product .." class="form-control">
                    </div>
                  </div>
                </div>
              </div>

              <div ng-switch-when="drop">
                <div class="form-group">
                  <label for="quantity">Quantity :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="number" placeholder="Totaol number of product ..." name="qty" ng-model="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" ng-model="mrp" name="mrp" placeholder="Price per Product .." class="form-control">
                    </div>
                  </div>
                </div>
              </div>

              <div ng-switch-when="lotion">
                <div class="form-group">
                  <label for="quantity">Quantity :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="number" placeholder="Totaol number of product ..." name="qty" ng-model="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mrp">MRP :.</label>
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="text" ng-model="mrp" name="mrp" placeholder="Price per Product .." class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button type="submit" name="mbtn" class="addButton btn">Add Medicine</button>

          </form>
        </div>
        <div class="tab-pane fade" id="surgical" role="tabpanel" aria-labelledby="surgical-tab">

          <form class="surgicalForm" method="POST" action="add.php">
            <div class="form-group">
              <label for="productName">Product Name :.</label>
              <div class="row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="productName" placeholder="Enter product name ..">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="batchNo">Batch Number :.</label>
                  <input type="text" name="batchNo" class="form-control" placeholder="Enter Batch Number pof product ...">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="mfgDate">MFG Date :.</label>
                  <input type="date" name="mfg" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="expDate">EXP Date :.</label>
                  <input type="date" name="exp" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="quantity">Quantity :.</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="number" class="form-control" name="qty" placeholder="Enter total number of products ..">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="mrp">MRP :.</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="mrp" placeholder="Enter price per products ..">
                </div>
              </div>
            </div>
            <button type="submit" name="sbtn" class="addButton btn">Add Product</button>
          </form>

        </div>
        <div class="tab-pane fade" id="cosmetics" role="tabpanel" aria-labelledby="cosmetics-tab">

          <form class="cosmeticsForm" action="add.php" method="POST">
            <div class="form-group">
              <label for="productName">Product Name :.</label>
              <div class="row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="productName" placeholder="Enter product name ..">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="batchNo">Batch Number :.</label>
                  <input type="text" name="batchNo" class="form-control" placeholder="Enter Batch Number pof product ...">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="mfgDate">MFG Date :.</label>
                  <input type="date" name="mfg" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="expDate">EXP Date :.</label>
                  <input type="date" name="exp" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="quantity">Quantity :.</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="number" class="form-control" name="qty" placeholder="Enter total number of products ..">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="mrp">MRP :.</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="mrp" placeholder="Enter price per products ..">
                </div>
              </div>
            </div>
            <button type="submit" name="cbtn" class="addButton btn">Add Product</button>
          </form>


        </div>
      </div>




    </div>
  </div>
</body>

</html>