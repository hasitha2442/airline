<?php
include("tb.html");
if(isset($_POST['tb_type']) && isset($_POST['tb_date']) && isset($_POST['tb_des']))
{
    $sname="localhost";
    $password="";
    $db_name="airline";
    $uname="root";
    $tb_type=$_POST['tb_type'];
    $tb_date=$_POST['tb_date'];
    $tb_des=$_POST['tb_des'];   
    $tb_id=uniqid(rand(),true);
    $tb_id=substr($tb_id, 14, 8);
    $conn = mysqli_connect($sname , $uname , $password , $db_name);
    if(!$conn)
    {
        echo "connection failed!";
        exit();
    }
    if( empty($tb_id) || empty($tb_type) || empty($tb_date) || empty($tb_des))
    {
        header("location : tb.php");
    }
    else{
        $sql="INSERT INTO `tb`(`tb_id` ,`tb_type` ,`tb_date` ,`tb_des` ) VALUES ('$tb_id','$tb_type','$tb_date','$tb_des')";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo "<p class='disp1'>YOUR DETAILS ENTERED SUCCESSFULLY!</p>";
            echo "<p class='disp2'>your uniue id is $tb_id</p>";
            echo "<button class='btn1'><p ><a href='main.html'><i>home</i></a></p></button>";
        }
        else{
        echo "YOUR MESSAGE COULD NOT BE SENT !";
    }
    }
}
else
{
    header("LOCATION: tb.php");
}
 ?>

