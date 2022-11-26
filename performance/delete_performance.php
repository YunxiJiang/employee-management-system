<?php
    include "../connect.php";
    include "../resources/function.php";
    $award_id_particular = $_GET['deleteid'];

    $sql_delete = "DELETE FROM Performance WHERE award_id = '$award_id_particular';";
    $result_delete = mysqli_query($con, $sql_delete);

    if($result_delete) {
        header('location:performance.php');
    } else{
        function_alert("Delete employee performance failed, please try again", "performance.php");
    }
         

?>