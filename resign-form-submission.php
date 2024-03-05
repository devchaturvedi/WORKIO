
<?php


// Include database connection
if (!isset($conn)) {
    include 'db_connect.php';
}

// Check if the form is submitted
if (isset($_POST['resign'])) {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $manager_id = $_POST["manager_id"];
    $reason = isset($_POST["reason"]) ? $_POST["reason"] : ""; // Ensure reason is set and not empty
    $L_id = $_POST["L_id"];
    $status = "Pending";

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO resign_requests (username, email, name, manager_id, reason, L_id, status) VALUES (?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters to the prepared statement
$stmt->bind_param("sssssis", $username, $email, $name, $manager_id, $reason, $L_id, $status);


    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page after submission
        header("location:index.php?page=resign-manage");
        exit(); // Terminate script execution after redirection
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}



if(isset($_POST['redit'])) {
    $opt = $_POST['opti'];
    $email = $_POST['email'];
    $comment = $_POST['comment']; // Assuming the parameter name is 'comment'
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE resign_requests SET status = ?, comment = ? WHERE email = ?");
    $stmt->bind_param("sss", $opt, $comment, $email); // Assuming all parameters are strings ('s')
    
    // Execute the statement
    if($stmt->execute()) {
        header("location:index.php?page=resign-manage");
        exit(); // Optional: Terminate script execution after redirection
    } else {
        echo "Error: " . $stmt->error;
        // Handle the error accordingly
    }
    
    // Close statement
    $stmt->close();
}



?>





