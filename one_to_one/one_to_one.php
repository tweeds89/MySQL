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
            <span><b>customers</b></span>
            <table class="customers">
                <tr>
                <?php
                 $sql = "SHOW COLUMNS FROM customers";
                 $result = $conn->query($sql);
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
                 $result = $conn->query($sql);
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
            <pre>
                CREATE TABLE customers (
                customer_id int NOT NULL AUTO_INCREMENT,
                first_name varchar(255) NOT NULL,
                last_name varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                username varchar(255) NOT NULL,
                PRIMARY KEY(customer_id)
            </pre>          
        </div>   
        <div id="table-right">
            <span><b>addresses</b></span>
            <table class="addresses">
                <tr>
                <?php
                 $sql = "SHOW COLUMNS FROM addresses";
                 $result = $conn->query($sql);
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
                 $result = $conn->query($sql);
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
            <pre>
            CREATE TABLE addresses (
            customer_id int NOT NULL,
            street varchar(255) NOT NULL,
            post_code varchar(255) NOT NULL,
            city varchar(255) NOT NULL,
            PRIMARY KEY(customer_id),
            FOREIGN KEY(customer_id) REFERENCES 
            customers(customer_id)
            ON DELETE CASCADE)
            </pre>
        </div>
        <div id="select">
            <p>
            SELECT first_name, last_name, email, city FROM customers JOIN addresses ON customers.customer_id=addresses.customer_id
            </p>         
            <table id="table" >
                <tr>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>email</th>
                    <th>city</th>
                </tr>              
                <?php
                $sql = "SELECT first_name, last_name, email, city FROM customers JOIN addresses ON customers.customer_id=addresses.customer_id";
                $result = $conn->query($sql);
                 if (mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){ 
                     echo ' 
                     <tr>
                        <td>' .$row["first_name"].'</td>  
                        <td>' .$row["last_name"].'</td> 
                        <td>' .$row["email"].'</td>  
                        <td>' .$row["city"].'</td>
                     </tr>';
                   }
                 }
                 ?>        
            </table>
        </div>
    </body>
</html>