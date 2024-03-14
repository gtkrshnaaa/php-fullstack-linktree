<?php
session_start();
include '../includes/config.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choopps</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <main>

        <header class="header">
            <a href="dashboard.php"><h3>Choopps</h3></a>
        </header>
        <section class="hero">
            <div class="hero-img">
                <img src="../assets/img/shape.jpg">
            </div>
        </section>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search by ID">
            <button id="toggleSearch">ID</button>
        </div>
        <section id="afproduct" class="afproduct">
            <div class="afproduct-list">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a class="afproduct-card" href="<?php echo $row['link']; ?>" target="_blank">
                        <p class="product-id"><?php echo $row['id']; ?></p>
                        <p><?php echo $row['title']; ?></p>
                        <p><i class="uil uil-arrow-circle-right"></i></p>
                    </a>
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

    <script src="../assets/js/homeindex.js"></script>
</body>
</html>
