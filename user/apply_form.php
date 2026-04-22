<?php include("../includes/header.php"); ?>

<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$job_id = $_GET['job_id'];
?>

<div class="row justify-content-center">
<div class="col-md-6">

<div class="card p-4 shadow">
<h3 class="mb-3">Apply for Job</h3>

<form action="apply.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">

    <label>Name</label>
    <input type="text" class="form-control mb-2"
    value="<?php echo $_SESSION['user']['name']; ?>" readonly>

    <label>Email</label>
    <input type="email" class="form-control mb-3"
    value="<?php echo $_SESSION['user']['email']; ?>" readonly>

    <!-- 📄 Resume Upload -->
    <label>Upload Resume (PDF)</label>
    <input type="file" name="resume" class="form-control mb-3" required>

    <!-- ✍️ Cover Letter -->
    <label>Cover Letter</label>
    <textarea name="cover_letter" class="form-control mb-3" rows="4"
    placeholder="Write something about yourself..."></textarea>

    <button class="btn btn-success w-100">Submit Application</button>

</form>

</div>

</div>
</div>

<?php include("../includes/footer.php"); ?>