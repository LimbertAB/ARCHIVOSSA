<?php
     class PersonalModel extends Conexion{
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
               $persona="SELECT p.*,c.nombre as caja FROM persona as p
               LEFT JOIN caja as c ON c.id=p.id_caja where p.ciudad='potosi' AND p.estado=1";
               $bajas="SELECT p.*,c.nombre as caja FROM persona as p
               LEFT JOIN cajaretirado as c ON c.id=p.id_caja where p.ciudad='potosi' AND p.estado=0";
               $cajas="SELECT * FROM caja WHERE estado = 1";
               $cajaretirados="SELECT * FROM cajaretirado WHERE estado = 1";
               $result=[
                         "personal"=> parent::consultaRetorno($persona),
                         "bajas"=>parent::consultaRetorno($bajas),
                         "cajas"=>parent::consultaRetorno($cajas),
                         "cajasretirados"=>parent::consultaRetorno($cajaretirados)
               ];
               return $result;
          }
          public function ver(){
               $persona="SELECT p.*,c.nombre as caja FROM persona as p
               LEFT JOIN caja as c ON c.id=p.id_caja WHERE p.id='{$this->id}' LIMIT 1";
               $aux=parent::consultaOneRow($persona);
               if($aux['updated_user']==null){
                    return $aux;
               }else{
                    $iduser=$aux['updated_user'];
                    $editor="SELECT nombre,apellido FROM persona WHERE id='{$iduser}' LIMIT 1";
                    $aux2= parent::consultaOneRow($editor);
                    $aux['editor']=$aux2['nombre']." ".$aux2['apellido'];
                    return $aux;
               }
          }
          public function crear(){
               $date=date("Y-m-d");
               $ver_codigo=$this->ver_codigo();
               if($ver_codigo != 0){
                    return "codigo";
               }else{
                    $ver_ci=$this->ver_ci();
                    if($ver_ci != 0){
                         return "ci";
                    }else{
                         $sql=("INSERT INTO persona(nombre,apellido,codigo,ci,id_caja,ciudad,created_at) VALUES(
                              '{$this->nombre}','{$this->apellido}','{$this->codigo}','{$this->ci}','{$this->id_caja}','{$this->ciudad}','{$date}')");
                         parent::consultaRegistro($sql);
                         return "La Personal se Registro Satisfactoriamente";
                    }
               }
          }
          public function editar(){
               $date=date("Y-m-d");
               if ($this->codigo=="") {
                    if ($this->ci=="") {
                         $sql=("UPDATE persona SET nombre='{$this->nombre}',apellido='{$this->apellido}',id_caja='{$this->id_caja}',updated_at='{$date}',updated_user='{$this->user_id}' WHERE id='{$this->id}' ");
                         parent::consultaRegistro($sql);
                         echo "La Personal se Modifico Satisfactoriamente";
                    }else{
                         $ver_ci=$this->ver_ci();
                         if($ver_ci != 0){
                              echo "ci";
                         }else{
                              $sql=("UPDATE persona SET nombre='{$this->nombre}',apellido='{$this->apellido}', ci='{$this->ci}',id_caja='{$this->id_caja}',updated_at='{$date}',updated_user='{$this->user_id}' WHERE id='{$this->id}' ");
                              parent::consultaRegistro($sql);
                              echo "La Personal se Modifico Satisfactoriamente";
                         }
                    }
               }else{
                    $ver_codigo=$this->ver_codigo();
                    if($ver_codigo != 0){
                         echo "codigo";
                    }else{
                         if ($this->ci=="") {
                              $sql=("UPDATE persona SET nombre='{$this->nombre}',apellido='{$this->apellido}',codigo='{$this->codigo}',id_caja='{$this->id_caja}',updated_at='{$date}',updated_user='{$this->user_id}' WHERE id='{$this->id}' ");
                              parent::consultaRegistro($sql);
                              echo "La Personal se Modifico Satisfactoriamente";
                         }else{
                              $ver_ci=$this->ver_ci();
                              if($ver_ci != 0){
                                   echo "ci";
                              }else{
                                   $sql=("UPDATE persona SET nombre='{$this->nombre}',apellido='{$this->apellido}',codigo='{$this->codigo}',ci='{$this->ci}',id_caja='{$this->id_caja}',updated_at='{$date}',updated_user='1' WHERE id='{$this->id}' ");
                                   parent::consultaRegistro($sql);
                                   echo "La Personal se Modifico Satisfactoriamente";
                              }
                         }
                    }

               }
          }
          public function eliminar(){
               $sql="UPDATE persona SET estado=0,id_caja='{$this->id_caja}' WHERE id='{$this->id}'";
               parent::consultaRegistro($sql);
               echo "Personal dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE persona SET estado=1,id_caja='{$this->id_caja}' WHERE id='{$this->id}'";
               parent::consultaRegistro($sql);
               echo "Personal dado de ALTA Satisfactoriamente";
          }
          public function ver_ci(){
               $sql="SELECT * FROM persona WHERE ci='{$this->ci}'";
               $resultado=parent::consultaRetorno($sql);
               return count($resultado);
          }
          public function ver_codigo(){
               $sql="SELECT * FROM persona WHERE codigo='{$this->codigo}'";
               $resultado=parent::consultaRetorno($sql);
               return count($resultado);
          }
          //CIUDAD DE LA PAZ
          public function listarlapaz(){
               $persona="SELECT p.*,c.nombre as caja FROM persona as p
               LEFT JOIN cajalapaz as c ON c.id=p.id_caja where p.ciudad='lapaz' AND p.estado=1";
               $bajas="SELECT p.*,c.nombre as caja FROM persona as p
               LEFT JOIN cajalapazretirado as c ON c.id=p.id_caja where p.ciudad='lapaz' AND p.estado=0";
               $cajas="SELECT * FROM cajalapaz WHERE estado = 1";
               $cajaretirados="SELECT * FROM cajalapazretirado WHERE estado = 1";
               $result=[
                         "personal"=> parent::consultaRetorno($persona),
                         "bajas"=>parent::consultaRetorno($bajas),
                         "cajas"=>parent::consultaRetorno($cajas),
                         "cajasretirados"=>parent::consultaRetorno($cajaretirados)
               ];
               return $result;
          }
     }
 ?>
