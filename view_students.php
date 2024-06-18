<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <style>
        /* styles.css */

        body {
            font-family: Arial, sans-serif;
            background-image: url("https://images.pexels.com/photos/4050312/pexels-photo-4050312.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color:red;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color:lightcoral;
            font-weight: bold;
        }

        .actions {
            text-align: center;
            padding: 0;
            width: 200px;
            height:60px;
            display:flex;
            justify-content: center;
            gap: 1rem;
            align-items:center;
        }

        .actions a {
            display: inline-block;
            padding: 6px 12px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
        }

        .actions a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .actions a.edit {
            background-color: green;
            color: white;
        }

        .actions a.edit:hover {
            background-color: #308c2d;
        }

        .actions a.delete {
            background-color: red;
            color: #fff;
        }

        .actions a.delete:hover {
            background-color: #c82333;
        }

        .navbar-container {
            margin-bottom: 20px;
        }

        .navbar {
            background-color:blue;
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
        <h2>View Students</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Action</th>
            </tr>
            <?php
include 'db_connection.php';
// Fetch students from the database and generate table rows
$students = viewStudents();
foreach ($students as $student) {
    echo "<tr>";
    echo "<td>" . $student['student_id'] . "</td>";
    echo "<td>" . $student['name'] . "</td>";
    echo "<td>" . $student['email'] . "</td>";
    echo "<td>" . $student['subject'] . "</td>";
    echo "<td>" . $student['marks'] . "</td>";
    echo "<td class='actions'>";
    echo "<a href='edit_student_form.php?id=" . $student['student_id'] . "' class='edit'>Edit</a>";
    echo "<a href='delete_student.php?id=" . $student['student_id'] . "' class='delete'>Delete</a>";
    echo "</td>";
    echo "</tr>";
}
?>

        </table>
    </div>
</body>

</html>
