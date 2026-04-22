<?php include("header.php"); ?>
<?php include("../config/db.php"); ?>

<?php
// Delete user
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id='$id'");
    echo "<div class='alert alert-success'>User deleted</div>";
}

// Fetch users
$result = $conn->query("SELECT * FROM users");
?>

<h3>Manage Users</h3>

<table class="table table-bordered mt-3">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['role']; ?></td>
    <td>
        <a href="?delete=<?php echo $row['id']; ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Delete user?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

<?php include("footer.php"); ?>