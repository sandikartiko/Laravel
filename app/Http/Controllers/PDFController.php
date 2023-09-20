<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Buat objek Dompdf
        $dompdf = new dompdf();

        // Ambil konten dari view yang ingin dijadikan PDF
        $content = view('datasiswa.exportPDF')->render();

        // Tambahkan konten ke Dompdf
        $dompdf->loadHtml($content);

        // Render PDF
        $dompdf->render();

        // Generate output PDF
        $dompdf->stream('kop_surat.pdf', ['Attachment' => false]);
    }
}
