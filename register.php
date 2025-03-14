<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $check_query = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo "Error: Username already exists. Try another one.";
    } else {

        $sql = "INSERT INTO user (first_name, last_name, contactnum, username, passwrd) 
                VALUES ('$first_name', '$last_name', '$contact_number', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. <a href='login.php'>Login Here</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<form method="post">
    First Name: <input type="text" name="first_name" required><br>
    Last Name: <input type="text" name="last_name" required><br>
    Contact Number: <input type="text" name="contact_number" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>
