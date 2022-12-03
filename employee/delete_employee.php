<?php
    include "../connect.php";
    include "../resources/function.php";
    $id = $_GET['deleteid'];

    $sql_delete_employee = "DELETE FROM Employee WHERE id = '$id'";

    try {
        $result_delete_employee = mysqli_query($con, $sql_delete_employee);
        // When delete employee, the information of attendance and leave will automaticly update
    } catch(Exception $e){
        echo 'Delete error, please check information. The error is '.$e->getMessage();
    }
    if($result_delete_employee) {
        header('location:employee.php');
    }
         

?>