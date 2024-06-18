<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if 'id' parameter exists in the URL
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        // Fetch student data using the 'id' from the URL
        $student = getStudentById($id);
    } else {
        echo "No student ID provided.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $id = $_POST["student_id"]; // Correct the name to "student_id"
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $marks = $_POST["marks"];

    // Check if all required fields are filled
    if (!empty($id) && !empty($name) && !empty($email) && !empty($subject) && !empty($marks)) {
        // Call the editStudent function
        if (editStudent($id, $name, $email, $subject, $marks)) {
            header("Location: view_students.php"); // Redirect to homepage after editing
            exit();
        } else {
            echo "Error editing student.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
