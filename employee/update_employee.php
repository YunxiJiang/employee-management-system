<?php
include "../connect.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update_employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Date of birth</label>
                <input type="text" class="form-control">
                <div class="form-text">Format: yyyy-mm--dd</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <button type="submit" class="btn btn-primary">Back</button>
        </form>

    </div>
</body>

</html>