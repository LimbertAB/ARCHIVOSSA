<?php ob_start();?>
<!DOCTYPE html>
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
          <title>Lista de personal de <?php echo $resultado['nombre']." ".$resultado['id']; ?></title>
          <style>
          *{ font-family: verdana, sans-serif !important;}
          table td{
               border: 1px solid #8b8b8b;
          }
          p {
               text-align: justify;
               margin: 0;
               padding: 0;
               text-align: center;
          }
          h4 {
               font-weight: 600;
               font-size: .9em;
               margin: 2px 1px 2px 10px;
          }
          h6{
               font-weight: 200;
               font-size: .7em;
               margin: 0px;
               text-align: center;
          }
          td{
             line-height: 1.3em;
             padding: 0;
             margin: 0;
             text-align: center;
          }
          tr{
               padding: 0;
               margin: 0;
          }
          small{
               font-weight: 200;
               color: #757575;
               font-size: .98em;
          }
          h5{
               margin:3px;padding:0;
               font-weight:200;font-size: .7em;
          }
          h3{
               margin: 0;padding: 0;
          }
          </style>
     </head>
     <body >
          <?php
               if ($resultado['nombre'] == 'Cajon' || $resultado['nombre'] == 'Cajon R') {
                    $ciudad="Potosí";
               } else{
                         $ciudad="La Paz";
               }
          ?>
          <img src="<?php echo URL;?>public/images/logos/logo.png" width="140px" style="position: absolute;top:-25px;z-index:10">
          <center><h3>LISTA DE PERSONAL EN CAJAS <br> <small></small></h3></center>
          <center><h5 style="z-index:10;margin:0px 0 0px 0px">NOMBRE DE LA CAJA: <small><?php echo $resultado['nombre']." ".$resultado['id']; ?></small> </h5></center>
          <center><h5 style="z-index:10;margin:0px 0 20px 0px">CIUDAD: <small><?php echo $ciudad?></small> </h5></center>
          <table width="100%" style="margin-top:10px"  width="100%" cellspacing="0" cellpadding="0">
               <thead style="background:#bdbdbd;text-align:center">
                    <tr>
                         <td width="10%">N°</td>
                         <td width="10%">CÓDIGO</td>
                         <td width="10%">CI</td>
                         <td width="30%">NOMBRES</td>
                         <td width="40%">APELLIDOS</td>
                    </tr>
               </thead>
               <tbody>
                    <?php for($i=0;$i< count($resultado['personal']);$i++){?>
                         <tr>
                              <td><h5><?php echo $i+1?></h5></td>
                              <td><h5><?php echo $resultado['personal'][$i]['id']; ?></h5></td>
                              <td><h5><?php echo $resultado['personal'][$i]['ci']; ?></h5></td>
                              <td style="text-align:left;padding-left:9px"><h5><?php echo utf8_encode($resultado['personal'][$i]['nombre'])?></h5></td>
                              <td style="text-align:left;padding-left:9px"><h5><?php echo utf8_encode($resultado['personal'][$i]['apellido'])?></h5></td>
                         </tr>
                    <?php } ?>
               </tbody>
          </table>
          <?php if(count($resultado['personal'])<1){ ?>
               <p style="padding-top:50px;color:#313131;font-weight:200;font-size:.9em;">Esta caja no tiene personal!!</p>
          <?php } ?>
     </body>
</html>
