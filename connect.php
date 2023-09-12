<?php
$u_s = $_POST['u_s'];
$p_s = $_POST['p_s'];
// Database connection
$conn = new mysqli('localhost', 'root', 'likith@2023', 'test');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    if (!empty($u_s) && !empty($p_s)) {
        // Validate username length
        if (strlen($u_s) <= 255) { // Change 255 to the maximum allowed length
            $stmt = $conn->prepare("INSERT INTO registration (u_s, p_s) VALUES (?, ?)");
            $stmt->bind_param("ss", $u_s, $p_s);
            $stmt->execute();
            echo "Registration Successfully...";
            $stmt->close();
        } else {
            echo "Username is too long.";
        }
    } else if (!empty($u_l) && !empty($p_l)) {
        // Handle login logic here if needed
    } else {
        echo "Please fill all the details";
    }

    $conn->close();
}
?>
