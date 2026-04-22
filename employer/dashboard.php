<?php include("header.php"); ?>
<?php include("../config/db.php"); ?>

<?php
$employer_id = $_SESSION['user']['id'];

// Count jobs
$jobs = $conn->query("SELECT COUNT(*) as total FROM jobs WHERE employer_id='$employer_id'")->fetch_assoc();

// Count applications
$applications = $conn->query("
    SELECT COUNT(*) as total 
    FROM applications 
    JOIN jobs ON applications.job_id = jobs.id 
    WHERE jobs.employer_id='$employer_id'
")->fetch_assoc();
?>

<h2>Welcome, <?php echo $_SESSION['user']['name']; ?></h2>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card p-4 shadow text-center">
            <h4>Total Jobs</h4>
            <h2><?php echo $jobs['total']; ?></h2>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4 shadow text-center">
            <h4>Total Applications</h4>
            <h2><?php echo $applications['total']; ?></h2>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>