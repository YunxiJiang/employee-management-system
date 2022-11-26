<?php
include "../connect.php";
include "../resources/function.php";

$error = '';
// get particular award id from previous page
$award_id_particular = $_GET['updateid'];
$sql_for_particular_performance = "SELECT Employee.id, Employee.name, Performance.award_id, Performance.award_name FROM Performance INNER JOIN Employee ON Employee.id = Performance.employee_id WHERE Performance.award_id=$award_id_particular;";
$result_for_particular_performance = mysqli_query($con, $sql_for_particular_performance);
$row = mysqli_fetch_assoc($result_for_particular_performance);
$award_name = $row['award_name'];
$award_id = $row['award_id'];

if (isset($_POST['back'])) {
    header('location:performance.php');
}

// Once press update button, update the data to the database
if (isset($_POST['update'])) {
    $employee_id = $_POST['employee_id'];

    $sql = "UPDATE Performance SET employee_id = '$employee_id' WHERE award_id='$award_id_particular';";

    try {
        $resulat = mysqli_query($con, $sql);
    }catch(Exception $e) {
        $error = 'Update error, please check the information. The error is '.$e->getMessage();
    }
    

    if ($resulat) {
        // Once update successful, back to performance page
        header('location:performance.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update_performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="mb-3">
            <label class="form-label">Award id</label>
            <div class="form-control"><?php echo "$award_id" ?></div>
        </div>
        <div class="mb-3">
            <label class="form-label">Award name</label>
            <div class="form-control"><?php echo "$award_name" ?></div>
        </div>
        <form method="post">

            <div class="mb-3">
                <label class="form-label">Employee</label>
                <select class="form-select" aria-label="Floating label select example" name="employee_id">
                    <?php
                        $sql_employee_id = "SELECT id, name FROM Employee";
                        $result_employee_id = mysqli_query($con, $sql_employee_id);
                        if (mysqli_num_rows($result_employee_id) > 0) {
                            while ($row = mysqli_fetch_assoc($result_employee_id)) {
                                
                                echo
                                ' 
                                <option value="'.$row['id'].'">'.$row['id'].': '.$row['name'].' </option>
                                ';
                            }
                        }

                    ?>
                </select>
            </div>
            <div class="form-text text-danger">
                    <?php
                        echo $error;
                    ?>
                </div>
            <button type="submit" class="btn btn-warning" name="update">Update</button>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>

    </div>
</body>

</html>