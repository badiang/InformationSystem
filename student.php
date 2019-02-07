<?php
  session_start();
  require 'connect.php';
  if(isset($_POST['save'])){
    $Student_number = $_POST['Student_number'];
    $First_name = $_POST['First_name'];
    $Last_name = $_POST['Last_name'];
    $Middle_initial = $_POST['Middle_initial'];
    $Birthday = $_POST['Birthday'];
    $Section = $_POST['Section'];
 
    $insert_information = "INSERT INTO `Student` (`Student_number`, `First_name`, `Last_name`, `Middle_initial`, `Birthday`, `Section` ) VALUES ('$Student_number', '$First_name', '$Last_name', '$Middle_initial', '$Birthday', '$Section')";
    
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
              <label for="validationCustom02">Student_number</label>
              <input name="Student_number" type="number" class="form-control"  id="validationCustom05" placeholder="Section ID" value="" required>
          </div>
          <div class="textbox">
              <label for="validationCustom01">First_name</label>
              <input name="First_name" type="text" class="form-control" id="validationCustom01" placeholder="First name"  autofocus required>
          </div>
        </div>
          <div class="textbox">
              <label for="validationCustom01">Last_name</label>
              <input name="Last_name" type="text" class="form-control" id="validationCustom01" min="1" placeholder="Last name"  autofocus required>
          </div>
        </div>
          <div class="textbox">
              <label for="validationCustom01">Middle_initial</label>
              <input name="Middle_initial" type="text" class="form-control" id="validationCustom01" placeholder="Middle initial"  autofocus required>
          </div>
        </div>
          <div class="textbox">
              <label for="validationCustom01">Birthday</label>
              <input name="Birthday" data-format='yyyy/mm/dd' type="date" class="form-control" id="validationCustom01" placeholder="Birthday"  autofocus required>
          </div>
        </div>
         <tr>
          <td>Section</td>
          <td>
          <select name="Section" required>
            <option value="">Select your Section</option>
          <?
            
              $sql = "SELECT * FROM Section";
              $records=mysqli_query($con,$sql);
              while($information=mysqli_fetch_assoc($records)){

          ?>
              <option value="<?php echo $information['Section_id'] ?>"><?php echo $information['Section_name']; ?></option>
          <?php
            }
            ?>
          
          </select>

           <form class="myform" method="post">
                    <input class="btn" type="submit" name ="save" id="save_btn" value="Create"/>
                    <a href ="read_student.php"><input class="btn" type="button" id="read_btn" value="Read"/><br></a>
                    <a class="btn" href="index.html">Home</a>
          </form>
        </td>
      </tr>
           
    </form>
</body>
</html>
