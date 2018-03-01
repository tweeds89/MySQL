<?php require '../connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Relacje jeden do wielu</title>
        <link rel="stylesheet" type="text/css" href="../style/style.css">        
    </head>   
    <body>
        <div class="table-left">
            <span><b>customers</b></span>
            <table>
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
        <div class="table-right">
            <span><b>orders</b></span>
            <table>
                <tr>
                <?php
                 $sql = "SHOW COLUMNS FROM orders";
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
                 $sql = "SELECT * FROM orders";
                 $result = $conn->query($sql);
                 if (mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){ 
                     echo ' 
                     <tr>
                        <td>' .$row["order_id"].'</td>  
                        <td>' .$row["customer_id"].'</td> 
                        <td>' .$row["order_details"].'</td>   
                     </tr>';
                    }
                 }
                ?>                
            </table> 
            <pre>
            CREATE TABLE orders(
            order_id int NOT NULL AUTO_INCREMENT,
            customer_id int NOT NULL,
            order_details varchar(255) NOT NULL,
            PRIMARY KEY (order_id),
            FOREIGN KEY (customer_id)
            REFERENCES customers (customer_id))
            </pre>
        </div>
        <div class="select">
            <p>
           SELECT customers.customer_id, first_name, last_name, username, order_id, order_details FROM customers JOIN orders ON customers.customer_id=orders.customer_id ORDER BY customer_id
            </p>         
            <table class="table" >
                <tr>
                    <th>customer_id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>username</th>
                    <th>order_id</th>
                    <th>order_details</th>
                </tr>              
                <?php
                $sql = "SELECT customers.customer_id, first_name, last_name, username, order_id, order_details FROM customers JOIN orders ON customers.customer_id=orders.customer_id ORDER BY customer_id";
                $result = $conn->query($sql);
                 if (mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){ 
                     echo ' 
                     <tr>
                        <td>' .$row["customer_id"].'</td>
                        <td>' .$row["first_name"].'</td>  
                        <td>' .$row["last_name"].'</td> 
                        <td>' .$row["username"].'</td>  
                        <td>' .$row["order_id"].'</td>
                        <td>' .$row["order_details"].'</td>
                     </tr>';
                   }
                 }
                 ?>        
            </table>
        </div>
    </body>
</html>