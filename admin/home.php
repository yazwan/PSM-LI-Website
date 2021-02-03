<?php 
   include('../functions.php');
   
   if (!isAdmin()) {
   	$_SESSION['msg'] = "You must log in first";
   	header('location: ../index.php');
   }
   
   if (isset($_GET['logout'])) {
   	session_destroy();
   	unset($_SESSION['user']);
   	header("location: ../index.php");
   }
   $sql = "SELECT * FROM users ORDER BY id DESC";
   $result = mysqli_query($db,$sql);
   
   $sqlfeed = "SELECT * FROM feedback ORDER BY feedbackid DESC";
   $resultfeedback = mysqli_query($db,$sqlfeed);

   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="styles.css">
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>



	<div class="box-area">
		<header>
			<div class="wrapper">
				<div class="logo">
					<a href="#"> PSM2 </a>
				</div>
				<div >
					<div>
						<nav >
							<a href="../index.php">HOME</a>
							<a href="../about.php">ABOUT</a>
							<a href="../contact.php">CONTACT</a>
							
						</nav>
					</div>
				</div>
				
			</div>
		</header>
    </div>
</head>
   <body>
   <div class="login-area-after-login">

      <div class="header-after-login">
         <h2>Admin - Home Page</h2>
      </div>
      <div class="content">
      <!-- notification message -->
         <?php if (isset($_SESSION['success'])) : ?>
         <div class="error success" >
            <h3>
               <?php 
                  echo $_SESSION['success']; 
                  unset($_SESSION['success']);
                  ?>
            </h3>
         </div>
         <?php endif ?>
      <!-- logged in user information -->
      <div class="profile_info" >
         <div>
            <div >
               <img src="../img/login.png"  >
               <?php  if (isset($_SESSION['user'])) : ?>
               <strong><?php echo $_SESSION['user']['username']; ?></strong>
               <small >
               <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
               <div><a href="home.php?logout='1'"><button class="button-logout">Logout</button></a></div>
               <br>
               <div class="admin-tab">

                    <a href="manage_user.php">Manage User</a>
                    <a href="view_feedback.php">Feedback User</a>
                </div>
               </small>
               <?php endif ?>
            </div>			
			
			
            <div >
            </div>
         </div>
      </div>
      </div>
      <section>
         <div class="container">
            <div>
               
            </div>

         </div>
      </section>

      

      <div id="webchat"></div>
      <script src="https://cdn.jsdelivr.net/npm/rasa-webchat/lib/index.min.js"></script>
      <script>
         WebChat.default.init({
           selector: "#webchat",
           initPayload: "/greet",
           customData: {"language": "en"}, // arbitrary custom data. Stay minimal as this will be added to the socket
           socketUrl: "https://1008014d1ea8.ngrok.io",
           socketPath: "/socket.io/",
           title: "PSM & LI Assistant",
           subtitle: "Created by Yazwan",
           params: {"storage": "session"} // can be set to "local"  or "session". details in storage section.
         })
      </script>


   </body>
</html>