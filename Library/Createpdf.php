<?php
class Createpdf{
     function loadPDF($controller,$resultado){
          $controllers =get_class($controller);
          require VIEWS.$controllers.'/print.php';
          require_once '/../dompdf/dompdf_config.inc.php';
          $dompdf = new DOMPDF();
          $dompdf->load_html(utf8_encode(ob_get_clean()));
          $dompdf->render();
          $dompdf->stream($controllers."pdf",array('Attachment' => 0));
     }
}
?>
