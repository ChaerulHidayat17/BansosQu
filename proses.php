<?php
// Ganti bagian berikut dengan koneksi dan logika penyimpanan data ke database Anda
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "bansos";

// Buat koneksi
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data formulir
$nama_pengguna = htmlspecialchars($_POST["nama_pengguna"]);
$nik = htmlspecialchars($_POST["nik"]);
$no_whatsapp = htmlspecialchars($_POST["no_whatsapp"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password

// Masukkan data ke dalam database
$sql = "INSERT INTO pengguna (Nama_Pengguna, NIK, No_Whatsapp, Alamat, Password) VALUES ('$nama_pengguna', '$nik', '$no_whatsapp', '$alamat', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>