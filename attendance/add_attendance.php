<?php
include "../connect.php";
include "../resources/function.php";

$error = '';

if (isset($_POST['back'])) {
    header('location:attendance.php');
}
// Once press update button, update the data to the database
if (isset($_POST['submit'])) {
    
    $id = $_POST['select_id'];
    // Check is Employee already leave or have the same attendance in Employee attendance, if it is, giving the error
    $sql_checking_same_id = "SELECT employee_id FROM Employee_attendance WHERE employee_id = '$id';";
    $sql_checking_leave = "SELECT employee_id FROM Employee_leave WHERE employee_id = '$id'";
    $result_checking_same_id = mysqli_query($con, $sql_checking_same_id);
    $result_checking_leave = mysqli_query($con, $sql_checking_leave);
    if (mysqli_num_rows($result_checking_same_id) > 0) {
        function_alert("The Employee already attend, please enter another employee or update attendance information for this employee", "add_attendance.php");
    } else if (mysqli_num_rows($result_checking_leave) > 0){
        function_alert("The Employee already leave, please enter another employee or delete leave information for this employee", "add_attendance.php");
    } else {
        $attendance_time = $_POST['attendance_time'];
        $sql_add_attendance = "INSERT INTO `Employee_attendance`(
                                    `employee_id`,
                                    `attendance_time`
                                )
                                VALUES(
                                    '$id',
                                    '$attendance_time'
                                )";

        try{
            $resulat_add_attendance = mysqli_query($con, $sql_add_attendance);
        } catch(Exception $e) {
            $error = 'add error, please check information. The error is '.$e->getMessage();
        }
        
        // if add attendance success, return to the attendance page
        if ($resulat_add_attendance) {
            // Once update successful, back to attendance page
            header('location:attendance.php');
        } else {
            function_alert("Add employee attendance failed, please try again", "add_attendance.php");
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add_attandence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Employee</label>
                <select class="form-select" aria-label="Floating label select example" name="select_id">
                    <?php
                        $sql_employee_id = "SELECT id, name FROM Employee";
                        $result_employee_id = mysqli_query($con, $sql_employee_id);
                        if (mysqli_num_rows($result_employee_id) > 0) {
                            while ($row = mysqli_fetch_assoc($result_employee_id)) {
                                
                                echo
                                ' 
                                <option value="'.$row['id'].'">'.$row['id'].': '.$row['name'].'</option>
                                ';
                            }
                        } else{
                            echo '<option>There is no employee</option>';
                        }

                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Attendance time</label>
                <input type="datetime-local" class="form-control" placeholder="Enter your email" autocomplete="off" name="attendance_time">
            </div>
            <div class="form-text text-danger">
                    <?php
                        echo $error;
                    ?>
                </div>

            <button type="submit" class="btn btn-warning" name="submit">Submit</button>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>

    </div>
</body>

</html>