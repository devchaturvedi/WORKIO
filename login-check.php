<?php
session_start();

// Include database connection
include 'db_connect.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Sanitize input (you can add more validation as needed)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = mysqli_real_escape_string($conn, $password); // Sanitize to prevent SQL injection

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if ($user['password'] == $password) { // Assuming passwords are stored as plaintext
            // Password is correct, set session variables and redirect to index page
            $_SESSION['user_id'] = $user['id']; // Assuming 'id' is the column name for user ID
            $_SESSION['email'] = $user['email']; // Assuming 'email' is the column name for email
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect, redirect back to login page with error message
            $_SESSION['error'] = "Incorrect password!";
            header("Location: login.php");
            exit();
        }
    } else {
        // User does not exist, redirect back to login page with error message
        $_SESSION['error'] = "User does not exist!";
        header("Location: login.php");
        exit();
    }
} else {
    // Redirect back to login page if form is not submitted
    header("Location: ../login.php");
    exit();
}
?>
