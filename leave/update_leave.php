<?php
include "../connect.php";
include "../resources/function.php";

$id = $_GET['updateid'];
$sql_for_particular_leave = "SELECT Employee.id, Employee.name, Employee_leave.leave_time FROM Employee INNER JOIN Employee_leave ON Employee.id = Employee_leave.employee_id WHERE id=$id;";
$result_for_particular_leave = mysqli_query($con, $sql_for_particular_leave);
$row = mysqli_fetch_assoc($result_for_particular_leave);
$employee_id = $row['id'];
$name = $row['name'];
$leave_time = $row['leave_time'];
$error = '';
if (isset($_POST['back'])) {
    header('location:leave.php');
}

// Once press update button, update the data to the database
if (isset($_POST['update'])) {
    $leave_time = $_POST['leave_time'];

    $sql = "UPDATE Employee_leave SET leave_time = '$leave_time' WHERE employee_id='$id';";
    try{
        $resulat = mysqli_query($con, $sql);
    }
    catch(Exception $e){
        $error = 'Update error, please check leave time. The error is '.$e->getMessage();
    }

    if ($resulat) {
        // Once update successful, back to leave page
        header('location:leave.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update_leave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="mb-3">
            <label class="form-label">Id</label>
            <div class="form-control"><?php echo "$employee_id" ?></div>
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <div class="form-control"><?php echo "$name" ?></div>
        </div>
        <form method="post">

            <div class="mb-3">
                <label class="form-label">Leave Time</label>
                <input type="datetime-local" class="form-control" autocomplete="off" name="leave_time">
                <div class="form-text">Current leave time is: <?php echo "$leave_time" ?></div>
                <div class="form-text text-danger">
                    <?php
                        echo $error;
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-warning" name="update">Update</button>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>

    </div>
</body>

</html>