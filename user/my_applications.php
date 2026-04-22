<?php include("../includes/header.php"); ?>

<?php
session_start();
include("../config/db.php");

// Check login
if(!isset($_SESSION['user'])){
    echo "<div class='alert alert-danger'>Please login first</div>";
    exit();
}

$user_id = $_SESSION['user']['id'];

// Query
$sql = "SELECT jobs.title, applications.status 
        FROM applications 
        JOIN jobs ON applications.job_id = jobs.id
        WHERE applications.user_id='$user_id'";

$result = $conn->query($sql);

if(!$result){
    die("Query Error: " . $conn->error);
}
?>

<h2 class="mb-4">My Applications</h2>

<div class="card shadow p-3">
<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>Job Title</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

<?php
if($result->num_rows == 0){
    echo "<tr><td colspan='2' class='text-center'>No applications found</td></tr>";
}

while($row = $result->fetch_assoc()){
    
    // Status badge color
    $status = $row['status'];
    $badge = "secondary";

    if($status == "Pending") $badge = "warning";
    elseif($status == "Approved") $badge = "success";
    elseif($status == "Rejected") $badge = "danger";
?>

<tr>
    <td><?php echo $row['title']; ?></td>
    <td>
        <span class="badge bg-<?php echo $badge; ?>">
            <?php echo $status; ?>
        </span>
    </td>
</tr>

<?php } ?>

    </tbody>
</table>
</div>

<?php include("../includes/footer.php"); ?>