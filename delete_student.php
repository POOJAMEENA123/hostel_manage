<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    if (deleteStudent($id)) {
        header("Location: view_students.php"); // Redirect to homepage after deleting
        exit();
    } else {
        echo "Error deleting student.";
    }
}
?>
