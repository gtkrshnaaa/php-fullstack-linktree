<?php
session_start();
include '../includes/config.php';

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Lakukan proses penghapusan produk dari database
    $sql = "DELETE FROM products WHERE id = $product_id";

    if(mysqli_query($conn, $sql)) {
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Gagal menghapus produk: " . mysqli_error($conn);
    }
} else {
    echo "ID produk tidak diberikan.";
}

mysqli_close($conn);
?>
