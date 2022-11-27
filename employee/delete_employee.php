<?php
    include "../connect.php";
    include "../resources/function.php";
    $id = $_GET['deleteid'];

    $sql_delete_employee = "DELETE FROM Employee WHERE id = '$id'";

    // When delte employee, also delete attendance and leave for this employee
    $sql_delete_attendance = "DELETE FROM Employee_attendance WHERE employee_id = '$id';";
    $sql_delete_leave = "DELETE FROM Employee_leave WHERE employee_id = '$id';";

    // Set award for this employee to null
    $sql_set_null_award = "UPDATE Performance SET employee_id = null WHERE employee_id = '$id';";

    try {
        $result_delete_employee = mysqli_query($con, $sql_delete_employee);
        $result_delete_attendance = mysqli_query($con, $sql_delete_attendance);
        $result_delete_attendance = mysqli_query($con, $sql_delete_leave);
        $result_set_null_award = mysqli_query($con, $sql_set_null_award);
    } catch(Exception $e){
        echo 'Delete error, please check information. The error is '.$e->getMessage();
    }
    if($result_delete_employee && $result_delete_attendance && $result_delete_attendance && $result_set_null_award) {
        header('location:employee.php');
    }
         

?>