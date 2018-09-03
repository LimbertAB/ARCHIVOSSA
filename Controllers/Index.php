<?php
class Index extends Controllers{
     private $usuario;
     public function __construct(){
          parent::__construct();
          $this->usuario=parent::loadClassmodels("UsuarioModel");
     }
     public function index(){
          $this->view->render($this,"index","");
     }
     public function userLogin(){
          if (isset($_POST['ci']) && isset($_POST['password'])) {
               $this->usuario->set("ci",$_POST['ci']);
               $this->usuario->set("password",$_POST['password']);
               $data=$this->usuario->login();
               if ($data!="false") {
                    $this->createSession($data);
                    echo json_encode($data);
               }else{echo "false";}
         }
     }
     public function backup(){
          $time=date("dmY_His");
          $fn = 'database.db';
       	$newfn = 'Database/backups/backup_'.$time.'.db';
       	if(copy($fn,$newfn)){
             echo 'Backup Creado: en la carpeta ../www/Database/backups/backup_'.$time.'.db';
          }else{
               echo "false";
          }
     }
     function createSession($user){
          Session::setSession('User',$user);
     }
}
 ?>
