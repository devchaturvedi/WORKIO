  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <style>
  .main-sidebar{
  background-color:#000;
  }

  

  </style>
    <div class="dropdown">
   	<a href="./" class="brand-link">
        <?php if($_SESSION['login_type'] == 1): ?>
        <h3 class="text-center p-0 m-0"><b>ADMIN </b></h3>
        <?php elseif($_SESSION['login_type'] == 2): ?>
        <h3 class="text-center p-0 m-0"><b>Manager</b></h3>
        <?php else:?>
        <h3 class="text-center p-0 m-0"><b>USER</b></h3>
        <?php endif; ?>

    </a>
      
    </div>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
		<!---New Section added trying
		<li class="nav-item dropdown">
            <a href="./" class="nav-link nav-hoe">
              <i class="nav-icon fas fa-house"></i>
              <p>
                Home
              </p>
            </a>
          </li>  
		
		<!---#####------------->
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class=" nav-icon fa-solid fa-house" style="color: #f5f5f5;"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  <hr> 
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_project nav-view_project">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Projects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
            <?php if($_SESSION['login_type'] != 3 && $_SESSION['login_type'] != 2) : ?>
              <li class="nav-item">
                <a href="./index.php?page=new_project" class="nav-link nav-new_project tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            <?php endif; ?>
              <li class="nav-item">
                <a href="./index.php?page=project_list" class="nav-link nav-project_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
		  <?php if($_SESSION['login_type'] != 3): ?>
           <li class="nav-item">
                <a href="./index.php?page=reports" class="nav-link nav-reports">
                  <i class="fas fa-th-list nav-icon"></i>
                  <p>Report</p>
                </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
                <a href="./index.php?page=task_list" class="nav-link nav-task_list">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Task</p>
                </a>
          </li>
		  <hr>
		  
          <li class="nav-item">
                <a href="./index.php?page=leave" class="nav-link nav-leave">
                  <i class="fas fa-pen nav-icon"></i>
                  <p>Leave Board</p>
                </a>
          </li>
		  <li class="nav-item">
                <a href="./index.php?page=resign-manage" class="nav-link nav-resign">
                  <i class="nav-icon fa-solid fa-pen-nib" style="color: #f2f2f2;"></i>
                  <p>Resign Management</p>
                </a>
          </li>
		  <hr>
		  
         
          
          <?php if($_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
		
		<?php if($_SESSION['login_type'] == 2): ?>
        <li class="nav-item dropdown">
            <a href="./index.php?page=timesheet-data" class="nav-link nav-sheet">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Time Sheet
              </p>
            </a>
          </li>  
		  <?php endif ; ?>
        
		<?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 3): ?>

		 <li class="nav-item">
                <a href="./index.php?page=support" class="nav-link support">
                  <i class="fas fa-hands nav-icon"></i>
                  <p>Support</p>
                </a>
          </li>
		  
		   <?php endif ; ?>
		  
		  	<?php if($_SESSION['login_type'] == 1 ): ?>

		 <li class="nav-item">
                <a href="./index.php?page=query-raised" class="nav-link support">
                  <i class="fas fa-hands nav-icon"></i>
                  <p>Query Raised</p>
                </a>
          </li>
		  
		   <?php endif ; ?>
		  
		  
		  
	<?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 1): ?>

		   <div class="container">
		  <div class="box">
            <h2><b>Experience</b></h2>
            <p>Generate Experience Certificate For Employees.</p>
            
			<form action="./index.php?page=experience-certificate" method ="POST">
        <button type="submit">Generate</button>
		</form>
  
        </div>
        </div>
		<?php endif ; ?>
     
	 <!----################################---------------------------------->
	 

	 
	 
	 <!----################################---------------------------------->
		
		<style>
		.container {
    position: relative;
    height: 200px; /* Adjust height as needed */
    background-color: #000000; /* For visibility */
}
		.box {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    overflow: hidden; /* or overflow: hidden; */
	
}


h2 {
    margin-top: 0;
    font-size: 10px;
	
}

p {
    margin-bottom: 2px;
	
}

button {
    padding: 5px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}
		</style>
		  
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>