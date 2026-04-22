<?php include("header.php"); ?>
<?php include("../config/db.php"); ?>

<?php
$job_id = $_GET['job_id'];

// Update status
if(isset($_GET['status'])){
    $app_id = $_GET['app_id'];
    $status = $_GET['status'];

    $conn->query("UPDATE applications 
                  SET status='$status' 
                  WHERE id='$app_id'");
}

// Fetch applicants (ADDED resume + cover_letter)
$sql = "
SELECT applications.id, users.name, users.email, 
       applications.status, applications.resume, applications.cover_letter
FROM applications
JOIN users ON applications.user_id = users.id
WHERE applications.job_id='$job_id'
";

$result = $conn->query($sql);
?>

<h3 class="mb-4">Applicants</h3>

<div class="card shadow p-3">
<table class="table table-hover">
<tr class="table-dark">
    <th>Name</th>
    <th>Email</th>
    <th>Resume</th>
    <th>Cover Letter</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ 

    // Status badge color
    $status = $row['status'];
    $badge = "secondary";

    if($status == "Pending") $badge = "warning";
    elseif($status == "Approved") $badge = "success";
    elseif($status == "Rejected") $badge = "danger";
?>

<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>

    <!-- 📄 Resume -->
    <td>
        <?php if($row['resume']){ ?>
            <a href="../uploads/<?php echo $row['resume']; ?>" target="_blank" 
               class="btn btn-sm btn-info">View</a>
        <?php } else { echo "N/A"; } ?>
    </td>

    <!-- ✍️ Cover Letter -->
    <td style="max-width:200px;">
        <?php echo substr($row['cover_letter'], 0, 100); ?>...
    </td>

    <!-- 🎯 Status -->
    <td>
        <span class="badge bg-<?php echo $badge; ?>">
            <?php echo $status; ?>
        </span>
    </td>

    <!-- ⚙️ Actions -->
    <td>
        <a href="?job_id=<?php echo $job_id; ?>&app_id=<?php echo $row['id']; ?>&status=Approved"
           class="btn btn-success btn-sm">Approve</a>

        <a href="?job_id=<?php echo $job_id; ?>&app_id=<?php echo $row['id']; ?>&status=Rejected"
           class="btn btn-danger btn-sm">Reject</a>
    </td>
</tr>

<?php } ?>
</table>
</div>

<?php include("footer.php"); ?>