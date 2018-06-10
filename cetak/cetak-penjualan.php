<?php
require '../core/init-cetak.php';
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

// get the HTML
ob_start();
include(dirname('__FILE__').'/res/cetak-penjualan.php');
$content = ob_get_clean();
try
{
    // init HTML2PDF
    $html2pdf = new HTML2PDF('P','A4','en', false, 'UTF-8');
    $html2pdf->pdf->SetDisplayMode('fullpage');

    $html2pdf->writeHTML($content);
    // send the PDF
    $html2pdf->Output('about.pdf');
}

catch(HTML2PDF_exception $e)
{
    echo $e;
    exit;
}
?>
