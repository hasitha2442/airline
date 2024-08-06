<?php
include("pass.html");
if(isset($_POST['pass_name']) && isset($_POST['pass_mobile']) && isset($_POST['pass_mail']) && isset($_POST['pass_usn']) && isset($_POST['pass_password'])  && isset($_POST['pass_add']))
{
    $sname="localhost";
    $password="";
    $db_name="airline";
    $uname="root";
    $pass_name=$_POST['pass_name'];
    $pass_mobile=$_POST['pass_mobile'];
    $pass_mail=$_POST['pass_mail'];
    $pass_usn=$_POST['pass_usn'];
    $pass_password=$_POST['pass_password'];
    $pass_add=$_POST['pass_add'];
    $pass_id=uniqid(rand(),true);
    $pass_id=substr($pass_id, 14, 8);
    $phc='/^[0-9]{10,10}$/'; 
    $conn = mysqli_connect($sname , $uname , $password , $db_name);
    if(!$conn)
    {
        echo "connection failed!";
        exit();
    }
    try {
    if(empty($pass_add) || empty($pass_mail) || empty($pass_mobile) || empty($pass_name) || empty($pass_password) || empty($pass_usn) || empty($pass_id))
    {
        header("location : pass.php");
    }
    else{
        if(preg_match($phc,$pass_mobile) && $pass_mobile[0]>=6){
        $sql="INSERT INTO `pass`(`pass_add` ,`pass_mail`, `pass_mobile`,`pass_name`,`pass_password`,`pass_usn` ,`pass_id`) VALUES ('$pass_add','$pass_mail','$pass_mobile','$pass_name','$pass_password','$pass_usn','$pass_id')";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo "<p class='disp1'>YOUR DETAILS ENTERED SUCCESSFULLY!</p>";
            echo "<p class='disp2'>your uniue id is $pass_id</p>";
            
        }
    }
    else
    {
        echo "<p class='disp1'>INVALID MOBILE NUMBER!.........</P>";
    }
    }
    } catch (Exception $e) {
        echo "<p class='disp1'>DETAILS ALREADY EXISTS!.........</p>";
    }
}
else
{
    header("LOCATION: pass.php");
}
 ?>

