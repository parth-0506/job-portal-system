<?php include("includes/header.php"); ?>
<?php include("config/db.php"); ?>

<?php
// Get job ID
if(!isset($_GET['id'])){
    echo "<div class='alert alert-danger'>Invalid Job</div>";
    exit();
}

$job_id = $_GET['id'];

// Fetch job
$sql = "SELECT * FROM jobs WHERE id='$job_id'";
$result = $conn->query($sql);

if($result->num_rows == 0){
    echo "<div class='alert alert-warning'>Job not found</div>";
    exit();
}

$job = $result->fetch_assoc();
?>

<div class="card shadow p-4">
    <h2><?php echo $job['title']; ?></h2>
    <p><strong>Location:</strong> <?php echo $job['location']; ?></p>
    <p><strong>Salary:</strong> <?php echo $job['salary']; ?></p>

    <hr>

    <h5>Job Description</h5>
    <p><?php echo $job['description']; ?></p>

    <a href="user/apply_form.php?job_id=<?php echo $job['id']; ?>" 
   class="btn btn-success mt-3">Apply Now</a>
</div>

<?php include("includes/footer.php"); ?>