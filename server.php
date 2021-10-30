<?PHP

session_start();

    $username = "";
    $email = "";
    $storeName = "";
    $password = "";
    $cpassword = "";
    $slogan = "";
$errors = array();




//make connection with database
 $db = mysqli_connect('localhost','root','','AppData');


//if regester button is chwcked
if(isset($_POST['regester'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $storeName = $_POST['storeName'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $slogan = $_POST['slogan'];
    
    //check whether the form fielda are eempty or not
    if(empty($username)){
        array_push($errors, "Username field is empty");
    }
    if(empty($email)){
        array_push($errors, "Email field is empty");
    }
    if(empty($storeName)){
        array_push($errors, "Store Name field is empty");
    }
    if(empty($address)){
        array_push($errors, "Address field is empty");
    }
    if(empty($password)){
        array_push($errors, "Password field is empty");
    }
    if($password != $cpassword){
        array_push($errors, "both passwords do not match");
    }
       
    //if there is no any errors then push data into database
    if(count($errors) == 0){
        $sql = "INSERT INTO `StoreData` (`username`, `email`, `storeName`, `address`,`password`, `slogan`) VALUES('$username','$email','$storeName','$address','$password','$slogan')";
        

        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['storeName'] = $storeName;
        include("newdb.php");
        if(count($errors) == 0){
            header('location: signin.php');
        }
        
    }
       
}
    
//now log in user from log in page
    
//if log in button is checked
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //checks whether the form fields are empty or not
    
    if(empty($username)){
        array_push($errors,"Username is empty");
    }
    if(empty($password)){
        array_push($errors,"Password is empty");
    }
    
    //If there are no any errors
    
    if(count($errors) == 0){
        
        $query = "SELECT * FROM storeData WHERE username='$username' AND password='$password'";
        
        $result = mysqli_query($db,$query);
        //if record found
        if(mysqli_num_rows($result) == 1){
            //log user in
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
             $_SESSION['storeName'] = $storeName;
            
            header('location: home.php');
        }else{
            array_push($errors,"Wrong username/password combination");
                
        }
        
    }
    
}


//for log out
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:signin.php');
}






?>