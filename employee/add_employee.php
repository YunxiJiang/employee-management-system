<?php
include "../connect.php";
include "../resources/function.php";

$error = '';

if (isset($_POST['back'])) {
    header('location:employee.php');
}
// Once press update button, update the data to the database
if (isset($_POST['submit'])){
    $id = $_POST['id'];

    // Check is there the same id in Employee, if it is, giving the error
    if (check_same_id($con, "Employee", "id", $id)){
        function_alert("The id already exisit, please enter another id", "employee.php");
    } else {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $date_of_birth = $_POST['date_of_birth'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];
        $award_id = $_POST['award_id'];

        try{
            add_employee($con,$id,$name,$email,$phone_number,$gender,$date_of_birth,$department,$salary,$award_id);

        }catch(Exception $e){
            $error = 'add error, please check the information. The error is '.$e->getMessage();
        }
    }
        
    
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update_employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="text" class="form-control" placeholder="Enter employee id" autocomplete="off" name="id">
                <div class="form-text">Format: 2xx, Example: 211</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" autocomplete="off" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" autocomplete="off" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone number</label>
                <input type="text" class="form-control" placeholder="Enter your phone number" autocomplete="off" name="phone_number">
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <input type="text" class="form-control" placeholder="Enter your gender" autocomplete="off" name="gender">
            </div>
            <div class="mb-3">
                <label class="form-label">Date of birth</label>
                <input type="date" class="form-control" placeholder="Enter your date of birth" autocomplete="off" name="date_of_birth">
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" placeholder="Enter your Department" autocomplete="off" name="department">
            </div>
            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input type="text" class="form-control" placeholder="Enter salary" autocomplete="off" name="salary">
            </div>
            <div class="mb-3">
                <label class="form-label">Award</label>
                <select class="form-select" aria-label="Floating label select example" name="award_id">
                    <?php
                    $sql_award = "SELECT award_id, award_name FROM Performance;";
                    $result_award = mysqli_query($con, $sql_award);
                    if (mysqli_num_rows($result_award) > 0) {
                        while ($row = mysqli_fetch_assoc($result_award)) {
                            echo
                            ' 
                                <option value="'.$row['award_id'].'">'.$row['award_id'].': '.$row['award_name'].' </option>
                                ';
                        }
                        echo '<option value="not_give_award">Not give award</option>';
                    } else{
                        echo '<option value="no_award">There is no award yet</option>';
                    }

                    ?>
                </select>
            </div>
            <div class="form-text text-danger">
                    <?php
                        echo $error;
                    ?>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>

    </div>
</body>

</html>