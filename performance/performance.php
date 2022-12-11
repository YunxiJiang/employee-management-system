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
    <title>Performance_main_page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example">

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">
            <h2 class="h2">Employee Performance</h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header bg-dark text-white">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../admin/admin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../employee/employee.php">Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="performance.php">Performance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../attendance/attendance.php">Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../leave/leave.php">Leave</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <a href="add_performance.php" class="btn btn-info btn-lg">Add Performance</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Award id</th>
                <th scope="col">Award Name</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
            <?php
                $sql_performance = "SELECT * FROM Performance;";
                $result_performance = mysqli_query($con, $sql_performance);
                if (mysqli_num_rows($result_performance) > 0) {
                    $count = 1;
                    while($row = mysqli_fetch_assoc($result_performance)) {
                        $award_id = $row['award_id'];
                        $award_name = $row['award_name'];
                        echo
                        '<tbody class="table-group-divider">
                            <tr>
                                <td>' .$count. '</td>
                                <td>' .$award_id. '</td>
                                <td>' .$award_name. '</td>
                                <td> 
                                    <a href="update_performance.php?update_award_id='.$award_id.'" class="btn btn-info">Update</a>
                                    
                                </td>
                                <td>
                                    <a href="delete_performance.php?deleteid= '.$award_id.'" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>';
                        $count = $count + 1;
                    }
                }
            ?>
    </table>

    


</body>

</html>