<?php

require 'vendor/autoload.php'; // Ensure the correct autoload path
include 'connect.php';

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;

if (isset($_GET['no'])) {
    $no = intval($_GET['no']);

    // Fetch data from database using PDO
    $stmt = $pdo->prepare("SELECT * FROM input_data WHERE no = ?");
    $stmt->execute([$no]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        // Path to the template DOCX
        $templateFile = 'assets/template.docx'; // Replace with your template DOCX path

        // Load the template
        $templateProcessor = new TemplateProcessor($templateFile);

        // Combine data fields
        $ttl = $data['tempat_lahir'] . ", " . $data['tanggal_lahir'];

        // Replace placeholders in the template
        $templateProcessor->setValue('nisn', $data['nisn']);
        $templateProcessor->setValue('program', $data['program']);
        $templateProcessor->setValue('nama', $data['nama_siswa']);
        $templateProcessor->setValue('kelamin', $data['kelamin']);
        $templateProcessor->setValue('ttl', $ttl);
        $templateProcessor->setValue('agama', $data['agama']);
        $templateProcessor->setValue('alamat', $data['alamat']);
        $templateProcessor->setValue('kota', $data['kota']);
        $templateProcessor->setValue('email', $data['email']);
        $templateProcessor->setValue('nik', $data['nik']);
        $templateProcessor->setValue('kk', $data['no_kk']);
        $templateProcessor->setValue('golDar', $data['golongan_darah']);
        $templateProcessor->setValue('bb', $data['berat_badan']);
        $templateProcessor->setValue('tinggi', $data['tinggi_badan']);
        $templateProcessor->setValue('lingkarKepala', $data['lingkar_kepala']);
        $templateProcessor->setValue('jarak', $data['jarak_rumah']);
        $templateProcessor->setValue('asal', $data['asal_sekolah']);
        $templateProcessor->setValue('skhu', $data['no_skhu']);
        $templateProcessor->setValue('status', $data['status_di_keluarga']);
        $templateProcessor->setValue('anakKe', $data['anak_ke']);
        $templateProcessor->setValue('tanggungan', $data['tanggungan_keluarga']);
        $templateProcessor->setValue('ayah', $data['nama_ayah']);
        $templateProcessor->setValue('nikAyah', $data['nik_ayah']);
        $templateProcessor->setValue('jobAyah', $data['pekerjaan_ayah']);
        $templateProcessor->setValue('salaryAyah', $data['penghasilan_ayah']);
        $templateProcessor->setValue('ibu', $data['nama_ibu']);
        $templateProcessor->setValue('nikIbu', $data['nik_ibu']);
        $templateProcessor->setValue('jobIbu', $data['pekerjaan_ibu']);
        $templateProcessor->setValue('salaryIbu', $data['penghasilan_ibu']);
        $templateProcessor->setValue('alamatOrtu', $data['alamat_ortu']);
        $templateProcessor->setValue('telpOrtu', $data['no_telp_ortu']);
        $templateProcessor->setValue('wali', $data['nama_wali']);
        $templateProcessor->setValue('nikWali', $data['nik_wali']);
        $templateProcessor->setValue('jobWali', $data['pekerjaan_wali']);
        $templateProcessor->setValue('salaryWali', $data['penghasilan_wali']);
        $templateProcessor->setValue('alamatWali', $data['alamat_wali']);
        $templateProcessor->setValue('telpWali', $data['no_telp_wali']);

        // Save the filled template to a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'word') . '.docx';
        $templateProcessor->saveAs($tempFile);

        // Convert DOCX to PDF using PhpWord and Dompdf
        $phpWord = IOFactory::load($tempFile);
        $xmlWriter = IOFactory::createWriter($phpWord, 'HTML');

        ob_start();
        $xmlWriter->save('php://output');
        $htmlContent = ob_get_clean();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream('member_data_' . $no . '.pdf', array("Attachment" => 1));
    } else {
        echo "Data not found for the given ID.";
    }
} else {
    echo "No ID provided.";
}
?>
