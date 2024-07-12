<?php

include 'connect.php';
require_once('vendor/autoload.php');

// Query untuk mengambil data
$query = $pdo->query('SELECT * FROM input_data');

// Buat objek PDF baru
$pdf = new TCPDF();

// Atur informasi dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nama Anda');
$pdf->SetTitle('Data Siswa');
$pdf->SetSubject('Export Data Siswa');

// Atur margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// Tambah halaman baru
$pdf->AddPage();

// Atur font
$pdf->SetFont('Times', '', 10);

// Menulis data siswa
$html = '<h1>Data Siswa</h1>';

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<hr><h2>Siswa</h2>';
    $html .= '<p><strong>Program:</strong> ' . $row['program'] . '</p>';
    $html .= '<p><strong>Nama:</strong> ' . $row['nama_siswa'] . '</p>';
    $html .= '<p><strong>Kelamin:</strong> ' . $row['kelamin'] . '</p>';
    $html .= '<p><strong>Agama:</strong> ' . $row['agama'] . '</p>';
    $html .= '<p><strong>NISN:</strong> ' . $row['nisn'] . '</p>';
    $html .= '<p><strong>NIS:</strong> ' . $row['nis'] . '</p>';
    $html .= '<p><strong>Tempat Lahir:</strong> ' . $row['tempat_lahir'] . '</p>';
    $html .= '<p><strong>Tanggal Lahir:</strong> ' . $row['tanggal_lahir'] . '</p>';
    $html .= '<p><strong>Alamat Siswa:</strong> ' . $row['alamat'] . '</p>';
    $html .= '<p><strong>Kota Tempat Tinggal:</strong> ' . $row['kota'] . '</p>';
    $html .= '<p><strong>No HP Siswa:</strong> ' . $row['telp'] . '</p>';
    $html .= '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
    $html .= '<p><strong>NIK:</strong> ' . $row['nik'] . '</p>';
    $html .= '<p><strong>No KK:</strong> ' . $row['no_kk'] . '</p>';
    $html .= '<p><strong>Golongan Darah:</strong> ' . $row['golongan_darah'] . '</p>';
    $html .= '<p><strong>Berat Badan (kg):</strong> ' . $row['berat_badan'] . '</p>';
    $html .= '<p><strong>Lingkar Kepala (cm):</strong> ' . $row['lingkar_kepala'] . '</p>';
    $html .= '<p><strong>Jarak Rumah ke Sekolah:</strong> ' . $row['jarak_rumah'] . '</p>';
    $html .= '<p><strong>Asal Sekolah:</strong> ' . $row['asal_sekolah'] . '</p>';
    $html .= '<p><strong>No SKHU:</strong> ' . $row['no_skhu'] . '</p>';
    $html .= '<p><strong>Status dalam Keluarga:</strong> ' . $row['status_di_keluarga'] . '</p>';
    $html .= '<p><strong>Anak Ke:</strong> ' . $row['anak_ke'] . '</p>';
    $html .= '<p><strong>Tanggungan Keluarga:</strong> ' . $row['tanggungan_keluarga'] . '</p>';
    $html .= '<p><strong>Nama Ayah:</strong> ' . $row['nama_ayah'] . '</p>';
    $html .= '<p><strong>NIK Ayah:</strong> ' . $row['nik_ayah'] . '</p>';
    $html .= '<p><strong>Pekerjaan Ayah:</strong> ' . $row['pekerjaan_ayah'] . '</p>';
    $html .= '<p><strong>Penghasilan Ayah:</strong> ' . $row['penghasilan_ayah'] . '</p>';
    $html .= '<p><strong>Nama Ibu:</strong> ' . $row['nama_ibu'] . '</p>';
    $html .= '<p><strong>NIK Ibu:</strong> ' . $row['nik_ibu'] . '</p>';
    $html .= '<p><strong>Pekerjaan Ibu:</strong> ' . $row['pekerjaan_ibu'] . '</p>';
    $html .= '<p><strong>Penghasilan Ibu:</strong> ' . $row['penghasilan_ibu'] . '</p>';
    $html .= '<p><strong>Alamat Orang Tua:</strong> ' . $row['alamat_ortu'] . '</p>';
    $html .= '<p><strong>No Telpon Orang Tua:</strong> ' . $row['alamat_ortu'] . '</p>';
    $html .= '<p><strong>Nama Wali:</strong> ' . $row['nama_wali'] . '</p>';
    $html .= '<p><strong>NIK Wali:</strong> ' . $row['nik_wali'] . '</p>';
    $html .= '<p><strong>Pekerjaan Wali:</strong> ' . $row['pekerjaan_wali'] . '</p>';
    $html .= '<p><strong>Penghasilan Wali:</strong> ' . $row['penghasilan_wali'] . '</p>';
    $html .= '<p><strong>Alamat Wali:</strong> ' . $row['alamat_wali'] . '</p>';
    $html .= '<p><strong>No Telepon Wali:</strong> ' . $row['no_telp_wali'] . '</p>';
}

// Tulis HTML ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF
$pdf->Output('data_siswa.pdf', 'I');
