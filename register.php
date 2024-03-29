<?php
session_start();

// Include database connection
include 'dashboard/db_connect.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $type = 1;

    // Sanitize and validate input (you can add more validation as needed)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $firstname = mysqli_real_escape_string($conn, $firstname); // Sanitize to prevent SQL injection
    $lastname = mysqli_real_escape_string($conn, $lastname); // Sanitize to prevent SQL injection
    $password = mysqli_real_escape_string($conn, $password); // Sanitize to prevent SQL injection
    $type = mysqli_real_escape_string($conn, $type); // Sanitize to prevent SQL injection

    // Prepare and execute SQL statement to insert user data into database
    $stmt = $conn->prepare("INSERT INTO users (email, firstname, lastname, password, type) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssi", $email, $firstname, $lastname, $password, $type);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        $_SESSION['status'] = "Registration Successful! Please check your email to verify your email address.";
        header("location: dashboard/login.php");
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
