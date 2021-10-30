<?PHP
include("server.php");
$username = $_SESSION['username'];
$db = mysqli_connect('localhost','root','','AppData');



if(!$db){
    header('location: test.php');
}else{
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

    		if(isset($_POST['getNewOrderItem'])){
    			
    			$selectAllRecords = "SELECT productName,batchNo,mfg,exp,qty,mrp FROM medicines UNION SELECT productName,batchNo,mfg,exp,qty,mrp FROM cosmetics UNION SELECT productName,batchNo,mfg,exp,qty,mrp FROM surgical";
    			$result = mysqli_query($db2,$selectAllRecords);
    			
    				?>

    					  <tr>
                            <td><b class="number">1</b></td>
                            <td width="170px">
                              <select name="pid[]" class="form-control form-control-sm batchNo" required>
                                <option>Select Product ...</option>
                                <?PHP 
                                	while ($row = mysqli_fetch_array($result)) {
                                		?> <option value="<?PHP echo $row['batchNo'] ?>"> <?PHP echo $row['productName'] ?> </option> <?PHP
                                	}
                                 ?>
                              </select>
                            </td>
                            <td><input type="text" name="tqty[]" class="form-control form-control-sm tqty" readonly></td>
                            <td><input type="text" name="qty[]" class="form-control form-control-sm qty" required></td>
                            <td><input type="text" name="mrp[]" class="form-control form-control-sm mrp" readonly></td>
                            
                            <td>Rs. <span class="amt text-center">0</span></td>
                            <td><input type="hidden" name="productName[]" class="form-control form-control-sm productName" readonly></td>
                          </tr>

    				<?PHP
    				exit();
    			
    		}

            if(isset($_POST['getMrpAndQty'])){
                $batch = $_POST['batch'];
                $selectRecord = "SELECT productName,batchNo,mfg,exp,qty,mrp FROM medicines WHERE batchNo='$batch' UNION SELECT productName,batchNo,mfg,exp,qty,mrp FROM cosmetics WHERE batchNo='$batch' UNION SELECT productName,batchNo,mfg,exp,qty,mrp FROM surgical WHERE batchNo='$batch'";
                $result = mysqli_query($db2,$selectRecord);
                $row = mysqli_fetch_array($result);
                echo json_encode($row);
                

                
            }

            if(isset($_POST['orderDate']) AND isset($_POST['custName'])){
                $orderDate = $_POST['orderDate'];
                $custName = $_POST['custName'];

                $ar_batch = $_POST['pid'];
                $ar_tqty = $_POST['tqty'];
                $ar_qty = $_POST['qty'];
                $ar_mrp = $_POST['mrp'];
                $ar_productName = $_POST['productName'];

                $subTotal = $_POST['subTotal'];
                $gst = $_POST['gst'];
                $netTotal = $_POST['netTotal'];
                $paid = $_POST['paid'];
                $due = $_POST['due'];
                $paymentMethod = $_POST['paymentType'];

                $invoice = "INSERT INTO `invoice`(`patientName`, `invoiceDate`, `subTotal`, `gstTax`, `netTotal`, `paidAmount`, `due`, `paymentMethod`) VALUES ('$custName','$orderDate','$subTotal','$gst','$netTotal','$paid','$due','$paymentMethod')";
                $result72 = mysqli_query($db2,$invoice);
                $invoiceNo = mysqli_insert_id($db2);
                $_SESSION["invoiceNo"] = $invoiceNo;
                if($invoiceNo != NULL){
                    for ($i=0; $i <count($ar_mrp) ; $i++) { 

                        $remQty = $ar_tqty[$i] - $ar_qty[$i];
                        if($remQty < 0){
                            return "ORDER FAIL TO COMPLETE";
                        }else{
                                mysqli_query($db2,"UPDATE medicines SET qty='$remQty' WHERE batchNo = '$ar_batch[$i]' ");
                                mysqli_query($db2,"UPDATE surgical SET qty='$remQty' WHERE batchNo = '$ar_batch[$i]' ");
                                mysqli_query($db2,"UPDATE cosmetics SET qty='$remQty' WHERE batchNo = '$ar_batch[$i]' ");
                        }


                      $invoiceDetails = "INSERT INTO `invoicedetails`(`invoiceNo`, `productName`, `mrp`, `qty`) VALUES ('$invoiceNo','$ar_productName[$i]','$ar_mrp[$i]','$ar_qty[$i]')";
                        mysqli_query($db2,$invoiceDetails);
                    }
                    echo "ORDER_COMPLETED_!";
                    
                }



            }
    	}


    }
}
?>