

<?php
// login.php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username = "" || $password == null) {
    echo "Username dan Password tidak boleh kosong";
}

if ($username == "admin" && $password = "12345") {
    echo "Selamat datang admin!";
} else {
    echo "Login gagal!";
}
?>
