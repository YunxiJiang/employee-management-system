<?php
    include "../connect.php";
    include "../resources/function.php";
    $id = $_GET['deleteid'];

    $sql_delete = "DELETE FROM Employee WHERE id = '$id'";
    $result_delete = mysqli_query($con, $sql_delete);

    if($result_delete) {
        header('location:employee.php');
    } else{
        function_alert("Delete employee failed, please try again", "employee.php");
    }
         

?>