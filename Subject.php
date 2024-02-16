<?php
include("includes/db.php");
if(!isset($_POST['submit']))
	$cname  =$_GET['cname'];
else
	$cname  = $_POST['cname'];
?>
<html>
	<head>
		<title>College Info</title>
		<link rel = "stylesheet" href ="styles/style.css" media = "all">
		<style>
				table, th, td {  
					border: 1px solid black;  
					border-collapse:collapse;  
				}  
				th, td {  
					padding: 20px;  
				}  
				table tr:nth-child(even) {  
					background-color: #eee;  
				}  
				table tr:nth-child(odd) {  
					background-color: #fff;  
				}  
				table th {  
					color: white;  
					background-color: orange;  
				}  
		</style>
	</head>
	
	<body>

	     <div class = "main_wrapper">
			<div class = "header_wrapper"> 
			     <img id ="logo" src ="images/College.png" />
				 
			</div>
			<div class="menubar"> 
				<ul id="menu">
					<li><a href = "index.php">Home<a></li>
					<li><a href = "course.php">Course<a></li>
					<li><a href = "teacher.php">Teacher<a></li>
					<li><a href = "gallery.php">Gallery <a></li>
					<li><a href = "info.php">NEWS <a></li>
					<li><a href = "admin_area/index.php"> Admin<a></li>
				</ul>
			 </div>
			
			<div class ="content_wrapper">
				<div id = "sidebar">
				  <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
				    <b style = "font-size:22px;color:red;font-family:Arial;">Address:</b><br>
					Burudgaon Rd, Near ITI, Bhavani Nagar, Ahmednagar, Maharashtra 414001</b>
				</marquee>
				</div>
			 
				<div id = "content_area"> <br><br><br>
				<center>
				<form action = "Subject.php" method="post">
				   <table id="alter">
							<tr>
								<th>Course Name</th>
								<td><input type="text" name = "cname" value = "<?php echo $cname; ?>"></td>
							</tr>
							<tr>
								<th>Select Semister</th>
								<td>
									<select name = "semister">
										<option name = 'First'>FIRST </option>
										<option name = 'Second'>SECOND </option>
										<option name = 'Third'>THIRD </option>
										<option name = 'Fourth'>FOURTH </option>
										<option name = 'Fifth'>FIFTH </option>
										<option name = 'Sixth'>SIXTH </option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2"><center><input type="submit" value ="Display" name = "submit"></center></td>
							</tr>
					</table>
					<br><br><br>
					</form>
					
					<?php
						if(isset($_POST['submit']))
						{
							$count = 1;
							
							$x = $_POST['semister'];
							
							$sql1 = "select * from subject where Course_semister = '$x' and Course_name = '$cname'";
							
							$result = mysqli_query($con,$sql1);
							
							echo "<table style = 'width:700px;'>";
							
							echo "<tr><th style ='background:black;'>Sr No</th> <th style ='background:black;'>Subject Name</th></tr>";
							
							while($row = mysqli_fetch_array($result))
								{
									
									echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$row['Course_subject']."</td>";
									echo "</tr>";
									$count++;
								}
							
							echo "</table>";
						}
					?>
					<center>
				</div>
			 </div> 

		
			 <div id ="footer"> 
				<center><h2 style = "line-height:70px; color:white;">Copyright &copy; 2017-<?php echo date('Y'); ?>. <a href="YOUR_URL">Disclaimer.</a></h2></center>
			 </div>
			 
		 </div>
	</body>
</html>

