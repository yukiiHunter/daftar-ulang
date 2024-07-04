<?php

include 'connect.php';

function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('No', 'Program', 'Nama Lengkap', 'Kelamin', 'Agama', 'NISN', 'NIS', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat Siswa', 'Kota Tempat Tinggal', 'No HP Siswa', 'Email', 'NIK', 'No KK', 'Golongan Darah', 'Berat Badan (kg)', 'Lingkar Kepala (cm)', 'Jarak Rumah ke Sekolah', 'Asal Sekolah', 'No SKHU', 'Status dalam Keluarga', 'Anak Ke', 'Tanggungan Keluarga', 'Nama Ayah', 'NIK Ayah', 'Pekerjaan Ayah', 'Penghasilan Ayah', 'Nama Ibu', 'NIK Ibu', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Alamat Orang Tua', 'No Telpon Orang Tua', 'Nama Wali', 'NIK Wali', 'Pekerjaan Wali', 'Penghasilan Wali', 'Alamat Wali', 'No Telpon Wali'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM input_data ORDER BY no ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array(
            $row['no'],
            $row['program'],
            $row['nama_siswa'],
            $row['kelamin'],
            $row['agama'],
            $row['nisn'],
            $row['nis'],
            $row['tempat_lahir'],
            $row['tanggal_lahir'],
            $row['alamat'],
            $row['kota'],
            $row['telp'],
            $row['email'],
            $row['nik'],
            $row['no_kk'],
            $row['golongan_darah'],
            $row['berat_badan'],
            $row['lingkar_kepala'],
            $row['jarak_rumah'],
            $row['asal_sekolah'],
            $row['no_skhu'],
            $row['status_di_keluarga'],
            $row['anak_ke'],
            $row['tanggungan_keluarga'],
            $row['nama_ayah'],
            $row['nik_ayah'],
            $row['pekerjaan_ayah'],
            $row['penghasilan_ayah'],
            $row['nama_ibu'],
            $row['nik_ibu'],
            $row['pekerjaan_ibu'],
            $row['penghasilan_ibu'],
            $row['alamat_ortu'],
            $row['no_telp_ortu'],
            $row['nama_wali'],
            $row['nik_wali'],
            $row['pekerjaan_wali'],
            $row['penghasilan_wali'],
            $row['alamat_wali'],
            $row['no_telp_wali']
        ); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
