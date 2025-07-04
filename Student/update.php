<?php
include 'db.php';

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);

    $conn->query("UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id=$id");
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        input[type=text], input[type=email] { width: 300px; padding: 8px; margin: 4px 0; }
        input[type=submit] { padding: 8px 16px; background: #007bff; color: #fff; border: none; }
        a { text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required><br>
        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>"><br><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="index.php">Back to List</a>
</body>
</html>
