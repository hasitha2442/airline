<?php
    session_start();
    include("./emp.html");
    if(isset($_POST['emp_id']) && isset($_POST['emp_password']) )
    {
    $sname="localhost";
    $password="";
    $db_name="airline";
    $uname="root";
    $connect = mysqli_connect($sname , $uname , $password , $db_name);
    if(!$connect){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    else {
    $emp_id = $_POST['emp_id'];
    $emp_password = $_POST['emp_password'];
    $check= mysqli_query($connect, "select * from `emp` where emp_id='$emp_id' and emp_password='$emp_password';");
    if(mysqli_num_rows($check)>0)
   {
        
        echo '<script>
				alert("Login Successful");
                window.location = "./aenq.html";
            </script>';
    }
    else{
        echo '<script>
                alert("Invalid credentials!");
                window.location = "main.php";
            </script>';
    }
    }
    }
    
?>