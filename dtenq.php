<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display the Tables</title>
    <link type='text/css' rel="stylesheet" href="display.css">
</head>
    <body style="margin: 70px;">
    <h1>DISPLAYING TICKET ENQUIRY TABLE</h1>
    <br>
    <table class="table"  align="center" border="3px" style="width:1200px;  line-height:40px;">
        <thead>
            <tr>    
                <th colspan="10"><h2>AIRLINE TICKET DATA</h2>
            </tr>   
            <tr>
            <th><b><i>ENQUIRY ID</i></b></th>
            <th><b><i>ENQUIRY TITLE</i></b></th>
            <th><b><i>ENQUIRY TYPE</i></b></th>
            <th><b><i>TICKET DATE</i></b></th>
            <th><b><i>TICKET DESCRIPTION</i></b></th> 
            </tr>
        </thead><br><br>
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
                $sql="SELECT * FROM `airline`.`tenq`";
                $result= $con->query($sql);
                if(!$result)
                {
                    die("Invalid Query...".$con->error);
                }
                while($row = $result->fetch_assoc())
                {
                    echo"<tr>
                    <td><b><i>" . $row["tenq_id"]."</i></b></td>
                    <td><b><i>" . $row["tenq_title"]."</i></b></td>
                    <td><b><i>" . $row["tenq_type"]."</i></b></td>
                    <td><b><i>" . $row["tenq_date"]."</i></b></td>
                    <td><b><i>" . $row["tenq_des"]."</i></b></td>
                    </tr>";
                }
                ?>
            </tbody>
    </table>
</body>
</html>