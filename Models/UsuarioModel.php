<?php
     class UsuarioModel extends Conexion{
          function __construct(){
               parent::__construct();
          }
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function login(){
               $auth="SELECT u.id,u.id_persona,u.tipo,p.apellido,p.nombre FROM usuario as u
                    JOIN persona as p ON u.id_persona=p.id
                    WHERE p.ci = '{$this->ci}' AND u.password= '{$this->password}' and u.estado=1";
               $result= parent::consultaRetorno($auth);
               if(count($result)==1){
                    return $result[0];
               }else{
                    return "false";
               }
          }
          public function listar(){
               $user="SELECT p.nombre,p.id as id_persona,p.ci,p.apellido,u.id FROM usuario as u
                    JOIN persona as p ON u.id_persona = p.id WHERE u.estado = 1";
               $bajas="SELECT p.nombre,p.id as id_persona,p.ci,p.apellido,u.id FROM usuario as u
                    JOIN persona as p ON u.id_persona = p.id WHERE u.estado = 0";
               $persona="SELECT nombre,id,apellido,ci FROM persona WHERE access = 0 AND ciudad='potosi'";
               $result=["usuarios"=> parent::consultaRetorno($user),
                         "bajas"=> parent::consultaRetorno($bajas),
                         "personas"=> parent::consultaRetorno($persona),
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT p.nombre,p.apellido,p.ci,u.id,u.id_persona,u.tipo FROM usuario as u
                    JOIN persona as p ON p.id = u.id_persona
                    WHERE u.id = '{$this->id}' LIMIT 1";
               $resultado = parent::consultaOneRow($sql);
               $row=$resultado;
               return $row;
          }
          public function crear(){
               $date=date("Y-m-d");
               $sql=("INSERT INTO usuario(id_persona,tipo,password,created_at) VALUES('{$this->id_persona}','{$this->tipo}','{$this->password}','{$date}')");
               $result=parent::consultaRegistro($sql);
               $sql2=("UPDATE persona SET access=1 WHERE id= '{$this->id_persona}'");
               parent::consultaRegistro($sql2);
               echo "El Usuario se Registro Satisfactoriamente";
          }
          public function editar(){
               $date=date("Y-m-d");
               if ($this->password=="") {
                    $sql=("UPDATE usuario SET tipo='{$this->tipo}',updated_at='{$date}' WHERE id='{$this->id}'");
               }else{
                    $sql=("UPDATE usuario SET tipo='{$this->tipo}',password='{$this->password}',updated_at='{$date}' WHERE id='{$this->id}'");
               }
               parent::consultaRegistro($sql);
               echo "El Usuario se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE usuario SET estado=0 WHERE id='{$this->id}'";
               parent::consultaRegistro($sql);
               echo "Usuario dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE usuario SET estado=1 WHERE id='{$this->id}'";
               parent::consultaRegistro($sql);
               echo "Usuario dado de ALTA Satisfactoriamente";
          }
          public function ver_ci(){
               $sql="SELECT * FROM usuario WHERE ci='{$this->ci}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
