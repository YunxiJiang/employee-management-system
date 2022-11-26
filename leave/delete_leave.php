<?php
    include "../connect.php";
    include "../resources/function.php";
    $id = $_GET['deleteid'];

    $sql_delete = "DELETE FROM Employee_leave WHERE Employee_id = '$id'";
    $result_delete = mysqli_query($con, $sql_delete);

    if($result_delete) {
        header('location:leave.php');
    } else{
        function_alert("Delete employee leave failed, please try again", "leave.php");
    }
         

?>