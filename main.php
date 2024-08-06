<?php
    session_start();
    include("./main.html");
    if(isset($_POST['pass_id']) && isset($_POST['pass_password']) )
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
    $pass_id = $_POST['pass_id'];
    $pass_password = $_POST['pass_password'];
    $check= mysqli_query($connect, "select * from `pass` where pass_id='$pass_id' and pass_password='$pass_password';");
    if(mysqli_num_rows($check)>0)
   {
        
        echo '<script>
        
				alert("Login Successful");
                window.location = "./ab.html";
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