<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "test";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE studentinfo (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    StudentName VARCHAR(30) NOT NULL,
    RegistrationNo VARCHAR(12) NOT NULL,
    Course VARCHAR(8) NOT NULL,
    Hostel CHAR(1) NOT NULL,
    RoomNo INT(3) NOT NULL,
    MessCardNo INT(3) NOT NULL,
    ContactNo BIGINT(10) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table studentinfo created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

