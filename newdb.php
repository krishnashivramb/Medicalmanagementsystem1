<?PHP

$db1 = mysqli_connect('localhost','root','');

$sql1 = "CREATE DATABASE $storeName";
        
        
        if (mysqli_query($db1, $sql1)) {
          
        } else {
            array_push($errors, "can not create database");
        }
        $db =  mysqli_connect('localhost','root','',$storeName);
        $sql2 = "CREATE TABLE medicines(manufacturer VARCHAR(50),productName VARCHAR(50),batchNo VARCHAR(50),mfg DATETIME,exp DATETIME,qty INT, strips INT, tabs INT, mrp DOUBLE,category VARCHAR(30))";
        $sql3 = "CREATE TABLE surgical(productName VARCHAR(50),batchNo VARCHAR(50),mfg DATETIME,exp DATETIME,qty INT, mrp DOUBLE)";
        $sql4 = "CREATE TABLE cosmetics(productName VARCHAR(50),batchNo VARCHAR(50),mfg DATETIME,exp DATETIME,qty INT, mrp DOUBLE)";
        $sql5 = "CREATE TABLE invoice(invoiceNo INT PRIMARY KEY AUTO_INCREMENT,patientName VARCHAR(50),invoiceDate DATE,subTotal DOUBLE,gstTax DOUBLE,netTotal INT,paidAmount INT,due INT,paymentMethod VARCHAR(50))";
        $sql6 = "CREATE TABLE invoiceDetails (id INT PRIMARY KEY AUTO_INCREMENT,invoiceNo INT,productName VARCHAR(50),mrp DOUBLE,qty INT,FOREIGN KEY(invoiceNo) REFERENCES invoice (invoiceNo))";

        mysqli_query($db,$sql2);
        mysqli_query($db,$sql3);
        mysqli_query($db,$sql4);
        mysqli_query($db,$sql5);
        mysqli_query($db,$sql6);
        $_SESSION['username'] = $username;
        $_SESSION['storeName'] = $storeName;

?>


