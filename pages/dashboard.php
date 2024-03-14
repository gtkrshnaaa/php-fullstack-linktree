<?php
session_start();
include '../includes/config.php';

// Pastikan user telah login sebelum mengakses halaman dashboard
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Ambil data portofolio dari database
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Choopps</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <main>
    <section class="dashb">
        <div class="dashb-header">
            <h2>Dashboard</h2>
            <div class="dashb-btn">
                <a href="add_product.php" class="dashb-add-btn"><i class="uil uil-plus"></i></a>
                <a href="index.php" class="dashb-home-btn">Home</a> 
                <a href="logout.php" class="dashb-logout-btn">Logout</a> 
            </div>
        </div>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search by ID">
            <button id="toggleSearch">ID</button>
        </div>

        <div class="afproduct-list mt-10-persen">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="afproduct-card">
                    <p><?php echo $row['id']; ?></p>
                    <p><?php echo $row['title']; ?></p>
                    <div class="act-btn">
                        <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn edit"><i class="uil uil-edit"></i></a>
                        <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn delete"><i class="uil uil-trash"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top"><i class="uil uil-angle-up"></i></button>


    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>

    </main>

    <script src="../assets/js/dashboard.js"></script>

</body>
</html>

<?php mysqli_close($conn); ?>
