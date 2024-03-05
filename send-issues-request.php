
<?php
if(!isset($conn)){ include 'db_connect.php'; } ?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $manager_id = $_POST["manager_id"];
    $complain = $_POST["complain"];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO issues_request (username, email, name, dept, complain) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $name, $dept, $complain);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Issue request submitted successfully.";
		header("location:index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

?>