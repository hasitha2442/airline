<?php
include("tenq.html");
if( isset($_POST['tb_id']) && isset($_POST['tenq_type']) && isset($_POST['tenq_date']) && isset($_POST['tenq_title']) && isset($_POST['tenq_des']))
{
    session_start();
    $sname="localhost";
    $tenqword="";
    $db_name="airline";
    $uname="root";
    $tb_id=$_POST['tb_id'];
    $tenq_tile=$_POST['tenq_title'];
    $tenq_type=$_POST['tenq_type'];
    $tenq_date=$_POST['tenq_date'];
    $tenq_des=$_POST['tenq_des'];
    $tenq_id=uniqid(rand(),true);
    $tenq_id=substr($tenq_id, 14, 8);
    $conn = mysqli_connect($sname , $uname , $tenqword , $db_name);
    $_SESSION['tb_id'] = $tb_id;
    if(!$conn)
    {
        echo "connection failed!";
        exit();
    }
    $check= mysqli_query($conn, "select * from `tb` where tb_id='$tb_id';");
    if(mysqli_num_rows($check)>0)
    {
    if(empty($tenq_date) || empty($tenq_type) || empty($tenq_des) || empty($tenq_id))
    {
        header("location : tenq.php");
    }
    else{
        $sql="INSERT INTO `tenq`(`tenq_id`,`tenq_title`,`tenq_type`,`tenq_date`,`tenq_des`) VALUES ('$tenq_id','$tenq_tile','$tenq_type','$tenq_date','$tenq_des')";
        $res=mysqli_query($conn,$sql);
        $sql2="INSERT INTO `tref`(`tb_id`,`tenq_id`) VALUES ('$tb_id','$tenq_id')";
        $res2=mysqli_query($conn,$sql2);
        if($res and $res2)
        {
            echo "<p class='dis'>YOUR DETAILS ENTERED SUCCESSFULLY!</p> \n";
            echo "<p class='dis1'>your uniue id is $tenq_id</p>";
            echo "<button class='btn1'><p ><a href='tref.php'><i>ENQUIRY DETAILS</i></a></p></button>";
        }
        else{
        echo "YOUR MESSAGE COULD NOT BE SENT !";
    }
    }
    
    }
    else{
        echo "THE AIRLINE ID DOESN'T EXITS!......";
    }
}
else
{
    header("LOCATION: tenq.php");
}
 ?>

