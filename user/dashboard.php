<?php include("../includes/header.php"); ?>
<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['user']['name']; ?></h2>

<div class="mt-3">
    <a href="my_applications.php" class="btn btn-primary">My Applications</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

<?php include("../includes/footer.php"); ?>