<?php
session_start();
include 'connection.php';

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch all users
$sql = "SELECT * FROM user";
$result = $conn->query($sql);


?>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<a href="logout.php">Logout</a>

<h3>User List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Contact Number</th>
        <th>Username</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['contactnum']}</td>
            <td>{$row['username']}</td>
            <td>{$row['passwrd']}</td>
            <td>
                <a href='edit.php?id={$row['ID']}'>Edit</a> |
                <a href='delete.php?id={$row['ID']}' onclick='return confirm(\"Are you sure?\")'>Remove</a>
            </td>
        </tr>";
    }
    ?>
</table>
