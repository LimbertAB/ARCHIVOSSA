<?php
class Usuario extends Controllers{
     private $usuario;
     function __construct(){
          parent::__construct();
          $this->usuario=parent::loadClassmodels("UsuarioModel");
     }
     public function index(){
         $resultado=$this->usuario->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function ver($id){
         $this->usuario->set('id',$id);
         $data=$this->usuario->ver();
         echo json_encode($data);
     }
     public function crear(){
          $this->usuario->set("id_persona",$_POST['id_persona']);
          $this->usuario->set("password", $_POST['password']);
          $this->usuario->set("tipo", $_POST['tipo']);
          $resultado=$this->usuario->crear();
          // echo $resultado;
     }
     public function editar($id){
         $this->usuario->set("id",$id);
         $this->usuario->set("password", $_POST['password']);
         $this->usuario->set("tipo", $_POST['tipo']);
         $resultado=$this->usuario->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->usuario->set('id',$id);
         $this->usuario->eliminar();
     }
     public function alta($id){
         $this->usuario->set('id',$id);
         $this->usuario->alta();
     }
     public function destroySession(){
          Session::destroy();
          header('Location: '.URL);
          exit();
     }
}
 ?>
