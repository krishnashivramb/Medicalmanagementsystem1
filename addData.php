<?php 
include("server.php");
$username = $_SESSION['username'];
$manufacturer = "";
$productName = "";
$batchNo = "";
$mfg = "";
$exp = "";
$mrp = "";
$qty = "";
$strips = "";
$tabs = "";
$category = "";
$errors1 = array();
$storeName = "";

$db = mysqli_connect('localhost','root','','AppData');

if(!$db){
    header('location: test.php');
}
else{
global $db;
global $username;
$query1 = "SELECT storeName FROM `storedata` WHERE username = '$username'" ;

$result = mysqli_query($db,$query1);
while($row = mysqli_fetch_array($result)){
    global $storeName;
    $storeName = $row['storeName'];
    $db2 = mysqli_connect('localhost','root','',$storeName);
       if(!$db2){
        header('location: test.php');
    }else{

        if(isset($_POST['mbtn'])){
         global $db2;
         $manufacturer = $_POST['manufacturer'];
    $productName = $_POST['productName'];
    $batchNo = $_POST['batchNo'];
    $mfg = $_POST['mfg'];
    $exp = $_POST['exp'];
    
    
    $mrp = $_POST['mrp'];
    $qty = $_POST['qty'];
    $category = $_POST['category'];
    
    if ($category == "tablet" OR $category == "capsule") {
        $strips = $_POST['strips'];
        $tabs = $_POST['tabs'];
        $mrp = $_POST['mrp']/$tabs;
        $qty = $_POST['tabs'] * $_POST['strips'];
    }else{
        $strips = 0;
        $tabs = 0;

    }


         $query2 = "INSERT INTO `medicines` (`manufacturer`, `productName`, `batchNo`, `mfg`, `exp`, `qty`, `strips`, `tabs`, `mrp`, `category`) VALUES('$manufacturer','$productName','$batchNo','$mfg','$exp','$qty','$strips','$tabs','$mrp','$category')";
    
            if (mysqli_query($db2,$query2)) {
             unset($_POST['mbtn']);
             header('location: add.php');
            } else {
                header('location: test.php');
            }
        }

        if(isset($_POST['sbtn'])){
         global $db2;
         
    $productName = $_POST['productName'];
    $batchNo = $_POST['batchNo'];
    $mfg = $_POST['mfg'];
    $exp = $_POST['exp'];
    $mrp = $_POST['mrp'];
    $qty = $_POST['qty'];
    
         $query3 = "INSERT INTO `surgical` (`productName`, `batchNo`, `mfg`, `exp`, `qty`, `mrp`) VALUES ('$productName', '$batchNo', '$mfg', '$exp', '$qty', '$mrp');";
    
            if (mysqli_query($db2,$query3)) {
             unset($_POST['sbtn']);
             header('location: add.php');
            } else {
                header('location: test.php');
            }
        }

        if(isset($_POST['cbtn'])){
         global $db2;
         $productName = $_POST['productName'];
    $batchNo = $_POST['batchNo'];
    $mfg = $_POST['mfg'];
    $exp = $_POST['exp'];
    $mrp = $_POST['mrp'];
    $qty = $_POST['qty'];
    
         $query4 = "INSERT INTO `cosmetics` (`productName`, `batchNo`, `mfg`, `exp`, `qty`, `mrp`) VALUES ('$productName', '$batchNo', '$mfg', '$exp', '$qty', '$mrp');";
    
         if (mysqli_query($db2,$query4)) {
             unset($_POST['cbtn']);
             header('location: add.php');
            } else {
                header('location: test.php');
            }
        }
    
    }
}






}

?>
