<?php
   include('../functions.php');
   if(count($_POST)>0) {
   	$sql = "UPDATE users set username='" . $_POST["username"]. "', email='" . $_POST["email"]."', user_type='" . $_POST["user_type"]. "' WHERE id='" . $_POST["id"] . "'";
   	mysqli_query($db,$sql);
   	$message = "Record Modified Successfully!!";
   }
   $select_query = "SELECT * FROM users WHERE id='" . $_GET["id"] . "'";
   $result = mysqli_query($db,$select_query);
   $row = mysqli_fetch_array($result);
   ?>
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
      <div class="login-area-after-login">
      <div class="header-after-login">
         <h2>Admin - Edit User </h2>
      </div>
      <div >
      <form name="frmUser" method="post" action="">
         <div>
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <div align="right" style="padding-bottom:50px;">
               <a href="manage_user.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List User</a>
            </div>
            <table border="0" cellpadding="10" cellspacing="20" width="auto"  class="tblSaveForm">
               <tr class="tableheader">
                  <td colspan="2">Edit User</td>
               </tr>
               <tr>
                  <td><label>Username</label></td>
                  <td><input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>"><input type="text" name="username" class="txtField" value="<?php echo $row['username']; ?>"></td>
               </tr>
               <td><label>Email</label></td>
               <td><input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>"></td>
               <td><label>User type</label></td>
               <td>
               <select name="user_type" id="user_type" >
                  <option value=""></option>
                  <option value="admin">Admin</option>
                  <option value="lecturer">Lecturer</option>
                  <option value="student">Student</option>
               </select>
               </td>
               <tr>
                  <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
               </tr>
            </table>
         </div>
      </form>
      </div>
      </div>
   </div>
</head>
   <body>
   
   </body>
</html>