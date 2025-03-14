<?php
include 'connection.php';

// Fetch user details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE ID = $id";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();
}

// Update user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $sql = "UPDATE user SET first_name='$first_name', last_name='$last_name', contactnum='$contact_number', username='$username', passwrd='$password' WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully. <a href='welcome.php'>Back to Users</a>";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

$conn->close();
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $user['ID']; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" required><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" required><br>
    Contact Number: <input type="text" name="contact_number" value="<?php echo $user['contactnum']; ?>" required><br>
    Username: <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
    Password: <input type="text" name="password" value="<?php echo $user['passwrd']; ?>" required><br>
    <input type="submit" value="Update">
</form>
