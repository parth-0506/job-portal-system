<?php include("header.php"); ?>
<?php include("../config/db.php"); ?>

<?php
// Delete job
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM jobs WHERE id='$id'");
    echo "<div class='alert alert-success'>Job deleted</div>";
}

// Fetch jobs
$result = $conn->query("SELECT * FROM jobs");
?>

<h3>Manage Jobs</h3>

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
        <a href="?delete=<?php echo $row['id']; ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Delete job?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

<?php include("footer.php"); ?>