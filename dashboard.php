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
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Performance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Leave</a>
                        </li>
                    </ul>

                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Admins</li>
                        <li class="list-group-item">Total Admin : 1 </li>
                        <li class="list-group-item text-center"><a href="manage-admin.php"><b>View All Admins</b></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Employees</li>
                        <li class="list-group-item">Total Employees : 2</li>
                        <li class="list-group-item text-center"><a href="manage-employee.php"> <b>View All Employees</b></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">Attendance and Leave</li>
                        <li class="list-group-item">Attendance : 0 </li>
                        <li class="list-group-item">Leave : 0 </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5 bg-white shadow ">
            <div class="col-12">
                <div class=" text-center my-3 ">
                    <h4>Employee Leadership Board</h4>
                </div>
                <table class="table  table-hover">
                    <thead>
                        <tr class="bg-dark">
                            <th scope="col">S.No.</th>
                            <th scope="col">Employee's Id</th>
                            <th scope="col">Employee's Name</th>
                            <th scope="col">Employee's Email</th>
                            <th scope="col">Salary in Rs.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1. </th>
                            <th>14</th>
                            <td>emp2</td>
                            <td>emp2@emp.com</td>
                            <td>3432423</td>
                        </tr>

                        <tr>
                            <th>2. </th>
                            <th>16</th>
                            <td>test</td>
                            <td>test@gmail.com</td>
                            <td>234</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>


</body>

</html>