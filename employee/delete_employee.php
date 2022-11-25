<?php
    include "../connect.php";
    $id = $_GET['deleteid'];

    $sql_delete = "DELETE FROM Employee WHERE id = '$id'";
    $result_delete = mysqli_query($con, $sql_delete);

    if($result_delete) {
        header('location:employee.php');
    }
?>