<?php
    include "../connect.php";
    include "../resources/function.php";

    $error = '';

    $id_orignial = $_GET['updateid'];
    $sql_for_particular_employee = "SELECT * FROM Employee WHERE id=$id_orignial;";
    $result_for_particular_employee = mysqli_query($con, $sql_for_particular_employee);
    $row = mysqli_fetch_assoc($result_for_particular_employee);
    $name = $row['name'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $gender = $row['gender'];
    $date_of_birth = $row['date_of_birth'];
    $department = $row['department'];
    $salary = $row['salary'];
    // $award_id = $row['award_id'];

    if (isset($_POST['back'])) {
        header('location:employee.php');
    }

    // Once press update button, update the data to the database
    if (isset($_POST['update'])){
        $id_update = $_POST['id'];

        // Check is there the same award id in Employee, if it is, giving the error
        $sql_checking_same_id = "SELECT id FROM Employee WHERE id = '$id_update';";
        $result_checking_same_id = mysqli_query($con, $sql_checking_same_id);
        if (mysqli_num_rows($result_checking_same_id) > 0 && $id_update != $id_orignial) {
            function_alert("The employee id already exisit, please enter another employee id", "add_employee.php");
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
                update_employee($con,$id_update, $id_orignial, $name, $email, $phone_number, $gender, $date_of_birth, $department, $salary, $award_id);
            }catch (Exception $e){
                $error = 'Update error, please check the information. The error is '.$e->getMessage();
            }
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add_employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="text" class="form-control" placeholder="<?php echo ''.$id_orignial.'' ?>" autocomplete="off" name="id">
                <div class="form-text">Format: 2xx, Example: 211</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="<?php echo ''.$name.'' ?>" autocomplete="off" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="<?php echo ''.$email.'' ?>" autocomplete="off" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone number</label>
                <input type="text" class="form-control" placeholder="<?php echo ''.$phone_number.'' ?>" autocomplete="off" name="phone_number">
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <input type="text" class="form-control" placeholder="<?php echo ''.$gender.'' ?>" autocomplete="off" name="gender">
            </div>
            <div class="mb-3">
                <label class="form-label">Date of birth</label>
                <input type="date" class="form-control" placeholder="<?php echo ''.$date_of_birth.'' ?>" autocomplete="off" name="date_of_birth">
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" placeholder="<?php echo ''.$department.'' ?>" autocomplete="off" name="department">
            </div>
            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input type="text" class="form-control" placeholder="<?php echo ''.$salary.'' ?>" autocomplete="off" name="salary">
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
            <button type="submit" class="btn btn-success" name="update">Update</button>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>

    </div>
</body>

</html>