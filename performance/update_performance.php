<?php
include "../connect.php";
include "../resources/function.php";

$error = '';

// get particular award id from previous page
$award_id_original = $_GET['update_award_id'];
$sql_for_original_performance = "SELECT * FROM Performance WHERE award_id='$award_id_original';";
$result_for_original_performance = mysqli_query($con, $sql_for_original_performance);
$row = mysqli_fetch_assoc($result_for_original_performance);
$award_name = $row['award_name'];

if (isset($_POST['back'])) {
    header('location:performance.php');
}

// Once press update button, update the data to the database
if (isset($_POST['update'])) {
 
    $award_name_post = $_POST['award_name'];
    $sql_update = "UPDATE Performance SET award_name = '$award_name_post' WHERE award_id = $award_id_original;";
    try {
        $result_update = mysqli_query($con, $sql_update);

    }catch(Exception $e) {
        $error = 'Update error, please check the information. The error is '.$e->getMessage();
    }
    
    if ($result_update) {
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
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Award id</label>
                <div class="form-control"><?php echo "$award_id_original" ?></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Award name</label>
                <input type="text" class="form-control" placeholder="<?php echo "$award_name" ?>" autocomplete="off" name="award_name">
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