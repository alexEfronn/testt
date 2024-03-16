<?php
include_once ('.env.php');

$avatar = $_POST['avatar'];

$sql = "INSERT INTO users (avatar) VALUES ('$avatar')";
echo "12333";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>