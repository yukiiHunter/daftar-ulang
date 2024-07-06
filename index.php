<?php
include 'connect.php';

if(isset($_POST['register'])) {
    $program = $_POST['program'];
    $nama = $_POST['nama_siswa'];
    $kelamin = $_POST['kelamin'];
    $agama = $_POST['agama'];
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $tmpLahir = $_POST['tempat_lahir'];
    $tglLahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $nik = $_POST['nik'];
    $kk = $_POST['no_kk'];
    $golDar = $_POST['golongan_darah'];
    $bb = $_POST['berat_badan'];
    $lingkarKepala = $_POST['lingkar_kepala'];
    $jarakRumah = $_POST['jarak_rumah'];
    $asalSekolah = $_POST['asal_sekolah'];
    $skhu = $_POST['no_skhu'];
    $status = $_POST['status_di_keluarga'];
    $anakKe = $_POST['anak_ke'];
    $tanggunganKeluarga = $_POST['tanggungan_keluarga'];
    $namaAyah = $_POST['nama_ayah'];
    $nikAyah = $_POST['nik_ayah'];
    $jobAyah = $_POST['pekerjaan_ayah'];
    $salaryAyah = $_POST['penghasilan_ayah'];
    $namaIbu = $_POST['nama_ibu'];
    $nikIbu = $_POST['nik_ibu'];
    $jobIbu = $_POST['pekerjaan_ibu'];
    $salaryIbu = $_POST['penghasilan_ibu'];
    $alamatOrtu = $_POST['alamat_ortu'];
    $telpOrtu = $_POST['no_telp_ortu'];
    $namaWali = $_POST['nama_wali'];
    $nikWali = $_POST['nik_wali'];
    $jobWali = $_POST['pekerjaan_wali'];
    $salaryWali = $_POST['penghasilan_wali'];
    $alamatWali = $_POST['alamat_wali'];
    $telpWali = $_POST['no_telp_wali'];

    $query = "INSERT INTO input_data (program, nama_siswa, kelamin, agama, nisn, nis, tempat_lahir, tanggal_lahir, alamat, kota, telp, email, nik, no_kk, golongan_darah, berat_badan, lingkar_kepala, jarak_rumah, asal_sekolah, no_skhu, status_di_keluarga, anak_ke, tanggungan_keluarga, nama_ayah, nik_ayah, pekerjaan_ayah, penghasilan_ayah, nama_ibu, nik_ibu, pekerjaan_ibu, penghasilan_ibu, alamat_ortu, no_telp_ortu, nama_wali, nik_wali, pekerjaan_wali, penghasilan_wali, alamat_wali, no_telp_wali)
    VALUES (:program, :nama, :kelamin, :agama, :nisn, :nis, :tmpLahir, :tglLahir, :alamat, :kota, :telp, :email, :nik, :kk, :golDar, :bb, :lingkarKepala, :jarakRumah, :asalSekolah, :skhu, :status, :anakKe, :tanggunganKeluarga, :namaAyah, :nikAyah, :jobAyah, :salaryAyah, :namaIbu, :nikIbu, :jobIbu, :salaryIbu, :alamatOrtu, :telpOrtu, :namaWali, :nikWali, :jobWali, :salaryWali, :alamatWali, :telpWali)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':program', $program);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':kelamin', $kelamin);
    $stmt->bindParam(':agama', $agama);
    $stmt->bindParam(':nisn', $nisn);
    $stmt->bindParam(':nis', $nis);
    $stmt->bindParam(':tmpLahir', $tmpLahir);
    $stmt->bindParam(':tglLahir', $tglLahir);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':kota', $kota);
    $stmt->bindParam(':telp', $telp);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nik', $nik);
    $stmt->bindParam(':kk', $kk);
    $stmt->bindParam(':golDar', $golDar);
    $stmt->bindParam(':bb', $bb);
    $stmt->bindParam(':lingkarKepala', $lingkarKepala);
    $stmt->bindParam(':jarakRumah', $jarakRumah);
    $stmt->bindParam(':asalSekolah', $asalSekolah);
    $stmt->bindParam(':skhu', $skhu);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':anakKe', $anakKe);
    $stmt->bindParam(':tanggunganKeluarga', $tanggunganKeluarga);
    $stmt->bindParam(':namaAyah', $namaAyah);
    $stmt->bindParam(':nikAyah', $nikAyah);
    $stmt->bindParam(':jobAyah', $jobAyah);
    $stmt->bindParam(':salaryAyah', $salaryAyah);
    $stmt->bindParam(':namaIbu', $namaIbu);
    $stmt->bindParam(':nikIbu', $nikIbu);
    $stmt->bindParam(':jobIbu', $jobIbu);
    $stmt->bindParam(':salaryIbu', $salaryIbu);
    $stmt->bindParam(':alamatOrtu', $alamatOrtu);
    $stmt->bindParam(':telpOrtu', $telpOrtu);
    $stmt->bindParam(':namaWali', $namaWali);
    $stmt->bindParam(':nikWali', $nikWali);
    $stmt->bindParam(':jobWali', $jobWali);
    $stmt->bindParam(':salaryWali', $salaryWali);
    $stmt->bindParam(':alamatWali', $alamatWali);
    $stmt->bindParam(':telpWali', $telpWali);

    if ($stmt->execute()) {
        echo "<div>Data recorded</div>";
        header("location: index.php");
        exit; // Pastikan untuk menghentikan eksekusi setelah pengalihan
    } else {
        echo "<div>Failed</div>";
    }
}

