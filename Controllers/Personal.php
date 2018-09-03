<?php
class Personal extends Controllers{
     private $personal;
     function __construct(){
          parent::__construct();
          $this->personal=parent::loadClassmodels("PersonalModel");
     }
     public function index(){
         $resultado=$this->personal->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function lapaz(){
         $resultado=$this->personal->listarlapaz();
         $this->view->render($this,"lapaz",$resultado);
     }
     public function ver($id){
         $this->personal->set('id',$id);
         $data=$this->personal->ver();
         echo json_encode($data);
     }
     public function buscar($id){
         $this->personal->set('id',$id);
         $data=$this->personal->buscar();
         echo json_encode($data);
     }
     public function crear(){
          $this->personal->set("nombre",$_POST['nombre']);
          $this->personal->set("apellido",$_POST['apellido']);
          $this->personal->set("codigo",$_POST['codigo']);
          $this->personal->set("ci",$_POST['ci']);
          $this->personal->set("id_caja",$_POST['id_caja']);
          $this->personal->set("ciudad",$_POST['ciudad']);
          $resultado=$this->personal->crear();
          echo $resultado;
     }
     public function editar($id){
         $this->personal->set("id",$id);
         $this->personal->set("nombre",$_POST['nombre']);
         $this->personal->set("apellido",$_POST['apellido']);
         $this->personal->set("codigo",$_POST['codigo']);
         $this->personal->set("ci",$_POST['ci']);
         $this->personal->set("id_caja",$_POST['id_caja']);
         $resultado=$this->personal->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->personal->set('id',$id);
         $this->personal->set("id_caja",$_POST['id_caja']);
         $this->personal->eliminar();
     }
     public function alta($id){
         $this->personal->set('id',$id);
         $this->personal->set("id_caja",$_POST['id_caja']);
         $this->personal->alta();
     }
}
 ?>
