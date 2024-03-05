<?php if(!isset($conn)){ include 'db_connect.php'; } 
//session_start() ;

if (isset($_SESSION["login_id"])) {
    // Fetch the user's login ID from the session
    $user_id = $_SESSION["login_id"];
    
    // Now you can use $user_id to perform further actions, such as fetching user data from the database
    //echo "Logged in user ID: " . $user_id;
}

?>



<!--

if(isset($_POST['save']))
{
	$name = mysql_real_escape_string($_POST['name']);
$username = mysql_real_escape_string($_POST['username']);
$start = mysql_real_escape_string($_POST['start']);
$end = mysql_real_escape_string($_POST['end']);
$manager = mysql_real_escape_string($_POST['manager_id']);
$reason = mysql_real_escape_string($_POST['reason']);

$leave = "INSERT INTO leave-applied (name,username,start,end,manager,reason) VALUES('$name','$email','$start','$end','$manager','$reason',)";
$run = mysqli_query($conn,$leave);

if($run)
{
	$_SESSION['status'] = "Successfully Applied For Leave";
	header("location:apply-for-leave.php");
	die();
}
else
{
	header("location:apply-for-leave.php");
	echo"Something Went Wrong";
	die();
}

}


?----->





				<form action = "leave-form-submission.php" method = "POST">
 <div class="col-sm-12 col-xl">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Request For Leave</h6>
                            <div class="form-floating mb-3">
                                <input type="text" name = "username" class="form-control" id="floatingInput"
                                    placeholder="Username">
                                <label for="floatingInput">Username</label>
                            </div>
							<div class="form-floating mb-3">
                                <input type="email" name = "email" class="form-control" id="floatingInput"
                                    placeholder="Email Address">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"  name = "name"class="form-control" id="floatingPassword"
                                    placeholder="Your Name">
                                <label for="text">Name</label>
                            </div>
							 <div class="form-floating mb-3">
                                <input type="date" name = "date" class="form-control" id="floatingPassword"
                                    placeholder="select-date">
                                <label for="text">Select Date of Leave</label>
                            </div>
							
                            <div class="form-floating mb-3">
                                <select class="form-control form-control-sm select2" name="manager_id">
              	<option></option>
              	<?php 
              	$managers = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where type = 2 order by concat(firstname,' ',lastname) asc ");
              	while($row= $managers->fetch_assoc()):
              	?>
              	<option value="<?php echo $row['id'] ?>" <?php echo isset($manager_id) && $manager_id == $row['id'] ? "selected" : '' ?>><?php echo ucwords($row['name']) ?></option>
              	<?php endwhile; ?>
              </select>
                                <label for="floatingSelect">Project Team Lead</label>
                            </div>
							  
                            <div class="form-floating">
                                <textarea class="form-control" name = "reason" placeholder="Fill Your Reason "
                                    id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Reason</label>
                            </div>
							<input name = "L_id" type = "hidden" value = " <?php echo $user_id ;?>">
							<button = "submit" class = "btn btn-primary m-3" type = "submit" name = "submit">Apply</button>
							</form>
              
           

<!--script>
	$('#leave-app').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=apply_leave',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
						location.href = 'index.php?page=apply-for-leave'
					},2000)
				}
			}
		})
	})
</script--->