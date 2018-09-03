<?php
     require "config.php";
     require LBS."/autoload.php";
     require LBS."/Router.php";
     $router=new Router();
     $controller=$router->getController();
     $method=$router->getMethod();
     $params=$router->getParam();

     // echo '<pre>';
     // print_r($router->getUri());
     // echo '</pre>';
     // echo '<pre>';
     // echo "controlador: {$controller} <br>";
     // echo '</pre>';

     $controllersPath='Controllers/'.$controller.'.php';
     if (file_exists($controllersPath)) {
          require $controllersPath;
          $controller=new $controller();
          if (isset($method)) {
               if (method_exists($controller, $method)) {
                    if (isset($params)) {
                         $controller->{$method}($params);
                    }else{
                         $controller->{$method}();
                    }
               }else{
                    $controller->index();
               }
          }else{
               $controller->index();
          }
     }else {
          header("Location: /Principal");
          exit();
     }
 ?>
