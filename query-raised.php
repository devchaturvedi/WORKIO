
				
				
<?php include'db_connect.php'?>

<div class="card-header">
			<!--div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=apply-for-leave"><i class="fa fa-plus"></i> Apply For Leave</a>
			</div--->
		</div>

		
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
						
						
						<th>Query Raised</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
		
				
				$sql = "SELECT * FROM issues_request "; // Replace 'your_table' with the actual table name
$result = $conn->query($sql);

 
// Check if there are any records
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
	
        echo "<tr>";
        echo "<td class='text-center'>" . $row["id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
       
        //echo "<td>" . $row["manager_id"] . "</td>";
        echo "<td>" . $row["complain"] . "</td>";
		 echo "<td>" . $row["created_at"] . "</td>";
		
		
		
		
		 ?> 
		
		
</tbody>

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