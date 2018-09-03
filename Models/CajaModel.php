<?php
     class CajaModel extends Conexion{
          function __construct(){
               parent::__construct();
          }
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar(){
               $activas=parent::consultaRetorno("SELECT * FROM caja where estado=1");
               $retirado=parent::consultaRetorno("SELECT * FROM cajaretirado where estado=1");
               for ($i=0; $i < count($activas); $i++) {
                    $idcaja=$activas[$i]['id'];
                    $personal=parent::consultaRetorno("SELECT count(*) as total FROM persona WHERE id_caja='{$idcaja}' AND estado=1 AND ciudad='potosi' ");
                    $activas[$i]['personal']=$personal;
               }
               for ($i=0; $i < count($retirado); $i++) {
                    $idcaja=$retirado[$i]['id'];
                    $personal=parent::consultaRetorno("SELECT count(*) as total FROM persona WHERE id_caja='{$idcaja}' AND estado=0 AND ciudad='potosi' ");
                    $retirado[$i]['personal']=$personal;
               }
               $result=[
                         "cajas"=> $activas,
                         "cajasretirados"=>$retirado
               ];
               return $result;
          }
          public function ver(){
               if ($this->tabla=="caja") {
                    $estado=1;
                    $caja=parent::consultaOneRow("SELECT * FROM caja WHERE id='{$this->id}' LIMIT 1");
               }else{
                    $estado=0;
                    $caja=parent::consultaOneRow("SELECT * FROM cajaretirado WHERE id='{$this->id}' LIMIT 1");
               }
               $personal=parent::consultaRetorno("SELECT nombre,apellido,id,ci FROM persona WHERE id_caja='{$this->id}' AND estado='{$estado}' AND ciudad='potosi' ");
               $caja['personal']=$personal;
               return $caja;
          }
          public function imprimir(){
               if ($this->tabla=="caja" || $this->tabla=="cajalapaz") {
                    $estado=1;
                    $city=$this->tabla=="caja"? "potosi":"lapaz";
               }else{
                    $estado=0;
                    $city=$this->tabla=="cajaretirado"? "potosi":"lapaz";
               }
               $caja=parent::consultaOneRow("SELECT * FROM '{$this->tabla}' WHERE id='{$this->id}' LIMIT 1");

               $personal=parent::consultaRetorno("SELECT nombre,apellido,id,ci,ciudad FROM persona WHERE id_caja='{$this->id}' AND estado='{$estado}' AND ciudad='{$city}' ");
               $caja['personal']=$personal;
               return $caja;
          }
          public function crear(){
               $sql=("INSERT INTO '{$this->tabla}'(nombre) VALUES('{$this->nombre}')");
               parent::consultaRegistro($sql);
               return "La Caja se Registro Satisfactoriamente";
          }
          public function editar(){
               $date=date("Y-m-d");
               if ($this->ci=="") {
                    $sql=("UPDATE persona SET nombre='{$this->nombre}',apellido='{$this->apellido}',id_caja='{$this->id_caja}',updated_at='{$date}',updated_user='1' WHERE id='{$this->id}' ");
                    parent::consultaRegistro($sql);
                    echo "La Caja se Modifico Satisfactoriamente";
               }else{
                    $ver_ci=$this->ver_ci();
                    if($ver_ci != 0){
                         echo "false";
                    }else{

                         $sql=("UPDATE persona SET nombre='{$this->nombre}',apellido='{$this->apellido}', ci='{$this->ci}',id_caja='{$this->id_caja}',updated_at='{$date}',updated_user='1' WHERE id='{$this->id}' ");
                         parent::consultaRegistro($sql);
                         echo "La Caja se Modifico Satisfactoriamente";
                    }
               }
          }
          public function eliminar(){
               $sql="DELETE from '{$this->tabla}' WHERE id='{$this->id}'";
               parent::consultaRegistro($sql);
               $sql2="DELETE FROM sqlite_sequence where name='{$this->tabla}'";
               parent::consultaRegistro($sql2);
               echo "Caja dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE persona SET estado=1,id_caja='{$this->id_caja}' WHERE id='{$this->id}'";
               parent::consultaRegistro($sql);
               echo "Caja dado de ALTA Satisfactoriamente";
          }
          public function ver_ci(){
               $sql="SELECT * FROM persona WHERE ci='{$this->ci}'";
               $resultado=parent::consultaRetorno($sql);
               return count($resultado);
          }

          //CIUDAD DE LA PAZ
          public function listarlapaz(){
               $activas=parent::consultaRetorno("SELECT * FROM cajalapaz where estado=1");
               $retirado=parent::consultaRetorno("SELECT * FROM cajalapazretirado where estado=1");
               for ($i=0; $i < count($activas); $i++) {
                    $idcaja=$activas[$i]['id'];
                    $personal=parent::consultaRetorno("SELECT count(*) as total FROM persona WHERE id_caja='{$idcaja}' AND estado=1 AND ciudad='lapaz' ");
                    $activas[$i]['personal']=$personal;
               }
               for ($i=0; $i < count($retirado); $i++) {
                    $idcaja=$retirado[$i]['id'];
                    $personal=parent::consultaRetorno("SELECT count(*) as total FROM persona WHERE id_caja='{$idcaja}' AND estado=0 AND ciudad='lapaz' ");
                    $retirado[$i]['personal']=$personal;
               }
               $result=[
                         "cajas"=> $activas,
                         "cajasretirados"=>$retirado
               ];
               return $result;
          }
          public function verlapaz(){
               if ($this->tabla=="cajalapaz") {
                    $estado=1;
                    $caja=parent::consultaOneRow("SELECT * FROM cajalapaz WHERE id='{$this->id}' LIMIT 1");
               }else{
                    $estado=0;
                    $caja=parent::consultaOneRow("SELECT * FROM cajalapazretirado WHERE id='{$this->id}' LIMIT 1");
               }
               $personal=parent::consultaRetorno("SELECT nombre,apellido,id,ci FROM persona WHERE id_caja='{$this->id}' AND estado='{$estado}' AND ciudad='lapaz' ");
               $caja['personal']=$personal;
               return $caja;

          }
     }
 ?>
