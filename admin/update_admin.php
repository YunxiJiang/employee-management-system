<?php
    include "../connect.php";
    include "../resources/function.php";

    $error = '';

    $id = $_GET['updateid'];
    $sql_for_particular_admin = "SELECT * FROM Admin WHERE id=$id;";
    $result_for_particular_admin = mysqli_query($con, $sql_for_particular_admin);
    $row = mysqli_fetch_assoc($result_for_particular_admin);
    $name = $row['name'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $gender = $row['gender'];
    $date_of_birth = $row['date_of_birth'];
    $department = $row['department'];

    if (isset($_POST['back'])) {
        header('location:admin.php');
    }

    // Once press update button, update the data to the database
    if (isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $date_of_birth = $_POST['date_of_birth'];
        $department = $_POST['department'];

        $sql = "UPDATE Admin SET name = '$name', email = '$email', phone_number = '$phone_number', gender = '$gender', date_of_birth = '$date_of_birth', department = '$department' WHERE id='$id';";

        try {
            $resulat = mysqli_query($con, $sql);
        } catch(Exception $e){
            $error = 'Update error, please check information. The error is '.$e->getMessage();
        }
        
        
        if($resulat) {
            // Once update successful, back to admin page
            header('location:admin.php');
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