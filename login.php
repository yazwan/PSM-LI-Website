<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<title>PSM and LI Intelligence Chatbot</title>
<link rel="stylesheet" type="text/css" href="style.css">
<head> 
	<div class="box-area">
		<header>
			<div class="wrapper">
				<div class="logo">
					<a href="#"> PSM2 </a>
				</div>
				<nav >
					<a href="index.php">HOME</a>
					<a href="about.php">ABOUT</a>
					<a href="contact.php">CONTACT</a>
				
				</nav>
			</div>
		</header>
    </div>
    
<div class="login-area">
    <div class="header-login">
        <h2  id="loginHere">LOGIN</h2>
    </div>
    <form  method="post" action="index.php">
        <div >
        <?php echo display_error(); ?>

            <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" >
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_btn">Login</button>
            </div>
            <p class="text">
                Not yet a member? <a href="register.php">Sign up</a>
            </p>            
        </div>
    </form>
</div>

</head>
</html>
