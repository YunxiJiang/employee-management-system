<?php
// Useful function to call

// Display the alert box
function function_alert($message, $location) {
    echo "<script>
    alert('$message') 
    location.replace('$location')
    </script>";
}



function the_number_of_employee($con) {
    $sql_employee = "SELECT * FROM Employee;";
    $result_employee = mysqli_query($con, $sql_employee);
    
    return mysqli_num_rows($result_employee);
}

function the_number_of_award($con){
    $sql_award = "SELECT award_id FROM Performance;";
    $result_award = mysqli_query($con, $sql_award);

    return mysqli_num_rows($result_award);
}

function the_number_of_award_with_employee_id($con, $id){
    $sql_award = "SELECT employee_id FROM Performance WHERE employee_id = $id;";
    $result_award = mysqli_query($con, $sql_award);

    return $result_award->employee_id;
}

// Add employee to the database
function add_employee($con, $id, $name, $email, $phone_number, $gender, $date_of_birth, $department, $salary, $award_id){
    if (the_number_of_award($con) <= 0 || $award_id == "no_award"){
        $sql_add_employee = "INSERT INTO `Employee`(
                    `id`,
                    `name`,
                    `email`,
                    `phone_number`,
                    `gender`,
                    `date_of_birth`,
                    `department`,
                    `salary`
                )
                VALUES(
                    '$id',
                    '$name',
                    '$email',
                    '$phone_number',
                    '$gender',
                    '$date_of_birth',
                    '$department',
                    '$salary'
                );";
        $resulat_add_employee = mysqli_query($con, $sql_add_employee);
        // if add employee success, return to the employee page
        if($resulat_add_employee) {
        // Once update successful, back to employee page
        header('location:employee.php');
        } else {
        function_alert("Add employee failed, please try again", "add_employee.php");
        }
    } else{
        $sql_add_employee = "INSERT INTO `Employee`(
            `id`,
            `name`,
            `email`,
            `phone_number`,
            `gender`,
            `date_of_birth`,
            `department`,
            `salary`,
            `award_id`
        )
        VALUES(
            '$id',
            '$name',
            '$email',
            '$phone_number',
            '$gender',
            '$date_of_birth',
            '$department',
            '$salary',
            '$award_id'
        );";
        $resulat_add_employee = mysqli_query($con, $sql_add_employee);

        // synchronize award for employee
        $sql_award = "UPDATE Performance SET employee_id = '$id' WHERE employee_id = '$id'";
        $result_award = mysqli_query($con, $sql_award);

        // if add employee success, return to the employee page
        if($resulat_add_employee && $result_award) {
        // Once update successful, back to employee page
        header('location:employee.php');
        } else {
            function_alert("Add employee failed, please try again", "add_employee.php");
        }
    }
}

// Update employee to the database and synchronize award_id whithin Performance table
function update_employee($con,$id_update,$id_orignial, $name, $email, $phone_number, $gender, $date_of_birth, $department, $salary, $award_id){
    if ($award_id == "not_give_award"){
        $sql_employee = "UPDATE Employee SET id = '$id_update', name = '$name', email = '$email', phone_number = '$phone_number', gender = '$gender', date_of_birth = '$date_of_birth', department = '$department', salary = '$salary', award_id = null WHERE id='$id_orignial';";
        $sql_performance_delete = "DELETE FROM Performance WHERE employee_id='$id_orignial';";
        $result_performance_delete = mysqli_query($con, $sql_performance_delete);
        $result_employee = mysqli_query($con, $sql_employee);
        if($result_employee && $result_performance_delete) {
            // Once update successful, back to employee page
            header('location:employee.php');
        } else {
            function_alert("Update employee failed, please try again", "update_employee.php");
        }
    }  else if ($award_id == "no_award") {
        $sql_employee = "UPDATE Employee SET id = '$id_update', name = '$name', email = '$email', phone_number = '$phone_number', gender = '$gender', date_of_birth = '$date_of_birth', department = '$department', salary = '$salary', award_id = null WHERE id='$id_orignial';";
        $result_employee = mysqli_query($con, $sql_employee);
        if($result_employee) {
            // Once update successful, back to employee page
            header('location:employee.php');
        } else {
            function_alert("Update employee failed, please try again", "update_employee.php");
        }
    } else {
        $sql_employee = "UPDATE Employee SET id = '$id_update', name = '$name', email = '$email', phone_number = '$phone_number', gender = '$gender', date_of_birth = '$date_of_birth', department = '$department', salary = '$salary', award_id = '$award_id' WHERE id='$id_orignial';";
        $result_employee = mysqli_query($con, $sql_employee);
        if($result_employee) {
            // Once update successful, back to employee page
            header('location:employee.php');
        } else {
            function_alert("Update employee failed, please try again", "update_employee.php");
        }
    }

}

?>