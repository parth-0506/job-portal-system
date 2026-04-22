<?php include("header.php"); ?>
<?php include("../config/db.php"); ?>

<?php
if(isset($_POST['post'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $employer_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO jobs (employer_id, title, description, location, salary)
            VALUES ('$employer_id','$title','$desc','$location','$salary')";

    if($conn->query($sql)){
        echo "<div class='alert alert-success'>Job Posted Successfully</div>";
    }
}
?>

<div class="card p-4 shadow">
    <h3>Post a Job</h3>

    <form method="POST">
        <input type="text" name="title" class="form-control mb-2" placeholder="Job Title" required>
        
        <textarea name="description" class="form-control mb-2" placeholder="Job Description" required></textarea>

        <input type="text" name="location" class="form-control mb-2" placeholder="Location" required>

        <input type="text" name="salary" class="form-control mb-3" placeholder="Salary">

        <button name="post" class="btn btn-dark">Post Job</button>
    </form>
</div>

<?php include("footer.php"); ?>