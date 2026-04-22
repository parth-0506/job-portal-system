<?php include("includes/header.php"); ?>
<?php include("config/db.php"); ?>

<h2 class="mb-4">Available Jobs</h2>

<!-- 🔍 SEARCH BAR -->
<form method="GET" class="row mb-4">
    <div class="col-md-5">
        <input type="text" name="keyword" class="form-control"
        value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"
        placeholder="Search job title...">
    </div>

    <div class="col-md-4">
        <input type="text" name="location" class="form-control"
        value="<?php echo isset($_GET['location']) ? $_GET['location'] : ''; ?>"
        placeholder="Location (e.g. Mumbai)">
    </div>

    <div class="col-md-3">
        <button class="btn btn-dark w-100">Search</button>
    </div>
</form>

<div class="row">
<?php
// 🔍 GET FILTER VALUES
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';

// 🔍 BASE QUERY
$sql = "SELECT * FROM jobs WHERE 1";

// 🔍 APPLY FILTERS
if(!empty($keyword)){
    $sql .= " AND title LIKE '%$keyword%'";
}

if(!empty($location)){
    $sql .= " AND location LIKE '%$location%'";
}

$result = $conn->query($sql);

// ❗ NO RESULTS
if($result->num_rows == 0){
    echo "<div class='alert alert-warning'>No jobs found</div>";
}

// 🔁 JOB LOOP
while($row = $result->fetch_assoc()){
?>
    <div class="col-md-4">
        <div class="card mb-4 shadow">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <p class="card-text"><?php echo $row['location']; ?></p>

                <a href="job_details.php?id=<?php echo $row['id']; ?>" 
   class="btn btn-dark">View Details</a>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<?php include("includes/footer.php"); ?>