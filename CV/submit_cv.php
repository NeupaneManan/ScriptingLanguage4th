<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv_database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
$image_path = $target_file;

$target_file = $target_dir . basename($_FILES["cv_file"]["name"]);
move_uploaded_file($_FILES["cv_file"]["tmp_name"], $target_file);
$file_path = $target_file;

$full_name = $_POST["full_name"];
$contact_info = $_POST["contact_info"];
$education = $_POST["education"];
$work_experience = $_POST["work_experience"];
$skills = $_POST["skills"];
$sql = "INSERT INTO cv_table (name, contact_info, education, work_experience, skills, image, file) 
        VALUES ('$full_name', '$contact_info', '$education', '$work_experience', '$skills', '$image_path', '$file_path')";
if ($conn->query($sql) === TRUE) {
    echo "CV submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
