<?php
include "connect.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example">

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">
            <h2 class="h2">Employee Management System</h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header bg-dark text-white">
                    <h5 class="offcanvas-title " id="offcanvasNavbarLabel">Navigation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin/admin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="employee/employee.php">Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="performance/performance.php">Performance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="attendance/attendance.php">Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="leave/leave.php">Leave</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center bg-danger text-white">Admins</li>
                        <li class="list-group-item">Total Admin :
                            <?php
                            // show all the admins
                            $sql_admin = "SELECT * FROM Admin;";
                            $result_admin = mysqli_query($con, $sql_admin);
                            echo mysqli_num_rows($result_admin);
                            ?>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center bg-primary text-white">Employees</li>
                        <li class="list-group-item">Total Employees :
                            <?php
                            // show all the employees
                            $sql_employee = "SELECT * FROM Employee;";
                            $result_employee = mysqli_query($con, $sql_employee);
                            echo mysqli_num_rows($result_employee);
                            ?>

                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center bg-warning text-white">Attendance and Leave</li>
                        <li class="list-group-item">Attendance :
                            <?php
                            // show all the attendances
                            $sql_attendance = "SELECT * FROM Employee_attendance;";
                            $result_attendance = mysqli_query($con, $sql_attendance);
                            echo mysqli_num_rows($result_attendance);
                            ?>

                        </li>
                        <li class="list-group-item">Leave :
                            <?php
                            // show all the leaves
                            $sql_leave = "SELECT * FROM Employee_leave;";
                            $result_leave = mysqli_query($con, $sql_leave);
                            echo mysqli_num_rows($result_leave);
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5 bg-white shadow ">
            <div class="col-12">
                <div class=" text-center my-3 ">
                    <h4>Employee Award Board</h4>
                </div>
                <table class="table  table-hover">
                    <thead>
                        <tr class="bg-success text-white">
                            <th scope="col">Employee Id</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Employee Email</th>
                            <th scope="col">Employee Salary</th>
                            <th scope="col">Award</th>
                        </tr>
                    </thead>
                    <?php

                    // Search for employee with award
                    $sql_award_board = "SELECT Employee.id, Employee.name, Employee.email, Employee.salary, Performance.award_name FROM Employee INNER JOIN Performance ON Employee.award_id = Performance.award_id;";

                    $result_award_board = mysqli_query($con, $sql_award_board);

                    if (mysqli_num_rows($result_award_board) > 0) {
                        while ($row = mysqli_fetch_assoc($result_award_board)) {
                            echo
                            '<tbody>
                                <tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['name'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['salary'] . '</td>
                                    <td>' . $row['award_name'] . '</td>
                                </tr>
                            </tbody>';
                        }
                    }

                    ?>

                </table>
            </div>
        </div>

    </div>


</body>

</html>