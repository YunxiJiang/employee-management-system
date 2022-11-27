<?php
include "../connect.php";
include "../resources/function.php";

$error = '';
if (isset($_POST['back'])) {
    header('location:admin.php');
}
// Once press update button, update the data to the database
if (isset($_POST['submit'])){
    $id = $_POST['id'];

    // Check is there the same id in admin, if it is, giving the error
    $sql_checking_same_id = "SELECT id FROM Admin WHERE id = '$id';";
    $result_checking_same_id = mysqli_query($con,$sql_checking_same_id);
    if (mysqli_num_rows($result_checking_same_id) > 0){
        function_alert("The admin id already exisit, please enter another id", "add_admin.php");
    } else {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $date_of_birth = $_POST['date_of_birth'];
        $department = $_POST['department'];

        $sql_add_admin = "INSERT INTO `Admin`(
                                    `id`,
                                    `name`,
                                    `email`,
                                    `phone_number`,
                                    `gender`,
                                    `date_of_birth`,
                                    `department`
                                )
                                VALUES(
                                    '$id',
                                    '$name',
                                    '$email',
                                    '$phone_number',
                                    '$gender',
                                    '$date_of_birth',
                                    '$department'
                                )";
        try{
            $resulat_add_admin = mysqli_query($con, $sql_add_admin);
        } catch(Exception $e) {
            $error = 'Add admin error, please check information. The error is '.$e->getMessage();
        }
        
        // if add admin success, return to the admin page
        if($resulat_add_admin) {
            // Once update successful, back to admin page
            header('location:admin.php');
        }
    }
    
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add_admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="text" class="form-control" placeholder="Enter admin id" autocomplete="off" name="id">
                <div class="form-text">Format: 1xx, Example: 111</div>
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