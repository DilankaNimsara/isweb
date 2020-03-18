<html>
<head>
	<?php
		include("header.php");
		include("footer.php");
	?>
	<title>Online Job Recruitment System</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type = "text/css">
	body {
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
	}
	label {
		font-weight:bold;
		width:100px;
		font-size:14px;
	}
	.box2 {
		border:#666666 solid 1px;
		    border-radius: 20px;
	}
</style>
</head>


<body background="img/job-hunt-istock.jpg">

	<table border="0" align="right" width="80%">
		<tr>
			<td width="50%" height="500px"></td>
			<td width="50%" height="500px"	>

				<div style = "width: 500px; border: solid 1px #333333;border-radius: 20px;" align = "left">
					<div style = " background-color:#333333; color:#FFFFFF; padding:3px;font-size: 25px;border-radius: 0px;"><b>Login</b></div>
					<div style = "margin:5px ; height: 100%	border-radius: 20px;">
						<div class="container" style="border-radius: 20px;" >
							<form action = "controllers/login.php" method = "post">
								<label style="font-size: 15px">UserName  :</label><br><input type = "text" name = "username" class = "box2"/><br /><br />
								<label style="font-size: 15px">Password  :</label><br><input type = "password" name = "password" class = "box2" /><br/><br />
								<input type = "submit" value = " Submit "/>
								<a href="signup.php">
									<input type = "button" value = " Signup "/><br />
								</a>
							</form>
						</div>
						<!-- <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div> -->
					</div>
				</div>
			</td>
		</tr>
	</table>

</body>    	
</html>