<?php
session_start();
require 'connect.php';
	$sql = "SELECT * FROM Section";
	$records=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
	<title>Lab_Exam</title>
<body>
	<a class="btn" href="index.html">Home</a>
	<a class="btn" href="section.php">Add</a>
		<h1>Section</h1>
      <table>
      	<tr>
      		<th>Section_id</th>
      		<th>Section_name</th>
            <th >Action</th>
      	</tr>
	       	<?php
      		while($information=mysqli_fetch_assoc($records)){
      			echo "<tr>";?>

						<td><?php echo $information['Section_id'] ?></td>
						<td><?php echo $information['Section_name'] ?></td>
						<td>
								<a href="delete.php?delete_id=<?php echo $information['Section_id']; ?>">Delete</i></a>
						</td>
						<td>
							<a href="edit.php?edit_id=<?php echo $information['Section_id']; ?>">Edit</i></a>
						</td>
				
					</tr>


					</tr>
    	<?php
    		}
      	?>
      </table>
</body>
</html>