
<?php

if(!isset($conn)){ include 'db_connect.php'; }

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $leave_date = $_POST["date"];
    $manager_id = $_POST["manager_id"];
    $reason = $_POST["reason"];
    $status = "pending"; // If status is not passed in the form, provide a default value here or remove it from the query
    $L_id = $_POST["L_id"];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO leave_requests (username, email, name, leave_date, manager_id, reason, status, L_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssisi", $username, $email, $name, $leave_date, $manager_id, $reason, $status, $L_id);

    // Execute the statement
    if ($stmt->execute()) {
        //echo "Issue request submitted successfully.";
        header("location:index.php?page=leave");
        exit(); // Terminate script execution after redirection
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}



if(isset($_POST['sedit'])) {
    $opt = $_POST['opti'];
    $email = $_POST['email'];
    $comment = $_POST['comment']; // Assuming the parameter name is 'comment'
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE leave_requests SET status = ?, comment = ? WHERE email = ?");
    $stmt->bind_param("sss", $opt, $comment, $email); // Assuming all parameters are strings ('s')
    
    // Execute the statement
    if($stmt->execute()) {
        header("location:index.php?page=leave");
        exit(); // Optional: Terminate script execution after redirection
    } else {
        echo "Error: " . $stmt->error;
        // Handle the error accordingly
    }
    
    // Close statement
    $stmt->close();
}


?>

