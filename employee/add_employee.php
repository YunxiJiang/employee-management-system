<?php
include "../connect.php";
include "../resources/function.php";

if (isset($_POST['back'])) {
    header('location:employee.php');
}
// Once press update button, update the data to the database
if (isset($_POST['submit'])){
    $id = $_POST['id'];

    // Check is there the same id in Employee, if it is, giving the error
    $sql_checking_same_id = "SELECT id FROM Employee WHERE id = '$id';";
    $result_checking_same_id = mysqli_query($con,$sql_checking_same_id);
    if (mysqli_num_rows($result_checking_same_id) > 0){
        function_alert("The id already exisit, please enter another id", "add_employee.php");
    } else {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $date_of_birth = $_POST['date_of_birth'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];

        $sql_add_employee = "INSERT INTO `Employee`(
                                    `id`,
                                    `name`,
                                    `email`,
                                    `phone_number`,
                                    `gender`,
                                    `date_of_birth`,
                                    `department`,
                                    `salary`
                                )
                                VALUES(
                                    '$id',
                                    '$name',
                                    '$email',
                                    '$phone_number',
                                    '$gender',
                                    '$date_of_birth',
                                    '$department',
                                    '$salary'
                                )";
        
        $resulat_add_employee = mysqli_query($con, $sql_add_employee);
        // if add employee success, return to the employee page
        if($resulat_add_employee) {
            // Once update successful, back to employee page
            header('location:employee.php');
        } else {
            function_alert("Add employee failed, please try again", "add_employee.php");
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
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>

    </div>
</body>

</html>