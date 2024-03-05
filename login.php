<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>


<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>


<!--?---


/* Check if the form is submitted
if (isset($_POST['loggg'])) {
    // Retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Sanitize and validate input (you can add more validation as needed)
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Check user credentials in the database
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // Start session and set session variables
           // session_start();
            $_SESSION['login_id'] = $row['id'];
            $_SESSION['login_email'] = $row['email'];
            $_SESSION['login_type'] = $row['type'];

            // Redirect to home page
            header("location:index.php?page=home");
            exit();
        } 
		
		else {
            // Redirect to login page if credentials are invalid
            header("location:index.php?page=home");
            exit();
               }
    } 
	
	else {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
    }
}


*/




<?php include 'header.php' ?>


        <!-- Favicon  -->
        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- SEO Meta Tags -->
        <meta name="description" content="Your description">
        <meta name="author" content="Pratham">

        <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
        <meta property="og:site_name" content="" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

        <!-- Webpage Title -->
        <title>Login Page </title>
        
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/fontawesome-all.min.css" rel="stylesheet">
        <link href="../css/swiper.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
        
        <!-- Favicon  -->
        <link rel="icon" href="images/favicon.png">
    </head>
    <body data-bs-spy="scroll" data-bs-target="#navbarExample">
        
        <!-- Navigation -->
        <nav id="navbarExample" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
            <div class="container">

                <!-- Image Logo 
                <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.svg" alt="alternative"></a> 

                <!-- Text Logo - Use this if you don't have a graphic logo -->
                <!-- <a class="navbar-brand logo-text" href="index.html">Ioniq</a> -->

                <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav ms-auto navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" href="#details">Details</a>
                        </li-->
                        <!--li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li-->
                        <!--li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Drop</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown01">
                                <li><a class="dropdown-item" href="article.html">Article Details</a></li>
                                <li><div class="dropdown-divider"></div></li>
                                <li><a class="dropdown-item" href="terms.html">Terms Conditions</a></li>
                                <li><div class="dropdown-divider"></div></li>
                                <li><a class="dropdown-item" href="privacy.html">Privacy Policy</a></li>
                            </ul>
                        </li--->
                    </ul>
                  

                    <span class="nav-item">
                        <a class="btn-outline-sm" href="login.php">Log in</a>
                    </span>

                </div> <!-- end of navbar-collapse -->
            </div> <!-- end of container -->
        </nav> <!-- end of navbar -->
        <!-- end of navigation -->

    
        
    <body>
	
	<style>
		.ex-form-1{
			background-color:#fff;
		}
		
		</style>
        
      
    
        
        <!-- Basic -->
        <div class="ex-form-1 pt-5 pb-5">
            <div class="container">
                <div class="row">
			
                    <div class="col-xl-6 offset-xl-3">
				
					 <?php
				  if(isset($_SESSION['status']))
				  {
				  	echo "<h4>".$_SESSION['status']."</h4>";
					unset($_SESSION['status']);
				  }
				  ?>
				  
				  	 <?php
				  if(isset($_SESSION['error']))
				  {
				  	echo "<h4>".$_SESSION['error']."</h4>";
					unset($_SESSION['error']);
				  }
				  ?>
				  
				   <?php
				  if(isset($_SESSION['mess']))
				  {
				  	echo "<h4>".$_SESSION['mess']."</h4>";
					unset($_SESSION['mess']);
				  }
				  ?>
			<!--Acc Delete Message
			<?php
				  if(isset($_SESSION['delac']))
				  {
				  	echo "<h4>".$_SESSION['delac']."</h4>";
					unset($_SESSION['delac']);
				  }
				  ?>
				  ----------->
				  
				 

				  
                        <div class="text-box mt-5 mb-5">

                            <!--p class="mb-4">You don't have an account? Then please <a class="blue" href="../sign-up.php">Sign Up</a></p--->

                            <!-- Log In Form -->
                            <form id = "login-form" >
                                <div class="mb-4 form-floating">
                                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="mb-4 form-floating">
                                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I agree with the site's stated <a href="privacy.html">Privacy Policy</a> and <a href="terms.html">Terms & Conditions</a></label>
                                </div>
                                <button  name = "loggg" type="submit" class="form-control-submit-button">Log in</button>
                            </form>
                            <!-- end of log in form -->

                        </div> <!-- end of text-box -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of ex-basic-1 -->
        <!-- end of basic -->



        <!-- Back To Top Button 
        <button onclick="topFunction()" id="myBtn">
            <img src="images/up-arrow.png" alt="alternative">
        </button>
        <!-- end of back to top button -->
            
        <!-- Scripts -->
        <script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
        <script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="../js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
        <script src="../js/replaceme.min.js"></script> <!-- ReplaceMe for rotating text -->
        <script src="../js/scripts.js"></script> <!-- Custom scripts -->
    </body>
<!-- /.login-box---->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }
		
		else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include '../footer.php' ?>
<?php include 'footer.php' ?>

</body>
</html>
