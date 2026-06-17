<?php
// Memanggil file koneksi dan semua subclass dari tahap sebelumnya
require_once 'database.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Memanfaatkan metode query spesifik dari Tahap 4 untuk mengambil data per kategori
$dataReguler = PendaftaranReguler::getDaftarReguler($koneksi);
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($koneksi);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen PMB - Tema Gelap Blueberry</title>
    <style>
        /* === TEMA GELAP BLUEBERRY PHP_MYADMIN === */
        body { 
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            background-color: #181b20; /* Latar belakang super gelap */
            color: #d1d5db; /* Teks abu-abu terang agar nyaman di mata */
        }
        
        /* Navbar Utama */
        .navbar {
            background: linear-gradient(to bottom, #263347, #1b2432); /* Blueberry Gelap */
            color: #ffffff;
            padding: 15px 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
            text-align: center;
            border-bottom: 2px solid #30609d;
        }
        .navbar h1 {
            margin: 0;
            font-size: 1.4em;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        .container {
            max-width: 1240px;
            margin: 25px auto;
            padding: 0 20px;
        }

        /* === MENU INTERAKTIF FILTER === */
        .menu-bar {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 30px;
        }
        .btn-menu {
            background: linear-gradient(to bottom, #262c36, #1e222a);
            border: 1px solid #384354;
            color: #8daed6;
            padding: 10px 22px;
            font-size: 0.95em;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .btn-menu:hover {
            background: #2d3849;
            border-color: #4e7dbd;
            color: #ffffff;
        }
        /* Tombol Aktif */
        .btn-menu.active {
            background: linear-gradient(to bottom, #30609d, #1f426d);
            color: #ffffff;
            border-color: #3a75c4;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.4);
        }

        /* === TABEL PANEL CONTAINER === */
        .tabel-panel {
            background-color: #21262d; /* Latar panel abu gelap */
            border: 1px solid #30363d;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            margin-bottom: 40px;
            overflow: hidden;
            animation: panelFadeIn 0.35s ease-in-out;
        }
        @keyframes panelFadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header Sub-Tabel */
        h2 { 
            background-color: #28313e; /* Biru blueberry redup */
            color: #8daed6; 
            margin: 0; 
            padding: 14px 18px; 
            font-size: 1.15em;
            border-bottom: 1px solid #384354;
            border-left: 5px solid #30609d; /* Aksen identitas jalur */
        }

        table { 
            border-collapse: collapse; 
            width: 100%; 
        }
        th, td { 
            border: 1px solid #30363d; 
            padding: 12px 16px; 
            text-align: left; 
            font-size: 0.95em;
        }
        th { 
            background: linear-gradient(to bottom, #2d333b, #22272e);
            color: #58a6ff; /* Warna link/fitur khas tema gelap */
            font-weight: 600;
        }

        /* Efek Hover Baris Interaktif */
        tr { transition: background-color 0.15s ease; }
        tr:nth-child(even) { background-color: #1c2128; }
        tr:hover td { 
            background-color: #2c384c !important; /* Sorotan blueberry gelap saat hover */
            color: #ffffff;
            cursor: pointer;
        }
        
        /* Dekorasi Kolom Polimorfik */
        .total-biaya { 
            font-weight: bold; 
            color: #ff7b72; /* Jingga/merah soft gelap untuk angka finansial */
        }
        .info-spesifik { 
            font-style: italic; 
            color: #8b949e; 
        }
        .id-badge {
            background-color: #2d384c;
            color: #58a6ff;
            padding: 3px 8px;
            border: 1px solid #38445d;
            border-radius: 3px;
            font-size: 0.85em;
            font-family: monospace;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>Sistem Manajemen Pendaftaran Mahasiswa Baru (PMB)</h1>
    </div>

    <div class="container">
        
        <div class="menu-bar">
            <button class="btn-menu active" onclick="saringKategori('semua', this)">Tampilkan Semua</button>
            <button class="btn-menu" onclick="saringKategori('jalur-reguler', this)">Jalur Reguler</button>
            <button class="btn-menu" onclick="saringKategori('jalur-prestasi', this)">Jalur Prestasi</button>
            <button class="btn-menu" onclick="saringKategori('jalur-kedinasan', this)">Jalur Kedinasan</button>
        </div>

        <div id="jalur-reguler" class="tabel-panel">
            <h2>Daftar Calon Mahasiswa - Jalur Reguler</h2>
            <table>
                <tr>
                    <th>ID</th><th>Nama Calon</th><th>Asal Sekolah</th><th>Nilai Ujian</th><th>Biaya Dasar</th><th>Informasi Spesifik Jalur</th><th>Total Biaya Akhir</th>
                </tr>
                <?php 
                if ($dataReguler && $dataReguler->num_rows > 0) {
                    while($row = $dataReguler->fetch_assoc()) {
                        // Instansiasi objek konkrit sesuai baris data
                        $mhs = new PendaftaranReguler(
                            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                            $row['pilihan_prodi'], $row['lokasi_kampus'] // Perbaikan typo dari schema database lokal jika ada
                        );
                ?>
                <tr>
                    <td><span class="id-badge">PMB-<?= $row['id_pendaftaran'] ?></span></td>
                    <td><?= htmlspecialchars($row['nama_calon']) ?></td>
                    <td><?= htmlspecialchars($row['asal_sekolah']) ?></td>
                    <td><?= $row['nilai_ujian'] ?></td>
                    <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.') ?></td>
                    <td class="info-spesifik"><?= $mhs->tampilkanInfoJalur() ?></td>
                    <td class="total-biaya">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.') ?></td>
                </tr>
                <?php } } else { echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data pendaftar reguler.</td></tr>"; } ?>
            </table>
        </div>

        <div id="jalur-prestasi" class="tabel-panel">
            <h2>Daftar Calon Mahasiswa - Jalur Prestasi</h2>
            <table>
                <tr>
                    <th>ID</th><th>Nama Calon</th><th>Asal Sekolah</th><th>Nilai Ujian</th><th>Biaya Dasar</th><th>Informasi Spesifik Jalur</th><th>Total Biaya Akhir</th>
                </tr>
                <?php 
                if ($dataPrestasi && $dataPrestasi->num_rows > 0) {
                    while($row = $dataPrestasi->fetch_assoc()) {
                        // Instansiasi objek konkrit Prestasi
                        $mhs = new PendaftaranPrestasi(
                            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                            $row['jenis_prestasi'], $row['tingkat_prestasi']
                        );
                ?>
                <tr>
                    <td><span class="id-badge">PMB-<?= $row['id_pendaftaran'] ?></span></td>
                    <td><?= htmlspecialchars($row['nama_calon']) ?></td>
                    <td><?= htmlspecialchars($row['asal_sekolah']) ?></td>
                    <td><?= $row['nilai_ujian'] ?></td>
                    <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.') ?></td>
                    <td class="info-spesifik"><?= $mhs->tampilkanInfoJalur() ?></td>
                    <td class="total-biaya">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.') ?></td>
                </tr>
                <?php } } else { echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data pendaftar prestasi.</td></tr>"; } ?>
            </table>
        </div>

        <div id="jalur-kedinasan" class="tabel-panel">
            <h2>Daftar Calon Mahasiswa - Jalur Kedinasan</h2>
            <table>
                <tr>
                    <th>ID</th><th>Nama Calon</th><th>Asal Sekolah</th><th>Nilai Ujian</th><th>Biaya Dasar</th><th>Informasi Spesifik Jalur</th><th>Total Biaya Akhir</th>
                </tr>
                <?php 
                if ($dataKedinasan && $dataKedinasan->num_rows > 0) {
                    while($row = $dataKedinasan->fetch_assoc()) {
                        // Instansiasi objek konkrit Kedinasan
                        $mhs = new PendaftaranKedinasan(
                            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                            $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                        );
                ?>
                <tr>
                    <td><span class="id-badge">PMB-<?= $row['id_pendaftaran'] ?></span></td>
                    <td><?= htmlspecialchars($row['nama_calon']) ?></td>
                    <td><?= htmlspecialchars($row['asal_sekolah']) ?></td>
                    <td><?= $row['nilai_ujian'] ?></td>
                    <td>Rp <?= number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.') ?></td>
                    <td class="info-spesifik"><?= $mhs->tampilkanInfoJalur() ?></td>
                    <td class="total-biaya">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.') ?></td>
                </tr>
                <?php } } else { echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data pendaftar kedinasan.</td></tr>"; } ?>
            </table>
        </div>

</div>

    <script>
        function saringKategori(idKategori, tombolTerpilih) {
            // Ambil seluruh komponen tabel panel
            let seluruhPanel = document.querySelectorAll('.tabel-panel');
            seluruhPanel.forEach(panel => {
                panel.style.display = 'none'; // Sembunyikan semuanya
            });

            // Reset status aktif pada seluruh tombol navigasi
            let seluruhTombol = document.querySelectorAll('.btn-menu');
            seluruhTombol.forEach(tombol => {
                tombol.classList.remove('active');
            });

            // Kondisional penampakan tabel berdasarkan pilihan menu
            if (idKategori === 'semua') {
                seluruhPanel.forEach(panel => {
                    panel.style.display = 'block';
                });
            } else {
                let panelTarget = document.getElementById(idKategori);
                if (panelTarget) {
                    panelTarget.style.display = 'block';
                }
            }

            // Sematkan class active pada tombol yang baru saja ditekan
            tombolTerpilih.classList.add('active');
        }
    </script>

</body>
</html>