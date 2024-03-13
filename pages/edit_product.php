<?php
session_start();
include '../includes/config.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $link = $_POST['link'];

    $sql = "UPDATE products SET title='$title', link='$link' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Mendapatkan data proyek berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit product - afproduct</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <main>
    <section class="edit-product base-mt">
        <h2 class = "mt-30-persen">Edit product</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Title</label><br>
            <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
            <label>Link</label><br>
            <input type="text" name="link" value="<?php echo $row['link']; ?>"><br><br>
            <div class="inp-btn">
                <a href="dashboard.php">Cencel</a>
                <input type="submit" name="submit" value="Save">
            </div>
        </form>
    </section>
    </main>
</body>
</html>
