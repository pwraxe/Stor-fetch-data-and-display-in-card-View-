<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<style type="text/css">
			fieldset{
				width: 350px;
				margin-top: 80px;
				background-color: white;
			}
			form{
				text-align: left;
			}
			.io{
				width: 90%;
				padding: 15px;
				border: 2px solid gray;
				border-radius: 0%;
				outline: 0;
				
			}
			.io:hover
			{
				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.9); 
				border: 2px solid black;
			}
			.button{
				width: 100%;
				padding: 15px;
				border-radius: 10px;	
				border: 2px solid black;
				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3); 
			}
			.button:hover{
				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.9); 
			}
			.button:focus{
				outline: 0;
			}
		</style>

	</head>
	<body style="background-color: #0040ff;">
		<?php
			$fullNameErr = $emailErr = $mobileErr = "";
		?>

		<center>
			<fieldset>
				<h1>Join Us!</h1>
				<form method="post" action="Server.php" enctype="multipart/form-data">
					Full Name :<br>
					<input class = "io" type="text" name="fname" placeholder="Ex. Akshay Sunil Pawar" required> 
					<span> <?php echo $fullNameErr; ?></span><br><br>

					Email ID  : <br>
					<input class = "io" type="email" name="email" placeholder="Ex. pawarakshay13@gmail.com" required><br><br>

					Mobile No : <br>
					<input class = "io" type="number" name="mobile" placeholder="Ex. 9657513437" required>
					<span>  <?php echo $mobileErr; ?> </span><br><br>
					
					Gender : <input type="radio" name="gender" value="Male" required> Male 
					<input type="radio" name="gender" value="Female" required>Female<br><br>


					Upload Photo : <br>
					<input class = "io" type="file" name="photo" required><br><br>

					<input type="submit" name="submit" value = "Submit" class="button">
				</form>

			</fieldset>
		</center>


	</body>
</html>