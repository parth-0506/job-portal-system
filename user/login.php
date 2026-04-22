<?php include("../includes/header.php"); ?>
<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;

        // 🔥 ROLE-BASED REDIRECT
        if($user['role'] == 'user'){
            header("Location: dashboard.php");
        }
        elseif($user['role'] == 'employer'){
            header("Location: ../employer/dashboard.php");
        }
        elseif($user['role'] == 'admin'){
            header("Location: ../admin/dashboard.php");
        }

        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid Credentials</div>";
    }
}
?>

<div class="row justify-content-center">
<div class="col-md-4">
<div class="card p-4 shadow">

<h3 class="mb-3">Login</h3>

<form method="POST">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
    <button name="login" class="btn btn-dark w-100">Login</button>
</form>

</div>
</div>
</div>

<?php include("../includes/footer.php"); ?>