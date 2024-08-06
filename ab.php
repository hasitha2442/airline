<?php
include("ab.html");
if(isset($_POST['ab_type']) && isset($_POST['ab_date']) && isset($_POST['ab_des']))
{
    $sname="localhost";
    $password="";
    $db_name="airline";
    $uname="root";
    $ab_type=$_POST['ab_type'];
    $ab_date=$_POST['ab_date'];
    $ab_des=$_POST['ab_des'];   
    $ab_id=uniqid(rand(),true);
    $ab_id=substr($ab_id, 14, 8);
    $conn = mysqli_connect($sname , $uname , $password , $db_name);
    if(!$conn)
    {
        echo "connection failed!";
        exit();
    }
    if( empty($ab_id) || empty($ab_type) || empty($ab_date) || empty($ab_des))
    {
        header("location : ab.php");
    }
    else{
        $sql="INSERT INTO `ab`(`ab_id` ,`ab_type` ,`ab_date` ,`ab_des` ) VALUES ('$ab_id','$ab_type','$ab_date','$ab_des')";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo "<p class='disp1'>YOUR DETAILS ENTERED SUCCESSFULLY!</p>";
            echo "<p class='disp2'>your uniue id is $ab_id</p>";
            echo "<button class='btn1'><p ><a href='tb.html'><i>TIKECT BOOKING</i></a></p></button>";
        }
        else{
        echo "YOUR MESSAGE COULD NOT BE SENT !";
    }
    }
}
else
{
    header("LOCATION: ab.php");
}
 ?>

