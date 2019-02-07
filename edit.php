<?php
  session_start();
  require 'connect.php';
  $contact_id = $_GET['edit_id'];
  
 	if(isset($_GET['edit_id'])){

	$get_contact = mysqli_query($con, "select * from Section where Section_id = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

	
   if(isset($_POST['update'])){
		$Section_id = $_POST['Section_id'];
		$Section_name = $_POST['Section_name'];

    
    $update = "UPDATE `Section` SET `Section_id`='$Section_id',`Section_name`='$Section_name' WHERE Section_id=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: read.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>
<!DOCTYPE html>
<html>
  <title>Lab_Exam</title>
<body>
    <h1>Section</h1>
     <h3>Edit Section</h3>
      <form action="edit.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
      <label for="validationCustom01">Section ID</label>
      <input name="Section_id" type="text" value="<?php  echo $row['Section_id'];  ?>" class="form-control" id="validationCustom01" placeholder="Section ID"  autofocus required>
  </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Section Name</label>
      <input name="Section_name" type="text" value="<?php  echo $row['Section_name'];  ?>" class="form-control"  id="validationCustom02" placeholder="Section Name" value="" required>
     </div>
          <form class="myform" method="post">
                    <input class="btn" type="submit" name ="update" id="save_btn" value="Update"/>
                    <a href ="read.php"><input class="btn" type="button" id="list_btn" value="Read"/><br></a>
          </form>
    </form>
</body>
</html>
