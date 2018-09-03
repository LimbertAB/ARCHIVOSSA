<?php
class Views{
     function render($controller,$view,$resultado){ //Controlador,Vista,tipo_usuario,header_footer(adm_), data
          $controllers =get_class($controller);
          $foo= $controllers==='Index' ? '' : "all_";
          $head= $controllers==='Index' ? '' : "adm_";
          require VIEWS.DFT.$head.'head.php';
          require VIEWS.$controllers.'/'.$view.'.php';
          require VIEWS.DFT.$foo.'footer.php';
     }
}
 ?>
