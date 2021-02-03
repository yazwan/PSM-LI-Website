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
	<title>Add User</title>
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
<div class="login-area">
    <div class="header-login">
		<h2>Admin - Add user</h2>
	</div>
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="lecturer">Lecturer</option>
				<option value="student">Student</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>

		<?php 
			if(isset($msg)){  // Check if $msg is not empty
				echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
			} 
		?>
   
	</form>
	</div>
</body>
</html>