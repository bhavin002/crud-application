<?php
    require 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITING</title>
    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        .semester{
            margin-top: 7px;
        }
        body{
            background-color: rgb(240, 245, 245);
        }
        form{
            background-color: rgb(179, 204, 204);
            padding-left: 70px;
            padding-top: 40px;
            margin-bottom: 30px;
            border-radius: 15px;
        }
        .submit{
            border-radius: 5px;
            background-color: rgb(82, 122, 122);
            border: 2px solid #85adad;
            color: white;
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <h2 class="p-4">Update Record</h2>
        <?php
            $connect = mysqli_connect("localhost","root","","rdbms") or die("Not connect");
            $std_rno = $_GET['sid'];
            $sql = "select * from tblstud_info where rno = {$std_rno}";
            $result = mysqli_query($connect,$sql);

            if(mysqli_num_rows($result)>0){

                while($row = mysqli_fetch_assoc($result)){
        ?>
<form class="offset-1" action="updatedata.php" method="post">
    <div class="row">
    <div class="form-group col-md-3">
      <b>Roll_No :</b> 
      <input type="text" class="form-control" name="rno" value="<?php echo $row['rno']?>" required>
    </div>
    <div class="form-group col-md-3">
       <b>First_Name :</b> <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']?>"  required>
    </div>
    <div class="form-group col-md-4">
       <b>Last_Name :</b> <input type="text" class="form-control"  name="lname" value="<?php echo $row['sname']?>" required>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-3 mb-3">
      <label><b> Department_Name :</b></label>
        <?php
            $sql1 = "select * from tbldept";
            $result1 = mysqli_query($connect,$sql1) or die("Query Unseccfull");
            if(mysqli_num_rows($result1)>0){
                echo "<select class='custom-select' name='department'>";
            while($row1 = mysqli_fetch_assoc($result1))
            { 
                if($row['dno']==$row1['dno']){
                    $select ="selected";
                }else{
                    $select = " ";
                }
               echo  "<option {$select} value='{$row1['dno']}'>{$row1['dname']}</option>";
            }
            echo "</select>";
        }
            ?>
    </div>
    <div class="form-group col-md-3">
       <b>Semester : </b> <input type="text" class="form-control semester" name="sem" value="<?php echo $row['sem']?>" required>
    </div>
    <div class="form-group col-md-4">
        <b>Contact_No :</b> <input type="text" class="form-control semester" name="phone" value="<?php echo $row['contact_no']?>" required>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-3">
    <b>Gender : </b>
                <section require>
                    <label for="genderm">
                        <input type="radio" id="genderm" name="gender" value="male" required> male <br>
                    </label>
                    <label for="genderf">
                        <input type="radio" id="genderf" name="gender" value="female" required> female <br>
                    </label>
                </section>
      </div>
      <div class="form-group col-md-4">
      <b>Brith date : </b>
      <input type="date" name="bdate" min="1910-01-01" max="2023-01-01" class="p-2" value="<?php echo $row['bdate']?>" required>
      </div>
      <div class="form-group semester  col-md-2">
          <input type="submit" value="Update" class="px-5 py-1 submit" >
      </div>
      </div>
</form>
    <?php } 
        } ?>
</div>
</body>
</html>