<?PHP
include_once("fpdf184/fpdf.php");
include("server.php");
$username = $_SESSION['username'];
$invoiceNo = $_SESSION['invoiceNo'];
$db = mysqli_connect('localhost','root','','AppData');

if(!$db){
    header('location: test.php');
}else{
	global $db;
	global $username;
	$query1 = "SELECT storeName,address FROM `storedata` WHERE username = '$username'" ;
	$result = mysqli_query($db,$query1);
	while($row = mysqli_fetch_array($result)){
		global $storeName;
    	$storeName = $row['storeName'];
    	$address = $row['address'];
    	$_SESSION['address'] = $address;
    	$db2 = mysqli_connect('localhost','root','',$storeName);
    	if(!$db2){
        header('location: test.php');
    	}else{
				if($_GET['orderDate']){
				$pdf = new FPDF();
				$pdf->AddPage();
				
				$pdf->SetFont('Arial','B',20);
			
				$pdf->Cell(190,10,$storeName,0,1,'C');

				$pdf->SetFont('Arial','I',10);
	
				$pdf->Cell(190,10,$address,0,1,'C');

				$pdf->Cell(190,10,"",0,1);

				$pdf->SetFont('Arial',"B",12);
				

				$pdf->Cell(40,10,"Invoice Date",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(40,10,".: ".$_GET['orderDate'],0,1);
				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(40,10,"Patient Name",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(40,10,".: ".$_GET['custName'],0,1);

				$pdf->Cell(190,10,"",0,1);

				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(10,10,"#",1,0,"C");
				$pdf->Cell(70,10,"Product Name",1,0,"C");
				$pdf->Cell(30,10,"Quantity",1,0,"C");
				$pdf->Cell(40,10,"Price",1,0,"C");
				$pdf->Cell(40,10,"Total (Rs.)",1,1,"C");

				$pdf->SetFont('Arial',null,12);
				for($i=0;$i < count($_GET['pid']);$i++){
					$pdf->Cell(10,10,($i+1),1,0,"C");
					$pdf->Cell(70,10,$_GET['productName'][$i],1,0,"C");
					$pdf->Cell(30,10,$_GET['qty'][$i],1,0,"C");
					$pdf->Cell(40,10,$_GET['mrp'][$i],1,0,"C");
					$pdf->Cell(40,10,$_GET['mrp'][$i] * $_GET['qty'][$i],1,1,"C");
				}

				$pdf->Cell(50,10,"",0,1);

				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(50,10,"Sub Total",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(50,10,".: ".$_GET['subTotal'],0,1);
				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(50,10,"GST tax",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(50,10,".: ".$_GET['gst'],0,1);
				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(50,10,"Net Total",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(50,10,".: ".$_GET['netTotal'],0,1);
				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(50,10,"Paid Amount",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(50,10,".: ".$_GET['paid'],0,1);
				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(50,10,"Due Amount",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(50,10,".: ".$_GET['due'],0,1);
				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(50,10,"Payment Type",0,0);
				$pdf->SetFont('Arial',null,12);
				$pdf->Cell(50,10,".: ".$_GET['paymentType'],0,1);

				$pdf->Cell(50,10,"",0,1);
				$pdf->Cell(50,10,"",0,1);
				$pdf->Cell(50,10,"",0,1);
				$pdf->SetFont('Arial',"B",12);
				$pdf->Cell(180,10,"Signature",0,0,"R");
				

				$pdf->SetY(-35);
			 
			    $pdf->SetFont('Arial','I',8);
			    
			 


				$pdf->Output("invoicePDFs/invoice".$invoiceNo."_".$_GET['custName']."_".$_GET['orderDate'].".pdf","F");
				$pdf->Output();
			}


    	}
    }
}
