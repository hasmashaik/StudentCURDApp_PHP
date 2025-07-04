<?php
include 'db.php';
$result = $conn->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD App</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        a.button { padding: 6px 12px; background: #28a745; color: #fff; text-decoration: none; border-radius: 3px; }
        a.button:hover { background: #218838; }
    </style>
</head>
<body>
    <h2>Students List</h2>
    <a href="create.php" class="button">Add New Student</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
