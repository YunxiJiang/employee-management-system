<?php
include "../connect.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Attendance_main_page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example">

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">
            <h2 class="h2">Employee Attendance</h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../dashboard.php">dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../admin/admin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../employee/employee.php">Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Performance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="attendance.php">Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Leave</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <a href="add_attendance.php" class="btn btn-warning btn-lg">Add Attendance</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Employee id</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Attendance time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
            <?php

                $sql_admin = "SELECT Employee.id, Employee.name, Employee_attendance.attendance_time FROM Employee INNER JOIN Employee_attendance ON Employee.id = Employee_attendance.employee_id;";
                $result_admin = mysqli_query($con, $sql_admin);
                if (mysqli_num_rows($result_admin) > 0) {
                    while($row = mysqli_fetch_assoc($result_admin)) {
                        $id = $row['id'];
                        echo
                        '<tbody class="table-group-divider">
                            <tr>
                                <td>' .$id. '</td>
                                <td>' .$row['name']. '</td>
                                <td>' .$row['attendance_time']. '</td>
                                <td> 
                                    <a href="update_attendance.php?updateid= '.$id.'" class="btn btn-warning">Update</a>
                                    <a href="delete_attendance.php?deleteid= '.$id.'" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>';
                    }
                }
            ?>
    </table>


</body>

</html>