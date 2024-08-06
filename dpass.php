<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display the Tables</title>
    <link rel="stylesheet" href="display.css">
</head>
    <body style="margin: 70px;">
    <background="css/5.jpg"; 
    link="#000"; alink="#017bf5"; vlink="#000";>
    <h1>DISPLAYING PASSENGER TABLE</h1>
    <br>
    <table class="table"  align="center" border="3px" style="width:1200px; line-height:40px;">
        <thead>
            <tr>    
                <th colspan="10"><h2>PASSENGER DATA</h2>
            </tr>   
            <tr>
                <th><b><i>PASSENGER ID</i></b></th>
                <th><b><i>NAME</i></b></th>
                <th><b><i>MOBILE NO</i></b></th>
                <th><b><i>EMAIL ID</i></b></th>
                <th><b><i>USER NAME</i></b></th>
                <th><b><i>PASSWORD</i></b></th>
                <th><b><i>DESCRIPTION</i></b></th>
                
            </tr>
        </thead>
            <tbody>
                <?php
                $server = "localhost";
                $username = "root";
                $password = "";
            
                // Create a database connection
                $con = mysqli_connect($server, $username, $password);
            
                // Check for connection success
                if(!$con){
                    die("connection to this database failed due to" . mysqli_connect_error());
                }
                $sql="SELECT * FROM `airline`.`pass`";
                $result= $con->query($sql);
                if(!$result)
                {
                    die("Invalid Query...".$con->error);
                }
                while($row = $result->fetch_assoc())
                {
                    echo"<tr>
                    <td>" . $row["pass_id"]."</td>
                    <td>" . $row["pass_name"]."</td>
                    <td>" . $row["pass_mobile"]."</td>
                    <td>" . $row["pass_mail"]."</td>
                    <td>" . $row["pass_usn"]."</td>
                    <td>" . $row["pass_password"]."</td>
                    <td>" . $row["pass_add"]."</td>
                    </tr>";
                }
                ?>
            </tbody>
    </table>
</body>
</html>