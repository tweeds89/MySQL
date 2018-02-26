<?php require 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Relacje</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">        
    </head>   
    <body>
        <div id="table-left">
            <table class="customers">
                <tr>
                <?php
                 $sql = "SHOW COLUMNS FROM customers";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){ 
                     echo '           
                        <th>' .$row["Field"].'</th>';              
                    }
                }
                ?>  
                </tr>                
                <?php
                 $sql = "SELECT * FROM customers";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){ 
                     echo ' 
                     <tr>
                        <td>' .$row["customer_id"].'</td>  
                        <td>' .$row["first_name"].'</td> 
                        <td>' .$row["last_name"].'</td> 
                        <td>' .$row["email"].'</td> 
                        <td>' .$row["username"].'</td> 
                     </tr>';
                    }
                }
                ?>             
            </table>       
        </div>   
        <div id="table-right">
            <table class="addresses">
                <tr>
                <?php
                 $sql = "SHOW COLUMNS FROM addresses";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){ 
                     echo '           
                        <th>' .$row["Field"].'</th>';              
                    }
                }
                ?>  
                </tr>                
                <?php
                 $sql = "SELECT * FROM addresses";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){ 
                     echo ' 
                     <tr>
                        <td>' .$row["customer_id"].'</td>  
                        <td>' .$row["street"].'</td> 
                        <td>' .$row["post_code"].'</td>  
                        <td>' .$row["city"].'</td> 
                     </tr>';
                    }
                }
                ?>                
            </table>       
        </div>
    </body>
</html>