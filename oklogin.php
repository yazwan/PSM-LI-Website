<?php 
    include('functions.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
							<a href="index.php">HOME</a>
							<a href="about.php">ABOUT</a>
							<a href="contact.php">CONTACT</a>
							
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
			<h2>Account</h2>
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
			<div class="profile_info">
				<img src="img/login.png"  >

				<div>
					<?php  if (isset($_SESSION['user'])) : ?>
						<strong><?php echo $_SESSION['user']['username']; ?></strong>

						<small>
							<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
							<br>
						</small>
						<a  href="index.php?logout='1'" ><button class="button-logout">Logout</button></a>

					<?php endif ?>
				</div>
			</div>
		</div>
	<div>

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
