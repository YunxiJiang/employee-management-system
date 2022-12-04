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

// Checking same id in database
function check_same_id($con,$table_name, $cell_name, $id){
    $sql = "SELECT $cell_name FROM $table_name WHERE $cell_name = $id;";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
    
}

// Add employee to the database
function add_employee($con, $id, $name, $email, $phone_number, $gender, $date_of_birth, $department, $salary, $award_id){
    if ($award_id == "not_give_award" || $award_id == "no_award"){
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
            null
        );";
        $resulat_add_employee = mysqli_query($con, $sql_add_employee);

        // if add employee success, return to the employee page
        if($resulat_add_employee) {
        // Once update successful, back to employee page
        header('location:employee.php');
        } else {
            function_alert("Add employee failed, please try again", "add_employee.php");
        }
    }else {
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

        // if add employee success, return to the employee page
        if($resulat_add_employee) {
        // Once update successful, back to employee page
        header('location:employee.php');
        } else {
            function_alert("Add employee failed, please try again", "add_employee.php");
        }
    }

    }

// delete attendance and leave information based on employee_id in database
function delete_attendance_leave($con, $id) {
    $sql_attendance = "DELETE FROM Employee_attendance WHERE employee_id = $id";
    $sql_leave = "DELETE FROM Employee_leave WHERE employee_id = $id";
    $result_performance = mysqli_query($con, $sql_attendance);
    $result_leave = mysqli_query($con, $sql_leave);
}


// Update employee to the database and synchronize award_id whithin Performance table
function update_employee($con,$id_update,$id_orignial, $name, $email, $phone_number, $gender, $date_of_birth, $department, $salary, $award_id){
    if ($award_id == "not_give_award" || $award_id == "no_award"){
        $sql_employee_update = "UPDATE Employee SET id = '$id_update', name = '$name', email = '$email', phone_number = '$phone_number', gender = '$gender', date_of_birth = '$date_of_birth', department = '$department', salary = '$salary', award_id = null WHERE id='$id_orignial';";
        $result_employee = mysqli_query($con, $sql_employee_update);
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