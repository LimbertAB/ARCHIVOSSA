<?php
class Router{
     public $uri;
     public $controller;
     public $method;
     public $param;
     private $session;
     public function __construct(){
          Session::start();
          $this->setSession();
          $this->setUri();
          $this->setController();
          $this->setMethod();
          $this->setParam();
     }
     public function setSession(){
          $this->session=Session::getSession('User');
          if (isset($this->session)) {
               if (URI=='/') {
                    header("Location: /Principal");
                    exit();
               }
          }else{
               if (URI != '/') {
                    if(URI!='/Index/userLogin'){
                         header("Location: /");
                         exit();
                    }
               }
          }
     }
     public function setUri(){
          $this->uri = explode('/', URI);
     }
     public function setController(){
          $this->controller = $this->uri[1] === '' ? 'Index' : $this->uri[1];
     }
     public function setMethod(){
          $this->method = ! empty($this->uri[2]) ? $this->uri[2] : 'index';
     }
     public function setParam(){
          $this->param = ! empty($this->uri[3]) ? $this->uri[3] : '';
     }
     public function getUri(){
          return $this->uri;
     }
     public function getController(){
          return $this->controller;
     }
     public function getMethod(){
          return $this->method;
     }
     public function getParam(){
          $aux=explode('?', $this->param)==null ? [] : explode('?', $this->param);
          $this->param= $aux==[] ?  $this->param : $aux[0] ;
          return $this->param;
     }
}
