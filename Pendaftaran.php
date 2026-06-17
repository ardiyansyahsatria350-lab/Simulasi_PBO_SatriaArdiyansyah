<?php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected) sesuai dengan atribut global di database
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Metode Abstrak (Tanpa Isi/Body)
    // Metode ini wajib diimplementasikan ulang (override) di class turunannya
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}

?>