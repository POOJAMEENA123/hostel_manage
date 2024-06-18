<?php
include 'db_connection.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $marks = $_POST["marks"];

    if (addStudent($name, $email, $subject, $marks)) {
        header("Location: view_students.php");
        exit();
    } else {
        // If an error occurred while adding the student, display an error message
        echo "Error adding student.";
    }
}
?>
