<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);

    $conn->query("INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        input[type=text], input[type=email] { width: 300px; padding: 8px; margin: 4px 0; }
        input[type=submit] { padding: 8px 16px; background: #28a745; color: #fff; border: none; }
        a { text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Phone:</label><br>
        <input type="text" name="phone"><br><br>
        <input type="submit" value="Save">
    </form>
    <br>
    <a href="index.php">Back to List</a>
</body>
</html>
