<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style>
  		*{
  			padding: 0;
  			margin: 0;
  			box-sizing: border-box;
  		}
  		.nav{
  			width: auto;
  			height: 30px;
  			background-color: #498DF4;
  		}
  		.logo1 {
  			padding: 30px;
  			justify-content: space-around;
  			position: absolute;
  			margin-left: 400px;
  			margin-top: -500px;
  			
  		}
  		body{
  			position: relative;
  		}
  		.headline{
  			background-color: #498DF4;
  			width: 300px;
  			border-style: none outset none outset;


  		}
  		h3{
  			color: white;
  		}
  		
  		form{
  		border-style: none outset outset outset;
  			width: 300px;
  			padding: 5px;
  			height: 200px;

  		}
  		.box {
    padding-left: 100px;
    padding-right: 100px;
    font-size: 20px;
    text-align: center;
    background-color: #f56042;
    color: white;
    border-radius: 15px;
   }
  	</style>
</head>
<body>
	<img src="logo.jpg">
	<div class="nav">	
	</div>
	<center><br><br>

		<div class="headline">
		<h3>Student LogIn Page</h3>
		</div>
		<img src="av_1.jpg" width="180" height="200" >
		<br><form action="" method="post">
			Email ID: <input type="text" name="email" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			<input class="box" type="submit" name="submit" value="LogIn">
		</form></<br>

		
		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from students where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span>Wrong UserName !!</span>
						<?php
					}
				}
			}
		?>
	</center>
</body>
</html>