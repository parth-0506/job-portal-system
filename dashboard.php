<?php include("header.php"); ?>
<?php include("../config/db.php"); ?>

<?php
$users = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc();
$jobs = $conn->query("SELECT COUNT(*) as total FROM jobs")->fetch_assoc();
$applications = $conn->query("SELECT COUNT(*) as total FROM applications")->fetch_assoc();
?>

<h2>Admin Dashboard</h2>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card p-4 shadow text-center">
            <h5>Total Users</h5>
            <h2><?php echo $users['total']; ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 shadow text-center">
            <h5>Total Jobs</h5>
            <h2><?php echo $jobs['total']; ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 shadow text-center">
            <h5>Total Applications</h5>
            <h2><?php echo $applications['total']; ?></h2>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>