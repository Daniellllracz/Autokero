<?php
require "connect.php";
$sql = "CREATE TABLE auto_dekor (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tipus VARCHAR(30) NOT NULL,
    km_allas INT(20) NOT NULL,
    le INT(5) NOT NULL,
    ar INT(15) NOT NULL,
    uzemanyag_tipus VARCHAR(50) NOT NULL,
    valto_tipus VARCHAR(50) NOT NULL,
    img_name VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
