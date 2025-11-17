<?php
// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    echo "Halo, $username";
} else {
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Form Username</title>
    </head>
    <body>
        <h2>Masukkan Username</h2>
        <form method="post" action="">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <input type="submit" value="Kirim">
        </form>
    </body>
    </html>
<?php
}
?>