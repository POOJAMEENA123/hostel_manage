<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image:url("https://th.bing.com/th/id/OIP.GmfU4p2sAo-Dzti0rVptyAHaE8?rs=1&pid=ImgDetMain");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .navbar-container {
            margin-bottom: 20px;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #555;
            color: white;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="index.html">Home</a>
        <a href="add_student.html">Add Student</a>
        <a href="view_students.php">View Students</a>
    </div>

    <div class="container">
        <h2>Edit Student</h2>
        <?php
        // Include database connection file
        include 'db_connection.php';

        // Get student_id from URL
        $student_id = isset($_GET['id']) ? $_GET['id'] : '';

        // Check if student_id is not empty
        if (!empty($student_id)) {
            // Fetch student data using $student_id from database
            $student = getStudentById($student_id);

            // Check if student exists
            if ($student) {
                $student_name = $student['name'];
                $student_email = $student['email'];
                $student_subject = $student['subject'];
                $student_marks = $student['marks'];
            } else {
                // If student doesn't exist, redirect to view_students.php
                header("Location: view_students.php");
                exit();
            }
        } else {
            // If student_id is empty, redirect to view_students.php
            header("Location: view_students.php");
            exit();
        }
        ?>
    <form action="edit_student.php" method="POST">
    <!-- Add name attribute to the hidden input -->
    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
    <div class="form-group">
        <label for="name">Name:</label>
        <!-- Make sure the 'value' attribute contains PHP tags -->
        <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>
    </div>
    <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?php echo $student['subject']; ?>" required>
    </div>
    <div class="form-group">
        <label for="marks">Marks:</label>
        <input type="number" id="marks" name="marks" value="<?php echo $student['marks']; ?>" required>
    </div>
    <button type="submit">Save Changes</button>
 </form>
    </div>
</body>

</html>
