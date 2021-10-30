<?PHP
include("server.php");
$username = $_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'AppData');
$pdcount = 0;
$oscount = 0;
$currentDate = date("Y-m-d");
$ecount = 0;
$necount = 0;

if (!$db) {
    //direct to error page
    header('location: test.php');
} else {
    global $db;
    global $username;
    $query1 = "SELECT storeName,address,slogan FROM `storedata` WHERE username = '$username'";
    $result = mysqli_query($db, $query1);
    while ($row = mysqli_fetch_array($result)) {
        global $storeName;
        $storeName = $row['storeName'];
        $address = $row['address'];
        $slogan = $row['slogan'];

        $db2 = mysqli_connect('localhost', 'root', '', $storeName);
        if (!$db2) {
            //direct to error page
            header('location: test.php');
        } else {
            //get number of pending dues
            $getDues = "SELECT * FROM invoice WHERE due > 0";
            $result1 = mysqli_query($db2, $getDues);
            $pdcount = mysqli_num_rows($result1);

            //get number of outof stock products
            $getQty = "SELECT batchNo FROM medicines WHERE qty = 0 UNION SELECT batchNo FROM surgical WHERE qty = 0 UNION SELECT batchNo FROM cosmetics WHERE qty = 0";
            $result2 = mysqli_query($db2, $getQty);
            $oscount = mysqli_num_rows($result2);

            //get number of experied products
            $getExpiredProduct = "SELECT productName,batchNo,exp FROM medicines UNION SELECT productName,batchNo,exp FROM surgical UNION SELECT productName,batchNo,exp FROM cosmetics";
            $result3 = mysqli_query($db2, $getExpiredProduct);
            function expProducts()
            {
                global $result3, $currentDate, $ecount, $necount;
                while ($row = mysqli_fetch_array($result3)) {


                    $currentDate = date("Y-m-d");
                    if (strtotime($row['exp']) <= strtotime($currentDate)) {
                        $ecount++;
                    }
                    $currentDate1 = date_create(date("Y-m-d")); //date_create("2021-04-10");
                    date_add($currentDate1, date_interval_create_from_date_string("30 days"));
                    $currentDate1 = date_format($currentDate1, "Y-m-d");

                    if (strtotime($row['exp']) <= strtotime($currentDate1)) {
                        $necount++;
                    }
                }
            }


            function epRecordDisplay()
            {
                global $db2;
                $getExpiredProduct = "SELECT productName,batchNo,exp,qty,mrp FROM medicines UNION SELECT productName,batchNo,exp,qty,mrp FROM surgical UNION SELECT productName,batchNo,exp,qty,mrp FROM cosmetics";
                $result3 = mysqli_query($db2, $getExpiredProduct);


                while ($row = mysqli_fetch_array($result3)) {
                    $currentDate = date("Y-m-d");
                    if (strtotime($row['exp']) <= strtotime($currentDate)) {
                        echo "<tr height='40px'>
                            <td class='text-center'>" . $row['batchNo'] . "</td>
                            <td class='text-center'>" . $row['productName'] . "</td>
                            <td class='text-center'>" . $row['exp'] . "</td>
                            <td class='text-center'>" . $row['qty'] . "</td>
                            <td class='text-center'>" . $row['mrp'] . "</td>
                        </tr>";
                    }
                }
            }


            function nepRecordDisplay()
            {
                global $db2;
                $getExpiredProduct = "SELECT productName,batchNo,exp,qty,mrp FROM medicines UNION SELECT productName,batchNo,exp,qty,mrp FROM surgical UNION SELECT productName,batchNo,exp,qty,mrp FROM cosmetics";
                $result3 = mysqli_query($db2, $getExpiredProduct);


                while ($row = mysqli_fetch_array($result3)) {
                    $currentDate1 = date_create(date("Y-m-d")); //date_create("2021-04-10");
                    date_add($currentDate1, date_interval_create_from_date_string("30 days"));
                    $currentDate1 = date_format($currentDate1, "Y-m-d");

                    if (strtotime($row['exp']) <= strtotime($currentDate1)) {
                        echo "<tr height='40px'>
                            <td class='text-center'>" . $row['batchNo'] . "</td>
                            <td class='text-center'>" . $row['productName'] . "</td>
                            <td class='text-center'>" . $row['exp'] . "</td>
                            <td class='text-center'>" . $row['qty'] . "</td>
                            <td class='text-center'>" . $row['mrp'] . "</td>
                        </tr>";
                    }
                }
            }



            function osRecordDisplay()
            {
                global $db2;
                $getExpiredProduct = "SELECT productName,batchNo,exp,qty,mrp FROM medicines WHERE qty = 0 UNION SELECT productName,batchNo,exp,qty,mrp FROM surgical WHERE qty = 0 UNION SELECT productName,batchNo,exp,qty,mrp FROM cosmetics WHERE qty = 0";
                $result3 = mysqli_query($db2, $getExpiredProduct);
                while ($row = mysqli_fetch_array($result3)) {


                    echo "<tr height='40px'>
                            <td class='text-center'>" . $row['batchNo'] . "</td>
                            <td class='text-center'>" . $row['productName'] . "</td>
                            <td class='text-center'>" . $row['exp'] . "</td>
                            <td class='text-center'>" . $row['qty'] . "</td>
                            <td class='text-center'>" . $row['mrp'] . "</td>
                        </tr>";
                }
            }



            function pdRecordDisplay()
            {
                global $db2;
                $getDues = "SELECT * FROM invoice WHERE due > 0";
                $result1 = mysqli_query($db2, $getDues);

                while ($row = mysqli_fetch_array($result1)) {


                    echo "<tr height='40px'>
                            <td width='90px' class='text-center invoiceNo'>" . $row['invoiceNo'] . "</td>
                            <td class='text-center patientName'>" . $row['patientName'] . "</td>
                            <td class='text-center'>" . $row['invoiceDate'] . "</td>
                            <td class='text-center netTotal'>" . $row['netTotal'] . "</td>
                            <td class='text-center paidAmount'>" . $row['paidAmount'] . "</td>
                            <td class='text-center due'>" . $row['due'] . "</td>
                            <td class='text-center pay' data-toggle='modal' data-target='#exampleModal'>--></td>
                        </tr>";
                }
            }
        }
    }
}
