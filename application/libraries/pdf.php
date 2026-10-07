<?php


require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    
public function createPDF($html, $filename = '', $download = FALSE, $paper = 'A4', $orientation = 'portrait') {
    $dompdf = new Dompdf\Dompdf();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    $output = $dompdf->output();

    // 1. Guardamos el archivo físicamente con el nombre dinámico
    // Asegúrate de que el nombre termine en .pdf
    //validamos si el nombre de archivo tiene la palabra PORTADA, si es asi eliminamos la palabra PORTADA del nombre del archivo para que no se guarde con ese nombre
    if (strpos($filename, 'PORTADA') !== false) {
        $filename = str_replace('_PORTADA', '', $filename);
    }
    file_put_contents($filename, $output);

    unset($dompdf); 
    unset($output);
    unset($html);
    gc_collect_cycles();

    // 2. SOLO hacemos stream si $download no es NULL
    // Si pasamos NULL desde el controlador, el script seguirá ejecutándose
    if ($download !== NULL) {
        if ($download) {
            $dompdf->stream($filename, array('Attachment' => 1));
        } else {
            $dompdf->stream($filename, array('Attachment' => 0));
        }
    }
}
}
?>