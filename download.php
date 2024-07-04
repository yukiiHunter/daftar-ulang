<?php

include 'tcpdf/tcpdf.php';
include 'fpdi/src/autoload.php';
include 'connect.php';

use setasign\Fpdi\Tcpdf\Fpdi;

if (isset($_GET['no'])) {
    $no = intval($_GET['no']);

    // Fetch data from database
    $stmt = $conn->prepare("SELECT * FROM input_data WHERE no = ?");
    $stmt->bind_param("i", $no);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        // Path to the template PDF
        $templateFile = 'assets/template.pdf'; // Replace with your template PDF path

        // Create new PDF instance
        $pdf = new Fpdi();

        // Add a page
        $pdf->AddPage();

        // Set source template
        $pageCount = $pdf->setSourceFile($templateFile);
        $tplIdx = $pdf->importPage(1);

        // Use the imported page
        $pdf->useTemplate($tplIdx, 0, 0, null, null, true);

        // Set font
        $pdf->SetFont('Times New Roman', '', 12);

        // Get the content of the template PDF
        $pdfText = file_get_contents($templateFile);

        // Replace placeholders in the template content
        $ttl = $data['tempat_lahir'] . "," . $data['tanggal_lahir'];

        $pdfText = str_replace('{{nisn}}', $data['nisn'], $pdfText);
        $pdfText = str_replace('{{program}}', $data['program'], $pdfText);
        $pdfText = str_replace('{{nama}}', $data['nama_siswa'], $pdfText);
        $pdfText = str_replace('{{kelamin}}', $data['kelamin'], $pdfText);
        $pdfText = str_replace('{{ttl}}', $ttl, $pdfText);
        $pdfText = str_replace('{{agama}}', $data['agama'], $pdfText);
        $pdfText = str_replace('{{alamat}}', $data['alamat'], $pdfText);
        $pdfText = str_replace('{{kota}}', $data['kota'], $pdfText);
        $pdfText = str_replace('{{email}}', $data['email'], $pdfText);
        $pdfText = str_replace('{{nik}}', $data['nik'], $pdfText);
        $pdfText = str_replace('{{kk}}', $data['no_kk'], $pdfText);
        $pdfText = str_replace('{{golDar}}', $data['golongan_darah'], $pdfText);
        $pdfText = str_replace('{{bb}}', $data['berat_badan'], $pdfText);
        $pdfText = str_replace('{{tinggi}}', $data['tinggi_badan'], $pdfText);
        $pdfText = str_replace('{{lingkarKepala}}', $data['lingkar_kepala'], $pdfText);
        $pdfText = str_replace('{{jarak}}', $data['jarak_rumah'], $pdfText);
        $pdfText = str_replace('{{asal}}', $data['asal_sekolah'], $pdfText);
        $pdfText = str_replace('{{skhu}}', $data['no_skhu'], $pdfText);
        $pdfText = str_replace('{{status}}', $data['status_di_keluarga'], $pdfText);
        $pdfText = str_replace('{{anakKe}}', $data['anak_ke'], $pdfText);
        $pdfText = str_replace('{{tanggungan}}', $data['tanggungan_keluarga'], $pdfText);
        $pdfText = str_replace('{{ayah}}', $data['nama_ayah'], $pdfText);
        $pdfText = str_replace('{{nikAyah}}', $data['nik_ayah'], $pdfText);
        $pdfText = str_replace('{{jobAyah}}', $data['pekerjaan_ayah'], $pdfText);
        $pdfText = str_replace('{{salaryAyah}}', $data['penghasilan_ayah'], $pdfText);
        $pdfText = str_replace('{{ibu}}', $data['nama_ibu'], $pdfText);
        $pdfText = str_replace('{{nikIbu}}', $data['nik_ibu'], $pdfText);
        $pdfText = str_replace('{{jobIbu}}', $data['pekerjaan_ibu'], $pdfText);
        $pdfText = str_replace('{{salaryIbu}}', $data['penghasilan_ibu'], $pdfText);
        $pdfText = str_replace('{{alamatOrtu}}', $data['alamat_ortu'], $pdfText);
        $pdfText = str_replace('{{telpOrtu}}', $data['no_telp_ortu'], $pdfText);
        $pdfText = str_replace('{{wali}}', $data['nama_wali'], $pdfText);
        $pdfText = str_replace('{{nikWali}}', $data['nik_wali'], $pdfText);
        $pdfText = str_replace('{{jobWali}}', $data['pekerjaan_wali'], $pdfText);
        $pdfText = str_replace('{{salaryWali}}', $data['penghasilan_wali'], $pdfText);
        $pdfText = str_replace('{{alamatWali}}', $data['alamat_wali'], $pdfText);
        $pdfText = str_replace('{{telpWali}}', $data['no_telp_wali'], $pdfText);

        // Output the PDF
        $pdf->Output('member_data_' . $no . '.pdf', 'D');
    } else {
        echo "Data not found for the given ID.";
    }
} else {
    echo "No ID provided.";
}
?>