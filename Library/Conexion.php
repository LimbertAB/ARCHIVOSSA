<?php
     include "./_pdo.php";
     class Conexion{
          //atributes
          private $connection;
          public $db_file = "sqlite:database.db";
          function __construct() {
          	$db_file = "./database.db";
          	PDO_Connect("sqlite:$db_file");
          }
          public function consultaSimple($sql){
               mysql_query($sql);
          }
          public function consultaRetorno($sql){
          	$data = PDO_FetchAll($sql);
               return $data;
          }
          public function consultaRegistro($sql){
          	$data = PDO_FetchOne($sql);
               return $data;
          }
          public function consultaOneRow($sql){
          	$data = PDO_FetchRow($sql);
               return $data;
          }
          public function consultaEditRow($sql){
          	$data = PDO_Execute($sql);
               return $data;
          }
     }
