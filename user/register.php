<?php include("../includes/header.php"); ?>
<?php
include("../config/db.php");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users (name,email,password) 
            VALUES ('$name','$email','$password')";

    if($conn->query($sql)){
        echo "<div class='alert alert-success'>Registered Successfully</div>";
    }
}
?>

<div class="row justify-content-center">
<div class="col-md-4">
<div class="card p-4 shadow">

<h3 class="mb-3">Register</h3>

<form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
    <button name="register" class="btn btn-warning w-100">Register</button>
</form>

</div>
</div>
</div>

<?php include("../includes/footer.php"); ?>