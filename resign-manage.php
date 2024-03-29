<?php include'db_connect.php' ?>

<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=apply-resign"><i class="fa fa-plus"></i> Apply For Resign</a>
			</div>
		</div>
		<div class="card-body">
            <?php if($_SESSION['login_type'] == 2): ?>
		<h2 class ="leave-text">Team Members Resign Requests</h2>
        <?php endif ; ?>

        <?php if($_SESSION['login_type'] == 3 ): ?>
		<h2 class ="leave-text">Your Resign Requests</h2>
        <?php endif ; ?>

		<style>
		.leave-text {
			font-size:20px;
		}
		
		</style>
			<table class="table tabe-hover table-condensed" id="list">
				<colgroup>
					<col width="5%">
					<col width="35%">
					<col width="15%">
					<col width="15%">
					<col width="20%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Email</th>
						<th>Name</th>
						<th>Reason</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				
				if($_SESSION['login_type'] == 2):
				
				$sql = "SELECT * FROM resign_requests WHERE manager_id = '".$_SESSION['login_id']."' "; // Replace 'your_table' with the actual table name
$result = $conn->query($sql);
 endif ;
 
 if($_SESSION['login_type'] == 3):
				
				$sql = "SELECT * FROM resign_requests WHERE username = '".$_SESSION['login_email']."' "; // Replace 'your_table' with the actual table name
$result = $conn->query($sql);
 endif ;
 
 if($_SESSION['login_type'] == 1):
				
				$sql = "SELECT * FROM resign_requests WHERE username = '".$_SESSION['login_email']."' "; // Replace 'your_table' with the actual table name
$result = $conn->query($sql);
 endif ;
 
// Check if there are any records
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
	
        echo "<tr>";
        echo "<td class='text-center'>" . $row["id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["reason"] . "</td>";
        //echo "<td>" . $row["status"] . "</td>";
		
		//Only Works for Manager///
		 if($_SESSION['login_type'] == 2):
				
		$status = $row["status"]; 
		$valueToDisplay = "";

// Check the status value and assign the appropriate value to $valueToDisplay
if ($status == "hold") {
    $valueToDisplay = 'Put On Hold <i class="fa-solid fa-hourglass-end fa-lg" style="color: #eef207;"></i> ';
} elseif ($status == "accepted") {
    $valueToDisplay = 'Accepted <i class="fa-solid fa-circle-check fa-lg " style="color: #30f00a;"></i> ';
}

elseif ($status == "pending") {
    $valueToDisplay = 'Pending <i class="fa-solid fa-hourglass-end fa-lg" style="color: #eef207;"></i> ';
}
        echo "<td>" .$valueToDisplay. "</td>";
       echo "<td><button class='btn btn-primary' data-toggle=\"modal\" data-target=\"#exampleModalCenter\">Edit</button></td>"; 
        echo "</tr>";
		endif ;
		
		//#######################--###############-----##################//
		
		//Only Works for Employees///
		 if($_SESSION['login_type'] == 3):
			
				
		 $status = $row["status"];
		 $value =  ' <i class="fa-solid fa-hourglass-end fa-lg" style="color: #eef207;"></i>  '.$status.'  ' ;

            

        echo "<td>" .$value. "</td>";
       echo "<td><button class='btn btn-primary' data-toggle=\"modal\" data-target=\"#exampleModalCent\">View</button></td>"; 
        echo "</tr>";
		endif ;
		//--###############--###############-----#############//
		
		
		
		
		//---################################################----//
		
		?> 
		
		
				</tbody>
							<!-- Modal -->
				 <form action="resign-form-submission.php" method="POST">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Take Action on Resign Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="opti">
                        <option value="">Choose</option>
                        <option value="accepted">Accepted</option>
                        <option value="hold">Put On Hold</option>
                    </select>
					<br>
					<textarea class="form-control" name="comment" placeholder="Comments" rows="4"></textarea>

					
                    <!-- Move the input element outside the select element -->
					<input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="editbtn" type="submit" name="redit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!---Modal Ends Here ----->

<!-- Modal -->
				
  <?php $sql = "SELECT comment FROM resign_requests WHERE username = '".$_SESSION['login_email']."' "; 
$result = $conn->query($sql); // Corrected variable name to $result

if ($result->num_rows > 0) {
    // Output data for each row
    $row = $result->fetch_assoc(); 
    $comment = $row["comment"]; 
}

?>

    <div class="modal fade" id="exampleModalCent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--h5 class="modal-title" id="exampleModalLongTitle">Take Action on Leave Request</h5--->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  
					<textarea class="form-control" name="comment" placeholder="Comments" rows="4"> <?php echo $comment ; ?> </textarea>

					
                    <!-- Move the input element outside the select element -->
				
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--button id="editbtn" type="submit" name="sedit" class="btn btn-primary">Save changes</button--->
                </div>
            </div>
        </div>
    </div>


<!---Modal Ends Here ----->




  

<?php
    }
}

else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}

?>


			</table>
			
   </div>
		</div>