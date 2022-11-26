<?php
include "../connect.php";
include "../resources/function.php";

$error = '';

if (isset($_POST['back'])) {
    header('location:performance.php');
}
// Once press update button, update the data to the database
if (isset($_POST['submit'])) {

    if (the_number_of_employee($con) <= 0) {
        function_alert("There is no employee, please add employee first", "../employee/employee.php");
    } else {
        $award_id = $_POST['award_id'];
        // Check is there the same award id in Performance, if it is, giving the error
        $sql_checking_same_id = "SELECT award_id FROM Performance WHERE award_id = '$award_id';";
        $result_checking_same_id = mysqli_query($con, $sql_checking_same_id);
        if (mysqli_num_rows($result_checking_same_id) > 0) {
            function_alert("The award id already exisit, please enter another award id", "add_performance.php");
        } else {
            $employee_id = $_POST['employee_id'];

            $award_name = $_POST['award_name'];
            $sql_add_performance = "INSERT INTO `Performance`(
                                        `employee_id`,
                                        `award_name`,
                                        `award_id`
                                    )
                                    VALUES('$employee_id', '$award_name', '$award_id');";
            try {
                $resulat_add_performance = mysqli_query($con, $sql_add_performance);
            } catch (Exception $e) {
                $error = 'Add error, please check the information. The error is ' . $e->getMessage();
            }

            // if add performance success, return to the performance page
            if ($resulat_add_performance) {
                // Once update successful, back to attendance page
                $sql_add_award_to_employee = "UPDATE Employee SET award_id = '$award_id' WHERE id = '$employee_id';";
                $result_add_award_to_employee = mysqli_query($con, $sql_add_award_to_employee);
                header('location:performance.php');
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add_performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">

            <div class="mb-3">
                <label class="form-label">Award id</label>
                <input type="text" class="form-control" placeholder="Enter award id" autocomplete="off" name="award_id">
                <div class="form-text">Format: 3xx, Example: 311</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Award name</label>
                <input type="text" class="form-control" placeholder="Enter award name" autocomplete="off" name="award_name">
            </div>
            <div class="mb-3">
                <label class="form-label">Employee</label>
                <select class="form-select" aria-label="Floating label select example" name="employee_id">
                    <?php
                    $sql_employee_id = "SELECT id, name FROM Employee;";
                    $result_employee_id = mysqli_query($con, $sql_employee_id);
                    if (mysqli_num_rows($result_employee_id) > 0) {
                        while ($row = mysqli_fetch_assoc($result_employee_id)) {
                            echo
                            ' 
                                <option value="' . $row['id'] . '">' . $row['id'] . ': ' . $row['name'] . ' </option>
                                ';
                        }
                    } else {
                        echo '<option value="">Please add employee first</option>';
                    }

                    ?>
                </select>
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