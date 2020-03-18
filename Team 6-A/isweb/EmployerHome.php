<html>
<head>
	<?php
	include("controllers/sessionEmployer.php");
	include("header.php");
	include("footer.php");
	?>
	<title>Online Job Recruitment System</title>
	<link rel="stylesheet" type="text/css" href="pop.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="tble.css">


</head>


<body background="img/10.jpg">

	
	
	<input type="button" name="newjob" value="New Job" onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:200px; margin-left:100px;">

	<input type="button" name="dltjob" value="Delete Job" onclick="document.getElementById('modal-wrapper2').style.display='block'" style="width:200px; margin-left:100px;">

	<br/><br/><br/>

	<table id="tble">
		<tr>
			<th>Job ID</th>
			<th>Job Name</th>
			<th>Description</th>
			<th>Salary</th>
			<th>Qualifications</th>
		</tr>
		<?php
		$nic=$_SESSION['nic'];
				// var_dump($nic);
		echo "<h2>My Jobs<h2>";
		$sql = "SELECT * FROM jobs where employernic='$nic'";
		$result = $conn->query($sql);

		if (mysqli_num_rows($result) > 0) {

			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["jobid"]."</td><td>".$row["joname"]."</td><td>".$row["jobdescription"]."</td><td> ".$row["jobsalary"]."</td><td> ".$row["jobqualifications"]."</td></tr>";
			}
		} else {
			echo "0 results";
		}
		?>
	</table>
	<br/><br/><br/>
	<table id="tble">
		<tr>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last name</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>JOb ID</th>
		</tr>
		<?php
		
				// var_dump($nic);
		echo "<h2>Applications You have got<h2>";
		$sql2 = "SELECT * FROM application where jobsjobid in (SELECT jobid from jobs where employernic='$nic')";
		$result2 = $conn->query($sql2);

		if (mysqli_num_rows($result2) > 0) {

			while($row2 = $result2->fetch_assoc()) {
				echo "<tr><td>".$row2["fname"]."</td><td>".$row2["mname"]."</td><td>".$row2["lname"]."</td><td> ".$row2["address"]."</td><td> ".$row2["gender"]."</td><td> ".$row2["email"]."</td><td> ".$row2["tp"]."</td><td> ".$row2["jobsjobid"]."</td></tr>";
			}
		} else {
			echo "0 results";
		}
		?>
	</table>





</div>





<!-- Insert Popup -->
<div id="modal-wrapper" class="modal">

	<form class="modal-content animate" action="./controllers/editJob.php" method="post">

		<div class="imgcontainer">
			<span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
			<h1 style="text-align:center">Create a new Job</h1>
		</div>

		<div class="container">
			<input type="text" placeholder="Enter Job Name" name="jname">
			<input type="text" placeholder="Enter Job Description" name="jdesc">
			<input type="text" placeholder="Enter Job Salary" name="jsal">
			<input type="text" placeholder="Enter Job Qualifications" name="jqual">
			
			<button type="submit">Insert</button>
		</div>

	</form>

</div>

<!-- Delete popup -->
<div id="modal-wrapper2" class="modal2">

	<form class="modal-content animate" action="./controllers/dltJob.php" method="post">

		<div class="imgcontainer">
			<span onclick="document.getElementById('modal-wrapper2').style.display='none'" class="close" title="Close PopUp">&times;</span>
			<h1 style="text-align:center">Delete a JOB</h1>
		</div>

		<div class="container">
			<input type="text" placeholder="Enter Job Id" name="jid">      
			<button type="submit">Delete</button>

		</div>
	</form>
</div>


</body>    	

<script>

	var modal = document.getElementById('modal-wrapper');
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}


	var modal2 = document.getElementById('modal_wrapper2');
	window.onclick = function(event2) {
		if (event2.target == modal2) {
			modal2.style.display = "none";
		}
	}

</script>

</html>