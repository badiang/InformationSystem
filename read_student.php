<?php
session_start();
require 'connect.php';
	$records=mysqli_query($con,"SELECT * FROM Student , Section WHERE Student.Section = Section.Section_id");

?>

<!DOCTYPE html>
<html>
	<title>Lab_Exam</title>
<body>
	<a class="btn" href="index.html">Home</a>
	<a class="btn" href="student.php">Add</a>
		
			<h1>Student List</h1>
      <table class="table table-bordered table-hover table-striped" >
      	<tr>
      		<th>Student_number</th>
      		<th>First_name</th>
      		<th>Last_name</th>
      		<th>Middle_initial</th>
      		<th>Birthday</th>
      		<th>Section</th>
            <th colspan='2'>Action</th>
      	</tr>
	       	<?php
      		while($information=mysqli_fetch_array($records)){
      			echo "<tr>";?>

						<td><?php echo $information['Student_number'] ?></td>
						<td><?php echo $information['First_name'] ?></td>
						<td><?php echo $information['Last_name'] ?></td>
						<td><?php echo $information['Middle_initial'] ?></td>
						<td><?php echo $information['Birthday'] ?></td>
						<td><?php echo $information['Section_name'] ?></td>
						<td>
								<a href="delete_student.php?delete_id=<?php echo $information['Student_number']; ?>">Delete</i></a>
						</td>
						<td>
							<a href="edit_student.php?edit_id=<?php echo $information['Student_number']; ?>">Edit</i></a>
						</td>
					</tr>


					</tr>
    	<?php
    		}
      	?>
      </table>
</body>
</html>