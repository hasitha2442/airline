<?php
include("aenq.html");
if( isset($_POST['ab_id']) && isset($_POST['aenq_type']) && isset($_POST['aenq_date']) && isset($_POST['aenq_title']) && isset($_POST['aenq_des']))
{
    session_start();
    $sname="localhost";
    $aenqword="";
    $db_name="airline";
    $uname="root";
    $ab_id=$_POST['ab_id'];
    $aenq_tile=$_POST['aenq_title'];
    $aenq_type=$_POST['aenq_type'];
    $aenq_date=$_POST['aenq_date'];
    $aenq_des=$_POST['aenq_des'];
    $aenq_id=uniqid(rand(),true);
    $aenq_id=substr($aenq_id, 14, 8);
    $conn = mysqli_connect($sname , $uname , $aenqword , $db_name);
    $_SESSION['ab_id'] = $ab_id;
    if(!$conn)
    {
        echo "connection failed!";
        exit();
    }
    $check= mysqli_query($conn, "select * from `ab` where ab_id='$ab_id';");
    if(mysqli_num_rows($check)>0)
    {
    if(empty($aenq_date) || empty($aenq_type) || empty($aenq_des) || empty($aenq_id))
    {
        header("location : aenq.php");
    }
    else{
        $sql="INSERT INTO `aenq`(`aenq_id`,`aenq_title`,`aenq_type`,`aenq_date`,`aenq_des`) VALUES ('$aenq_id','$aenq_tile','$aenq_type','$aenq_date','$aenq_des')";
        $res=mysqli_query($conn,$sql);
        $sql2="INSERT INTO `aref`(`ab_id`,`aenq_id`) VALUES ('$ab_id','$aenq_id')";
        $res2=mysqli_query($conn,$sql2);
        if($res and $res2)
        {
            echo "<p class='dis'>YOUR DETAILS ENTERED SUCCESSFULLY!</p> \n";
            echo "<p class='dis1'>your uniue id is $aenq_id</p>";
            echo "<button class='btn1'><p ><a href='aref.php'><i>ENQUIRY DETAILS</i></a></p></button>";
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
    header("LOCATION: aenq.php");
}
 ?>

