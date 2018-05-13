<?php 

session_start();
$uname=$_POST['uname'];
$password=$_POST['password'];
$userSession=$_COOKIE['s_id'];
$csr=$_POST['csr'];

if(empty($uname) || empty($password)){

    echo "Please fill all the required fields\n";

}else{
    
    if($uname="admin" && $password="admin" && $userSession=session_id() && $csr=$_SESSION['token']){
        echo "Login successful, Hello admin";
    }else{
        echo "Login un-successful";
    }

}
?>