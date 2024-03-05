  <?php if(!isset($conn)){ include 'db_connect.php'; } 
//session_start() ;

if (isset($_SESSION["login_id"])) {
    // Fetch the user's login ID from the session
    $user_id = $_SESSION["login_id"];
    
    // Now you can use $user_id to perform further actions, such as fetching user data from the database
    //echo "Logged in user ID: " . $user_id;
}

?>


    <form action="generate_certificate.php" method="post" style="max-width: 400px; margin: 0 auto;">
    <label for="employee_name">Employee Name:</label>
    <input type="text" name="employee_name" id="employee_name" required class="form-control"><br>
    
    <label for="company_name">Company Name:</label>
    <input type="text" name="company_name" id="company_name" required class="form-control"><br>
    
    <label for="designation">Designation:</label>
    <input type="text" name="designation" id="designation" required class="form-control"><br>
    
    <label for="start_date">Start Date:</label>
    <input type="text" name="start_date" id="start_date" required class="form-control"><br>
    
    <label for="end_date">End Date:</label>
    <input type="text" name="end_date" id="end_date" required class="form-control"><br>
    
    <label for="supervisor_name">Supervisor Name:</label>
    <input type="text" name="supervisor_name" id="supervisor_name" required class="form-control"><br>
    
    <label for="supervisor_designation">Supervisor Designation:</label>
    <input type="text" name="supervisor_designation" id="supervisor_designation" required class="form-control"><br>
    
    <button type="submit" name="generate_certificate" class="btn btn-primary">Generate Certificate</button>
</form>
