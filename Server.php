<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$input = "NOT";
		$FullName = $_POST['fname'];
		$Email = $_POST['email'];
		$Mobile = $_POST['mobile'];
		$Gender = $_POST['gender'];
		$Photo = $_FILES['photo']['name'];

		if(strlen($FullName) < 8){
			$input = "NOT";
		}
		else{
			if(preg_match('#[0-9]#', $FullName)){
				$input = "NOT";
			}else{
				$input = "OK";
			}
		}
		if(strlen($Mobile) != 10){
			$input = "NOT";
		}
		else{
			$input = "OK";
		}

		if($input == "OK")
		{

			$newPath = "C:/xampp/htdocs/1010/users/".$_FILES['photo']['name'];
			$oldPath = $_FILES['photo']['tmp_name'];
			move_uploaded_file($oldPath, $newPath);

			$server = "127.0.0.1";
			$user = "root";
			$pass = "Akshay";
			$database = "company";

			$conn = mysqli_connect($server, $user, $pass, $database);
			if(mysqli_connect_error()){
				echo "Connection Fail ".mysqli_connect_error();
			}else{
				//echo "Connected";
			}

			$sql = "INSERT INTO employee (id, fname, email, mobile, gender, photo) VALUES (null,'$FullName','$Email','$Mobile','$Gender','$Photo');";
			if(mysqli_query($conn,$sql))
			{
				?>
				<script type="text/javascript">
					alert("Data Inserted");
				</script>
				<?php
			}

			//echo " <img src = 'users/".$Photo."'>";

			$fetch = "SELECT * FROM employee;";
			$result = mysqli_query($conn,$fetch);
			while($row = mysqli_fetch_assoc($result)){
				// echo "<br><br>";
				// print_r($row);
				
				$id = $row['id'];
				$full = $row['fname'];
				$emailID = $row['email'];
				$Mob = $row['mobile'];
				$gen = $row['gender'];
				$pic = $row['photo'];

				//echo "$id <br> $full <br> $emailID <br> $Mob <br> $gen <br> $pic";

				?>
				<div class="card">
					<?php
						
						echo " <img src = 'users/".$pic."'>";
						echo "<span >";
						echo " 	<h3> $full </h3>";
						echo " 	$gen <br>$emailID";
						echo " 	<br>$Mob<br><br>";
						echo "</span>";
					?>

				</div>


				<?php



			}
		}else{
			echo "Invalid Data Entered";
		}

		// echo "$FullName <br> $Email <br> $Mobile <br> $Gender <br>";
	}	
?>

<style type="text/css">
	.card
	{
		float: left;
		overflow: hidden;
		flex-wrap: wrap;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		width: 20%;
		height :30vw;
		margin: 20px;
	}
	img{
		width: 100%;
		height: 65%;
	}
	span{
		
	}

</style>