<?php
require_once 'connection.php';

$sql = "CREATE TABLE customers (
       customer_id int NOT NULL AUTO_INCREMENT,
       first_name varchar(255) NOT NULL,
       last_name varchar(255) NOT NULL,
       email varchar(255) NOT NULL,
       username varchar(255) NOT NULL,
       PRIMARY KEY(customer_id))";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Tabela customers została stworzona poprawnie <br>";
} else {
    echo "Tabela customers nie została stworzona: ". $conn->error;
}

$sql = "CREATE TABLE addresses (
       customer_id int NOT NULL,
       street varchar(255) NOT NULL,
       post_code varchar(255) NOT NULL,
       city varchar(255) NOT NULL,
       PRIMARY KEY(customer_id),
       FOREIGN KEY(customer_id) REFERENCES customers(customer_id)
       ON DELETE CASCADE)";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Tabela addresses została stworzona poprawnie <br>";
} else {
    echo "Tabela addresses nie została stworzona: ". $conn->error;
}

$sql = "INSERT INTO customers (first_name, last_name, email, username) VALUES ('Tomasz', 'Tomaszewski', 'tomasz@op.pl', 'tomek'), ('Andrzej', 'Andrzejewski', 'andrzej@wp.pl', 'andy'),
('Jan', 'Kowalski', 'jan@op.pl', 'janek'), ('Michał', 'Nowak', 'michal@op.pl', 'michael')";

$result = $conn->query($sql);
    if($result){
        echo "Dane do tabeli customers zostały wpisane <br>";
    }

$sql = "INSERT INTO addresses (customer_id, street, post_code, city) VALUES (1, 'ulica Tomasza', '12-485', 'Wrocław'), (2, 'ulica Andrzeja', '45-545', 'Kraków'),
(3, 'ulica Jana', '35-471', 'Poznań')";

$result = $conn->query($sql);
    if($result){
        echo "Dane do tabeli addresses zostały wpisane <br>";
    }


