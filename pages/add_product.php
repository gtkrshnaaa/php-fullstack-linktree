<?php
session_start();
include '../includes/config.php';

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $link = $_POST['link'];


    $sql = "INSERT INTO products (title, link) VALUES ('$title', '$link')";
    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New product - afproduct</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <main>
        <section class="add-product base-mt">
            <h2 class = "mt-30-persen">Add product</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <label>Title</label><br>
                <input type="text" name="title" placeholder="type product title"><br>
                <label>Link</label><br>
                <input type="text" name="link" placeholder="insert product link"><br><br>
                <div class="inp-btn">
                    <a href="dashboard.php">Cencel</a>
                    <input type="submit" name="submit" value="Save">
                </div>
            </form>
        </section>
    </main>
</body>
</html>
