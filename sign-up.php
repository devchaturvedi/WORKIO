
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
        <title>Register Page </title>
        
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
                       
                    </ul>
                  

                    <span class="nav-item">
                        <a class="btn-outline-sm" href="login.php">Log in</a>
                    </span>

                </div> <!-- end of navbar-collapse -->
            </div> <!-- end of container -->
        </nav> <!-- end of navbar -->
        <!-- end of navigation

<

?>--->
	<style>
		.ex-form-1{
			background-color:#fff;
		}
		
		</style>
        
      
    
        
     
				  
				 

				  
                        <div class="text-box mt-5 mb-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-box mt-5 mb-5">
                <form action= "register-new.php" id="signup-form" method = "POST"  >
                    <div class="mb-4 form-floating">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>

                    <div class="mb-4 form-floating">
                        <input type="text" class="form-control" name="firstname" id="floatingFirstName" placeholder="First Name" required>
                        <label for="floatingFirstName">First Name</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <input type="text" class="form-control" name="lastname" id="floatingLastName" placeholder="Last Name" required>
                        <label for="floatingLastName">Last Name</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <input type="password" class="form-control" name="password" id="floatingNewPassword" placeholder="Password" required>
                        <label for="floatingNewPassword">New Password</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <input type="password" class="form-control" name="cpass" id="floatingConfirmPassword" placeholder="Confirm Password" required>
                        <label for="floatingConfirmPassword">Confirm Password</label>
                        <small id="pass_match" data-status=""></small>
                    </div>
					<input type = "hidden" value = "1" name = "type">
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I agree with the site's stated <a href="privacy.html">Privacy Policy</a> and <a href="terms.html">Terms & Conditions</a></label>
                    </div>
                    <button type = "submit" name = "reg" class="form-control-submit-button">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
    
        <!-- Scripts -->
        


    <script>
	
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
	
  $('#signup-form').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		if($('[name="password"]').val() != '' && $('[name="cpass"]').val() != ''){
			if($('#pass_match').attr('data-status') != 1){
				if($("[name='password']").val() !=''){
					$('[name="password"],[name="cpass"]').addClass("border-danger")
					end_load()
					return false;
				}
			}
		}
		$.ajax({
			url:'ajax.php?action=signup',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('login.php')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})

</script>

        <script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
        <script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="../js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
        <script src="../js/replaceme.min.js"></script> <!-- ReplaceMe for rotating text -->
        <script src="../js/scripts.js"></script> <!-- Custom scripts -->