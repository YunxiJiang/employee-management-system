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

// Add employee to the database
function add_employee($con, $id, $name, $email, $phone_number, $gender, $date_of_birth, $department, $salary, $award_id){
    if (the_number_of_award($con) > 0){
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
    } else{
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
    }
}
?>