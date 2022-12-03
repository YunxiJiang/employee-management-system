<?php
include "../connect.php";
include "../resources/function.php";

$error = '';

if (isset($_POST['back'])) {
    header('location:performance.php');
}
// Once press update button, update the data to the database
if (isset($_POST['submit'])) {

    $award_id = $_POST['award_id'];
    
    // Check is there the same award id in performance, if it has same id or leaving, giving the error

    if (check_same_id($con, "Performance", "award_id", $award_id)) {
        function_alert("The award id already exisit, please enter another award id", "add_performance.php");
    } else {
    
        $award_name = $_POST['award_name'];
        $sql_add_performance = "INSERT INTO `Performance`(
                                    `award_id`,
                                    `award_name`
                                    
                                )
                                VALUES($award_id,'$award_name');";
        try {
            $resulat_add_performance = mysqli_query($con, $sql_add_performance);
        } catch (Exception $e) {
            $error = 'Add error, please check the information. The error is ' . $e->getMessage();
        }

        // if add performance success, return to the performance page
        if ($resulat_add_performance) {
            // Once update successful, back to attendance page
            header('location:performance.php');
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