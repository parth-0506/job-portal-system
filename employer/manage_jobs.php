<?php include("header.php"); ?>
<?php include("../config/db.php"); ?>

<?php
$employer_id = $_SESSION['user']['id'];

$sql = "SELECT * FROM jobs WHERE employer_id='$employer_id'";
$result = $conn->query($sql);
?>

<h3>My Jobs</h3>

<table class="table table-bordered mt-3">
    <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['salary']; ?></td>
    <td>
    <a href="applicants.php?job_id=<?php echo $row['id']; ?>" 
       class="btn btn-info btn-sm">View Applicants</a>
</td>
</tr>
<?php } ?>
</table>

<?php include("footer.php"); ?>