<?php
$host = "localhost";
$username = "root"; 
$password = "";  
$database = "db_simulasi_pbo_ti1c_satriaardiyansyah"; 

// Membuat koneksi menggunakan MySQLi Object-Oriented
$koneksi = new mysqli($host, $username, $password, $database);

// Mengecek koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>