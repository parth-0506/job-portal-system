<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'employer'){
    header("Location: ../user/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employer Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Employer Panel</span>

        <div>
            <a href="dashboard.php" class="btn btn-outline-light btn-sm">Dashboard</a>
            <a href="post_job.php" class="btn btn-outline-light btn-sm">Post Job</a>
            <a href="manage_jobs.php" class="btn btn-outline-light btn-sm">Manage Jobs</a>
            <a href="../user/logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">