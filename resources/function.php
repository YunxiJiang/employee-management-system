<?php
// Useful function to call

// Display the alert box
function function_alert($message, $location) {
    echo "<script>
    alert('$message') 
    location.replace('$location')
    </script>";
} 
?>