// HANDLE SHOW DATA
$show = "SELECT * FROM input_data ORDER BY no ASC";
$result = $pdo->query($show);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Daftar Ulang | SMKN 7 Semarang</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="title">Daftar Ulang</div>
    
    <div class="inputData">
        <form action="index.php" method="post" class="input">
            <!-- Pemilihan Jurusan -->
            <select name="program" id="program" required>
                <option value="">------------------ Pilih Program Keahlian -------------------</option>
                <option value="KPBS">Konstruksi dan Perawatan Bangunan Sipil (KPBS)</option>
                <option value="TKP">Teknik Konstruksi dan Perumahan (TKP)</option>
                <option value="TKL">Teknik Ketenagalistrikan (TKL)</option>
                <option value="TPFL">Teknik Pengelasan dan Fabrikasi Logam (TPFL)</option>
                <option value="TO">Teknik Otomotif (TO)</option>
                <option value="TE">Teknik Elektronika (TE)</option>
                <option value="PPLG">Pengembangan Perangkat Lunak dan Gim (PPLG)</option>
            </select>

            <!-- Input Nama -->
            <input type="text" name="nama_siswa" id="nama" placeholder="Nama Lengkap" required>

            <!-- Input Kelamin -->
            <select name="kelamin" id="kelamin" required>
                <option value="">---- Pilih Jenis Kelamin ----</option>
                <option value="laki laki">Laki laki</option>
                <option value="perempuan">Perempuan</option>
            </select>

            <!-- Input Agama -->
            <select name="agama" id="agama" required>
                <option value="">---- Pilih Agama ----</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Khonghucu">Khonghucu</option>
            </select>

            <!-- Input NIS & NISN -->
            <input type="number" name="nisn" id="nisn" placeholder="NISN" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required>
            <input type="number" name="nis" id="nis" placeholder="NIS" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required>

            <!-- Input Tempat & Tanggal Lahir -->
            <input type="text" name="tempat_lahir" id="tempatLahir" placeholder="Tempat Lahir"required>
            <input type="date" name="tanggal_lahir" id="tanggalLahir" required>

            <!-- Input Alamat Tempat Tinggal -->
            <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>

            <!-- Input Kota Tinggal -->
            <input type="text" name="kota" id="kota" placeholder="Kota Tempat Tinggal" required>
            
            <!-- Input No. HP Siswa -->
            <input type="number" name="telp" id="telp" placeholder="No HP Siswa" required>
            
            <!-- Input Email Siswa -->
            <input type="email" name="email" id="email" placeholder="Email">

            <!-- Input NIK -->
            <input type="number" name="nik" id="nik" placeholder="NIK" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required>

            <!-- Input KK -->
            <input type="number" name="no_kk" id="kk" placeholder="No KK" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required>
            
            <!-- Input Golongan Darah -->
            <select name="golongan_darah" id="golonganDarah" required>
                <option value="">---- Pilih Golongan Darah ----</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="O">O</option>
                <option value="AB">AB</option>
            </select>

            <!-- Input Berat Badan -->
            <input type="number" name="berat_badan" id="bb" placeholder="Berat Badan (kg)" required>

            <!-- Input Lingkar Kepala -->
            <input type="number" name="lingkar_kepala" id="lingkarKepala" placeholder="Lingkar Kepala (cm)" required>

            <!-- Input Jarak ke Sekolah -->
            <input type="number" name="jarak_rumah" id="jarakRumah" placeholder="Jarak Rumah ke Sekolah" required>
            
            <!-- Input Sekolah Asal -->
            <input type="text" name="asal_sekolah" id="asalSekolah" placeholder="Asal Sekolah"required>

            <!-- Input SKHU -->
            <input type="number" name="no_skhu" id="skhu" placeholder="Nomor SKHU" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" required>

            <!-- Input Status dalam Keluarga -->
            <input type="text" name="status_di_keluarga" id="status" placeholder="Status Dalam Keluarga" required>

            <!-- Input Kedudukan Anak -->
            <input type="number" name="anak_ke" id="anakKe" placeholder="Anak Ke- (contoh : 2)" required>

            <!-- Input Tanggungan Keluarga -->
            <input type="text" name="tanggungan_keluarga" id="tanggunganKeluarga" placeholder="Tanggungan Keluarga" required>

            <!-- Input Nama Ayah -->
            <input type="text" name="nama_ayah" id="namaAyah" placeholder="Nama Ayah" required>

            <!-- Input NIK Ayah -->
            <input type="number" name="nik_ayah" id="nikAyah" placeholder="NIK Ayah" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required>

            <!-- Input Pekerjaan Ayah -->
            <input type="text" name="pekerjaan_ayah" id="pekerjaanAyah" placeholder="Pekerjaan Ayah" required>

            <!-- Input Penghasilan Ayah -->
            <input type="number" name="penghasilan_ayah" id="penghasilanAyah" placeholder="Penghasilan Ayah" required>
            
            <!-- Input Nama Ibu -->
            <input type="text" name="nama_ibu" id="namaIbu" placeholder="Nama Ibu" required>

            <!-- Input NIK Ibu -->
            <input type="number" name="nik_ibu" id="nikIbu" placeholder="NIK Ibu" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required>

            <!-- Input Pekerjaan Ibu -->
            <input type="text" name="pekerjaan_ibu" id="pekerjaanIbu" placeholder="Pekerjaan Ibu" required>

            <!-- Input Penghasilan Ibu -->
            <input type="number" name="penghasilan_ibu" id="penghasilanIbu" placeholder="Penghasilan Ibu" required>

            <!-- Input Alamat Orang Tua -->
            <input type="text" name="alamat_ortu" id="alamatOrtu" placeholder="Alamat Orang Tua" required>

            <!-- Input Telepon Orang Tua -->
            <input type="number" name="no_telp_ortu" id="telpOrtu" placeholder="No Telepon Orang Tua" required>

            <!-- Input Nama Wali -->
            <input type="text" name="nama_wali" id="namaWali" placeholder="Nama Wali" >

            <!-- Input NIK Wali -->
            <input type="number" name="nik_wali" id="nikWali" placeholder="NIK Wali" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" >

            <!-- Input Pekerjaan Wali -->
            <input type="text" name="pekerjaan_wali" id="pekerjaanWali" placeholder="Pekerjaan Wali" >

            <!-- Input Penghasilan Wali -->
            <input type="number" name="penghasilan_wali" id="penghasilanWali" placeholder="Penghasilan Wali" >

            <!-- Input Alamat Wali -->
            <input type="text" name="alamat_wali" id="alamatWali" placeholder="Alamat Wali" >

            <!-- Input No Telp Wali -->
            <input type="number" name="no_telp_wali" id="telpWali" placeholder="No Telepon Wali" >

            <!-- SUBMIT BUTTON -->
            <input type="submit" name="register" id="register" value="Daftar">
        </form>

        <form action="download.php?no=<?php echo $row['no']; ?>" method="post">
            <button type="submit">Download PDF</button>
        </form>
    </div>

    <div class="showData">
        <a href="export_excel.php">Export</a>
        <table class="data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Program</th>
                    <th>Nama</th>
                    <th>Kelamin</th>
                    <th>Agama</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat Siswa</th>
                    <th>Kota Tempat Tinggal</th>
                    <th>No HP Siswa</th>
                    <th>Email</th>
                    <th>NIK</th>
                    <th>No KK</th>
                    <th>Golongan Darah</th>
                    <th>Berat Badan (kg)</th>
                    <th>Lingkar Kepala (cm)</th>
                    <th>Jarak Rumah ke Sekolah</th>
                    <th>Asal Sekolah</th>
                    <th>No SKHU</th>
                    <th>Status dalam Keluarga</th>
                    <th>Anak Ke</th>
                    <th>Tanggungan Keluarga</th>
                    <th>Nama Ayah</th>
                    <th>NIK Ayah</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Penghasilan Ayah</th>
                    <th>Nama Ibu</th>
                    <th>NIK Ibu</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Penghasilan Ibu</th>
                    <th>Alamat Orang Tua</th>
                    <th>No Telpon Orang Tua</th>
                    <th>Nama Wali</th>
                    <th>NIK Wali</th>
                    <th>Pekerjaan Wali</th>
                    <th>Penghasilan Wali</th>
                    <th>Alamat Wali</th>
                    <th>No Telepon Wali</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->rowCount() > 0) {
                        foreach ($result as $row) {
                ?>
                <tr>
                    <td><?php echo $row['no']; ?></td>
                    <td><?php echo $row['program'];?></td>
                    <td><?php echo $row['nama_siswa']; ?></td>
                    <td><?php echo $row['kelamin'];?></td>
                    <td><?php echo $row['agama'];?></td>
                    <td><?php echo $row['nisn'];?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['tempat_lahir'];?></td>
                    <td><?php echo $row['tanggal_lahir'];?></td>
                    <td><?php echo $row['alamat'];?></td>
                    <td><?php echo $row['kota'];?></td>
                    <td><?php echo $row['telp'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['nik'];?></td>
                    <td><?php echo $row['no_kk'];?></td>
                    <td><?php echo $row['golongan_darah'];?></td>
                    <td><?php echo $row['berat_badan'];?></td>
                    <td><?php echo $row['lingkar_kepala'];?></td>
                    <td><?php echo $row['jarak_rumah'];?></td>
                    <td><?php echo $row['asal_sekolah'];?></td>
                    <td><?php echo $row['no_skhu'];?></td>
                    <td><?php echo $row['status_di_keluarga'];?></td>
                    <td><?php echo $row['anak_ke'];?></td>
                    <td><?php echo $row['tanggungan_keluarga'];?></td>
                    <td><?php echo $row['nama_ayah'];?></td>
                    <td><?php echo $row['nik_ayah'];?></td>
                    <td><?php echo $row['pekerjaan_ayah'];?></td>
                    <td><?php echo $row['penghasilan_ayah'];?></td>
                    <td><?php echo $row['nama_ibu'];?></td>
                    <td><?php echo $row['nik_ibu'];?></td>
                    <td><?php echo $row['pekerjaan_ibu'];?></td>
                    <td><?php echo $row['penghasilan_ibu'];?></td>
                    <td><?php echo $row['alamat_ortu'];?></td>
                    <td><?php echo $row['no_telp_ortu'];?></td>
                    <td><?php echo $row['nama_wali'];?></td>
                    <td><?php echo $row['nik_wali'];?></td>
                    <td><?php echo $row['pekerjaan_wali'];?></td>
                    <td><?php echo $row['penghasilan_wali'];?></td>
                    <td><?php echo $row['alamat_wali'];?></td>
                    <td><?php echo $row['no_telp_wali'];?></td>
                    <td>
                        <a href="download.php?no=<?php echo $row['no']; ?>">Download</a>
                    </td>
                </tr>
                <?php 
                    };
        
                } else {
                    echo "<tr><td colspan='43'>No records found</td></tr>";
                } 
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
