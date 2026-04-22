<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
    echo "Please login first";
    exit();
}

$user_id = $_SESSION['user']['id'];
$job_id = $_POST['job_id'];
$cover_letter = $_POST['cover_letter'];

// File upload
$resume = $_FILES['resume']['name'];
$temp = $_FILES['resume']['tmp_name'];

$upload_path = "../uploads/" . $resume;

// Create folder if not exists
if(!is_dir("../uploads")){
    mkdir("../uploads");
}

move_uploaded_file($temp, $upload_path);

// Prevent duplicate
$check = $conn->query("SELECT * FROM applications 
WHERE user_id='$user_id' AND job_id='$job_id'");

if($check->num_rows > 0){
    echo "Already Applied";
    exit();
}

// Insert
$sql = "INSERT INTO applications (user_id, job_id, resume, cover_letter) 
        VALUES ('$user_id','$job_id','$resume','$cover_letter')";

if($conn->query($sql)){
    header("Location: my_applications.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>