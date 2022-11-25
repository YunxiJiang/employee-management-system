<?php
    include "../connect.php";
    include "../resources/function.php";
    $id = $_GET['deleteid'];

    $sql_delete = "DELETE FROM Admin WHERE id = '$id'";
    $result_delete = mysqli_query($con, $sql_delete);

    if($result_delete) {
        header('location:admin.php');
    } else{
        function_alert("Delete admin failed, please try again", "admin.php");
    }
         

?>