<?php include'db_connect.php' ?>



<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
		
			<div class="card-tools">
			<?php if($_SESSION['login_type'] == 2): ?>
				<!--a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_user"><i class="fa fa-plus"></i> Add New User</a--->
				 <select name="user_id" class = "form-control" id="userSelect" >
                       <option value="">Select Member</option>
 
   

   
    <?php
   // Build the SQL query
    $sql = "SELECT id , CONCAT(firstname, ' ', lastname) AS full_name FROM users WHERE FIND_IN_SET(id, (SELECT user_ids FROM project_list WHERE manager_id = '".$_SESSION['login_id']."'))";
    
    // Execute the query
    $result = $conn->query($sql);
    
    // Check if query was successful and if there are any rows returned
    if ($result && $result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['full_name'] . "</option>"; ?>
      
	
	 <?php }
    } else {
        echo "<option disabled>No users found</option>";
    }
   
   ?>
   
    </select>
	   
	 <form action = "fetch_data.php" method = "POST">
   <input type = "text" name = "low" value = "<?php echo $row['id'] ;?>">
   <button type = "submit" name = "submit" id="submitButton" style="display: none;">Submit</button>
    </form>
	<?php endif ; ?>
<script>
    // Get the select element and submit button element
    var select = document.getElementById('userSelect');
    var submitButton = document.getElementById('submitButton');

    // Add event listener to select element
    select.addEventListener('change', function() {
        // Check if an option other than the default option is selected
        if (select.value !== "") {
            // Show the submit button
            submitButton.style.display = 'inline-block';
        } else {
            // Hide the submit button
            submitButton.style.display = 'none';
        }
    });
</script>

			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
					  
						<th class="text-center">Date</th>
						<th>Name</th>
						<th>Username</th>
						<th>Login Time</th>
						<th>Logout Time</th>
						<th>Working Hours</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				
				<?php ; ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

