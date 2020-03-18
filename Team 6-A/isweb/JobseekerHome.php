<html>
<head>
	<?php
	include("controllers/sessionJobseeker.php");
    include("header.php");
    include("footer.php");
	?>
	<title>Online Job Recruitment System</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="pop.css">
</head>

<script>
    let json=[
        
        ];
</script>

<body background="img/10.jpg">

	<!-- ///////////////////////background//////////////////////-->
	<div style="margin-top: 12%; margin-left:3%;">
		<?php
        $sql = "SELECT joname, jobdescription, jobsalary, jobqualifications, jobid FROM jobs";
        // var_dump($db);
        // var_dump($conn);
        $result = mysqli_query($db, $sql);
        echo (mysqli_error($db));

        if (mysqli_num_rows($result) > 0) {
            
            for($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
               $row=mysqli_fetch_assoc($result);
    ?>
                <div class="row-25 product_box height-10">
                    <h2>Job Name -<h2><h3><?php echo $row["joname"]?><br/><br/> </h3>
                    <input class="form-button" type="button" name="submit" value="More Details" onclick="displayModal(<?=$i?>)">
                </div>
                <script>
                    json.push({ "jobname":"<?php echo $row["joname"]?>",
                                "jobdescription":"<?php echo $row["jobdescription"]?>",
                                "jobsalary":"<?php echo $row["jobsalary"]?>",
                                "jobqualifications":"<?php echo $row["jobqualifications"]?>",
                                "jobid":"<?php echo $row["jobid"]?>"
                            })
                </script>
    <?php
                // var_dump($row);die;
                }
            }
    ?>
  

    <div id="modal-wrapper" class="modal">

        <form method="get" class="modal-content animate" action="jobapply.php">

        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
            
            <h1 style="text-align:center">Description about the JOB</h1>
        </div>

        <div class="container">
            Title
            <input type="text" placeholder="Title" name="modal_title" id="modal_title" disabled>
            Salary
            <input type="text" placeholder="Salary" name="modal_salary" id="modal_salary" disabled>
            <input type="hidden" name="modal_jobid" id="modal_jobid" value="" />
            Description
            <textarea name="modal_type" id="modal_type" rows="10" cols="40" disabled>Description</textarea>
            Qualifications
            <textarea name="modal_jobqualifications" id="modal_jobqualifications" rows="10" cols="40" disabled>Qualifications</textarea>
            <input type="submit" name="submit" value="Apply">

        </div>
        </form>
    </div>	
	</div>
	<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
	
</body>    	

<script>
// If user clicks anywhere outside of the modal, Modal will close

        // console.log("Shit worked");
        var modal = document.getElementById('modal-wrapper');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function displayModal(value){
            let obj=json[value];
            document.getElementById('modal_title').value = obj["jobname"];
            document.getElementById('modal_type').value = obj["jobdescription"];
            document.getElementById('modal_salary').value = obj["jobsalary"];
            document.getElementById('modal_jobqualifications').value = obj["jobqualifications"];
            document.getElementById('modal_jobid').value = obj["jobid"];
            
            document.getElementById('modal-wrapper').style.display='block';
            // console.log(obj);
        }
        
        

    </script>
</html>