<?php
  session_start();
  require 'connect.php';
  if(isset($_POST['save'])){
    $Section_id = $_POST['Section_id'];
    $Section_name = $_POST['Section_name'];
 
    $insert_information = "INSERT INTO `Section` (`Section_id`, `Section_name` ) VALUES ('$Section_id', '$Section_name')";
    
    if (mysqli_query($con, $insert_information)) {
      echo"
        <script>
          alert('Data Inserted!!!')</script>";
    } else {
        echo "Error: " . $insert_information . "<br>" . mysqli_error($con);
    }

      }


?>


<!DOCTYPE html>
<html>
	<title>Lab_Exam</title>
<body>
		<h1>Section</h1>
		 <form class="needs-validation" action="" method='post'>
  			<div class="textbox">
  				<div class="textbox">
				      <label for="validationCustom02">Section ID</label>
				      <input name="Section_id" type="text" class="form-control"  id="validationCustom05" placeholder="Section ID" value="" required>
    			</div>
    			<div class="textbox">
	      			<label for="validationCustom01">Section name</label>
	      			<input name="Section_name" type="text" class="form-control" id="validationCustom01" placeholder="Section name"  autofocus required>
    			</div>
    		</div>
    			<form class="myform" method="post">
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
				            <a href ="read.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                    <a class="btn" href="index.html">Home</a>
  				</form>
		</form>
</body>
</html>
