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
    <h1>DISPLAYING AIRLINE ENQUIRY TABLE</h1>
    <br>
    <table class="table"  align="center" border="3px" style="width:1200px; line-height:40px;">
        <thead>
            <tr>    
                <th colspan="10"><h2>AIRLINE TICKET DATA</h2>
            </tr>   
            <tr>
            <th>ENQUIRY ID</th>
            <th>ENQUIRY TITLE</th>
            <th>ENQUIRY TYPE</th>
            <th>AIRLINE DATE</th>
            <th>AIRLINE DESCRIPTION</th> 
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
                $sql="SELECT * FROM `airline`.`aenq`";
                $result= $con->query($sql);
                if(!$result)
                {
                    die("Invalid Query...".$con->error);
                }
                while($row = $result->fetch_assoc())
                {
                    echo"<tr>
                    <td>" . $row["aenq_id"]."</td>
                    <td>" . $row["aenq_title"]."</td>
                    <td>" . $row["aenq_type"]."</td>
                    <td>" . $row["aenq_date"]."</td>
                    <td>" . $row["aenq_des"]."</td>
                    </tr>";
                }
                ?>
            </tbody>
    </table>
</body>
</html>