<?php
session_start();

// Simpan username dan password yang benar dalam variabel
$correct_username = "admin";
$correct_password = "adminpw";

// Periksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah input username dan password cocok dengan yang benar
    if ($_POST['username'] === $correct_username && $_POST['password'] === $correct_password) {
        // Jika cocok, set session dan arahkan ke dashboard
        $_SESSION['username'] = $correct_username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Jika tidak cocok, tampilkan pesan kesalahan
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - afproduct</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <main>
        <section class="login">
            <h2 class = "mt-30-persen">Wellcome admin</h2>
            <?php if (isset($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required placeholder="type username"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required placeholder="type password"><br><br>
                <div class="inp-btn">
                    <a href="index.php">Cencel</a>
                    <input type="submit" value="Login">
                </div>
            </form>
        </section>
    </main>
</body>
</html>
