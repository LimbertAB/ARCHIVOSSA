<?php
class Caja extends Controllers{
     private $caja;
     function __construct(){
          parent::__construct();
          $this->caja=parent::loadClassmodels("CajaModel");
     }
     public function index(){
         $resultado=$this->caja->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function lapaz(){
         $resultado=$this->caja->listarlapaz();
         $this->view->render($this,"lapaz",$resultado);
     }
     public function ver($id){
         $this->caja->set('id',$_GET['id_caja']);
         $this->caja->set("tabla",$_GET['tabla']);
         $data=$this->caja->ver();
         echo json_encode($data);
     }
     public function verlapaz($id){
         $this->caja->set('id',$_GET['id_caja']);
         $this->caja->set("tabla",$_GET['tabla']);
         $data=$this->caja->verlapaz();
         echo json_encode($data);
     }
     public function printpdf($id){
          $this->caja->set('id',$_GET['id_caja']);
          $this->caja->set("tabla",$_GET['tabla']);
          $data=$this->caja->imprimir();
          $this->pdf->loadPDF($this, $data);
     }
     public function crear(){
          $this->caja->set("nombre",$_POST['nombre']);
          $this->caja->set("tabla",$_POST['tabla']);
          $resultado=$this->caja->crear();
          echo $resultado;
     }
     public function editar($id){
         $this->caja->set("id",$id);
         $this->caja->set("nombre",$_POST['nombre']);
         $this->caja->set("apellido",$_POST['apellido']);
         $this->caja->set("ci",$_POST['ci']);
         $this->caja->set("id_caja",$_POST['id_caja']);
         $resultado=$this->caja->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->caja->set('id',$id);
         $this->caja->set("tabla",$_GET['tabla']);
         $this->caja->eliminar();
     }
     public function alta($id){
         $this->caja->set('id',$id);
         $this->caja->set("id_caja",$_POST['id_caja']);
         $this->caja->alta();
     }
}
 ?>
