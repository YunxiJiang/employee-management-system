<?php
include "../connect.php";
include "../resources/function.php";

$id = $_GET['updateid'];
$sql_for_particular_attendance = "SELECT Employee.id, Employee.name, Employee_attendance.attendance_time FROM Employee INNER JOIN Employee_attendance ON Employee.id = Employee_attendance.employee_id WHERE id=$id;";
$result_for_particular_attendance = mysqli_query($con, $sql_for_particular_attendance);
$row = mysqli_fetch_assoc($result_for_particular_attendance);
$employee_id = $row['id'];
$name = $row['name'];
$attendance_time = $row['attendance_time'];

if (isset($_POST['back'])) {
    header('location:attendance.php');
}

// Once press update button, update the data to the database
if (isset($_POST['update'])) {
    $attendance_time = $_POST['attendance_time'];

    $sql = "UPDATE Employee_attendance SET attendance_time = '$attendance_time' WHERE employee_id='$id';";
    $resulat = mysqli_query($con, $sql);

    if ($resulat) {
        // Once update successful, back to attendance page
        header('location:attendance.php');
    } else {
        function_alert("Update attendance failed, please try again", "update_attendance.php");
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
                <label class="form-label">Attendance Time</label>
                <input type="datetime-local" class="form-control" autocomplete="off" name="attendance_time">
                <div class="form-text">Current attendance time is: <?php echo "$attendance_time" ?></div>
            </div>
            <button type="submit" class="btn btn-warning" name="update">Update</button>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>

    </div>
</body>

</html>