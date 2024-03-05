<?php

if(!isset($conn)){ include 'db_connect.php'; }

if(isset($_POST['sub'])) {
    $low = $_POST['low'];
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $low); // assuming 'id' is an integer
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            // Echo the data
            echo "User ID: " . $row['id'] . "<br>";
            echo "Full Name: " . $row['firstname'] . " " . $row['lastname'] . "<br>";
            // Output other data fields as needed
        }
    } else {
        echo "No user found with the given ID.";
    }
    
    // Close the statement
    $stmt->close();
}


    
 


?>