
				<?php
		include('db_connect.php');?> 
		
		<head>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65aa920b0ff6374032c26f8b/1hkh4kvnb';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
		</head>

				
				
				
				<form action = "send-issues-request.php" method = "POST">
 <div class="col-sm-12 col-xl">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Raise Your Issues</h6>
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
                                <textarea class="form-control" name = "complain" placeholder="Fill Your Issues"
                                    id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Complaint Box</label>
                            </div>
							<button = "submit" class = "btn btn-primary m-3" type = "submit" name = "submit">Submit</button>
							</form>
          