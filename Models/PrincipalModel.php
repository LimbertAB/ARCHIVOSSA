<?php
     class PrincipalModel extends Conexion{
          public $user_id;
          public $session;
          function __construct(){
               parent::__construct();
               $this->session=Session::getSession('User');
               if (isset($this->session)){
                    $this->user_id=$this->session['id_persona'];
               }
          }
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar(){
               $profile="SELECT * FROM persona WHERE id='{$this->user_id}' LIMIT 1";
               $usuario="SELECT COUNT(*) as usuario FROM usuario WHERE estado=1";
               $caja="SELECT COUNT(*) as caja FROM caja WHERE estado=1";
               $cajalapaz="SELECT COUNT(*) as cajalapaz FROM cajalapaz WHERE estado=1";
               $personal="SELECT COUNT(*) as personal FROM persona WHERE ciudad='potosi' AND estado=1";
               $lapaz="SELECT COUNT(*) as lapaz FROM persona WHERE ciudad='lapaz' AND estado=1";
               $allpersona="SELECT * FROM persona";
               $result=["profile"=> parent::consultaOneRow($profile),
                         "usuarios"=> parent::consultaOneRow($usuario),
                         "caja"=> parent::consultaOneRow($caja),
                         "cajalapaz"=> parent::consultaOneRow($cajalapaz),
                         "personal"=> parent::consultaOneRow($personal),
                         "lapaz"=> parent::consultaOneRow($lapaz),
                         "allpersonal"=> parent::consultaRetorno($allpersona),
               ];
               return $result;
          }
          public function ver(){

          }
          public function crear(){

          }
          public function editar(){

          }
          public function eliminar(){

          }
          public function alta(){

          }

     }
 ?>
