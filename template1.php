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
    		
    	}
	}
}


?>