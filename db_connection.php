<?php
$servername = "localhost";
$username = "root";
$password = "dinesh";
$database = "student_management";


$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a student
function addStudent($name, $email, $subject, $marks) {
    global $conn;
    $sql = "INSERT INTO students (name, email, subject, marks) VALUES ('$name', '$email', '$subject', $marks)";
    return $conn->query($sql);
}

// Function to view all students
function viewStudents() {
    global $conn;
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    $students = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    return $students;
}

// Function to edit a student
function editStudent($id, $name, $email, $subject, $marks) {
    global $conn;
    $sql = "UPDATE students SET name='$name', email='$email', subject='$subject', marks=$marks WHERE student_id=$id";
    return $conn->query($sql);
}

// Function to delete a student
function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM students WHERE student_id=$id";
    return $conn->query($sql);
}

// Function to get student by ID
function getStudentById($id) {
    global $conn;
    $sql = "SELECT * FROM students WHERE student_id=$id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
?>
