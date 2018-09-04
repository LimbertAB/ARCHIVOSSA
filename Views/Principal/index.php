<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="padding:0 15px 0 15px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="row" style="background:#17c1e7;padding:0">
          <div class="col-md-12">
            <img src="<?php echo URL; ?>public/images/icons/user_circle.png" alt="profile" class="center-block" width="110px" style="padding:10px;margin-top:0">
          </div>
          <h4 class="text-center" style="color:#fff;font-weight:600;margin-bottom:2px"><?php echo $session['nombre']." ".$session['apellido'];?></h4>
          <div class="col-md-12">
               <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="text-align:right;color:#2289b6;padding-left:0"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> <?php echo $resultado['profile']['ci'] ?></p>
               <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="text-align:left;color:#2289b6;padding-right:0"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $resultado['profile']['ciudad'] =='potosi' ?"Potosí":"La Paz" ?></p>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><img src="<?php echo URL; ?>public/images/icons/status.jpg" alt="profile" class="img-circle center-block hexagon" width="90px" style="margin-top:10px"></div>
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><img src="<?php echo URL; ?>public/images/icons/profile.jpg" alt="profile" class="img-circle center-block hexagon" width="90px" style="margin-top:10px"></div>
          <div class="col-md-12">
             <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#fff;padding-left:0">Activo  <span class="glyphicon glyphicon-ok-sign" style="color: #ffffff" aria-hidden="true"></span></p>
             <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#fff;padding-right:0">Codigo: <small style="font-size:1.5em;color:#fff;font-weight:700"><?php echo $resultado['profile']['id'] ?></small></p>
          </div>
     </div>
     <div class="row" style="background:#f1f1f1">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a href="/Personal"><img src="<?php echo URL; ?>public/images/icons/profile2.jpg" alt="profile" class="img-circle center-block hexagon" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a href="/Personal/lapaz"><img src="<?php echo URL; ?>public/images/icons/users.jpg" alt="profile" class="img-circle center-block" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-12">
               <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-left:0">Personal Potosí:<small style="font-size:1.5em;color:#31cfeb;font-weight:700"> <?php echo $resultado['personal']['personal'] ?></small></p>
               <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-right:0">Personal La Paz:<small style="font-size:1.5em;color:#31cfeb;font-weight:700"> <?php echo $resultado['lapaz']['lapaz'] ?></small></p>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a href="/Caja"><img src="<?php echo URL; ?>public/images/icons/box1.jpg" alt="profile" class="img-circle center-block hexagon" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a href="/Caja/lapaz"><img src="<?php echo URL; ?>public/images/icons/box.jpg" alt="profile" class="img-circle center-block" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-12">
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-left:0">Cajas Potosí:<small style="font-size:1.5em;color:#31cfeb;font-weight:700;"> <?php echo $resultado['caja']['caja'] ?></small></p>
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-right:0">Cajas La Paz:<small style="font-size:1.5em;color:#31cfeb;font-weight:700"> <?php echo $resultado['cajalapaz']['cajalapaz'] ?></small></p>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
     <table id="todos" style="display:none">
          <tbody>
               <?php for ($i=0; $i < count($resultado["allpersonal"]); $i++) {?>
                    <tr>
                         <td><?php echo $resultado["allpersonal"][$i]['id']?></td>
                         <td><?php echo  ucwords(strtolower($resultado["allpersonal"][$i]['nombre']))." ".ucwords(strtolower($resultado["allpersonal"][$i]['apellido']));?></td>
                         <td><?php echo $resultado["allpersonal"][$i]['ci'];?></td>
                         <?php if ($resultado["allpersonal"][$i]['ciudad']=="potosi") {?>
                              <?php if ($resultado["allpersonal"][$i]['id_caja']==0) {?>
                                   <td>Sin Caja</td>
                              <?php } else{?>
                                   <td><?php echo $resultado["allpersonal"][$i]['estado']==0 ? "Cajon R".$resultado["allpersonal"][$i]['id_caja'] : "Cajon ".$resultado["allpersonal"][$i]['id_caja'];?></td>
                              <?php }?>
                         <?php } else{?>
                              <?php if ($resultado["allpersonal"][$i]['id_caja']==0) {?>
                                   <td>Sin Caja</td>
                              <?php } else{?>
                                   <td><?php echo $resultado["allpersonal"][$i]['estado']==0 ? "Cajon N".$resultado["allpersonal"][$i]['id_caja'] : "Cajon M".$resultado["allpersonal"][$i]['id_caja'];?></td>
                              <?php }?>
                         <?php }?>
                    </tr>
               <?php } ?>
          </tbody>
     </table>
     <center><h3 style="margin-top:10px;color: #1cd2dc;font-weight: 700;">MODIFICAR PERSONA</h3></center>
     <form autocomplete="off" style="margin:10px 40px 10px 40px">
          <div class="form-group has-feedback has-success fila1_u" style="margin-bottom:20px">
            <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">NOMBRES</label>
            <input type="text" id="inputnombre_u" class="form-control" validate="false" toggle=".fila1_u" value="<?php echo $resultado['profile']['nombre'] ?>" placeholder="<?php echo $resultado['profile']['nombre'] ?>">
            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
          </div>
          <div class="form-group has-feedback has-success fila2_u" style="margin-bottom:20px">
            <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">APELLIDOS</label>
            <input type="text"  id="inputapellido_u" class="form-control" validate="false" toggle=".fila2_u" value="<?php echo $resultado['profile']['apellido'] ?>" placeholder="<?php echo $resultado['profile']['apellido'] ?>">
            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
          </div>
          <div class="form-group has-feedback has-success fila3_u" style="margin-bottom:20px">
            <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CÓDIGO DE PERSONA</label>
            <input type="text"  id="inputcodigo_u" class="form-control" validate="false" toggle=".fila3_u" value="<?php echo $resultado['profile']['codigo'] ?>" placeholder="<?php echo $resultado['profile']['codigo'] ?>">
            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
            <em style="color:#cf6666;display:none" id="error_update_codigo">El Código ya esta en uso!</em>
          </div>
          <div class="form-group has-feedback has-success fila4_u" style="margin-bottom:20px">
            <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CARNET DE IDENTIDAD</label>
            <input type="text"  id="inputci_u" class="form-control" validate="false" toggle=".fila4_u" value="<?php echo $resultado['profile']['ci'] ?>" placeholder="<?php echo $resultado['profile']['ci'] ?>">
            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
            <em style="color:#cf6666;display:none" id="error_update_ci">El Numero de CI ya esta en uso!</em>
          </div>
          <div class="form-group has-feedback has-error fila1_u">
          <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">NUEVA CONTRASEÑA</label>
               <input type="password" autocomplete="false" autocorrect="off" class="form-control" id="inputpassword_u" validate="false" name="password" placeholder="Minimo 5 caracteres" toggle=".fila1_u">
               <span toggle="#inputpassword_u" id="togglepassword_u" class="fa fa-fw fa-eye field-icon"></span>
          </div>
          <center>
               <button class="btn btn-success" style="margin:10px 0 18px 0px;width:100%" id="buttonupdate" type="button" disabled>Guardar</button>
          </center>
     </form>
     <?php if($session['tipo'] == 0){?>
          <center>
               <a onclick="altaAjax()"><button title="Backup de la Base de Datos" style="margin:20px;padding:5px;" class="btn btn-info btn-lg">Copia de Seguridad <i class="fa fa-hdd-o" ></i></button></a>
          </center>
     <?php } ?>
</div>
<?php include 'modalverpersonal.php';?>
<script>
    $(document).ready(function(){
          $('#inputsearch').focusout(function() {
               var outn=setInterval(function(){ $('#searchprincipal').hide();clearInterval(outn);}, 150);
          })
          $('#inputsearch').focusin(function() {
               $('#searchprincipal').show();
          })
         $('#inputsearch').keyup(function(){
              $('#searchprincipal').empty();
              var data=$(this).val().toLowerCase().trim();
              SEARCH_PERSON(data,"todos","No se encontraron coincidencias");
         });
         function SEARCH_PERSON(DATA,TABLE,MESSAGE){
              var tabla_tr = document.getElementById(TABLE).getElementsByTagName("tbody")[0].rows;
              var filas=[];
              for(var i=0; i<tabla_tr.length; i++){
                    var tr = tabla_tr[i];
                    var textotr = (tr.innerText).toLowerCase();
                    if(textotr.indexOf(DATA)>0){
                         filas.push(tabla_tr[i]);
                    }
                    //tr.className = (textotr.indexOf(DATA)>=0) ? "mostrar" : "ocultar";
              }
              for (var i = 0; i < filas.length; i++) {
                    var id=filas[i].getElementsByTagName('td')[0].innerHTML,
                   cod=filas[i].getElementsByTagName('td')[0].innerHTML,
                   nombres=filas[i].getElementsByTagName('td')[1].innerHTML,
                   cis=filas[i].getElementsByTagName('td')[2].innerHTML,
                   cajas=filas[i].getElementsByTagName('td')[3].innerHTML;
                   $('#searchprincipal').append('<a href="#" class="list-group-item" style"padding:5px;" data-target="#verpersonalModal" data-toggle="modal" onclick="verAjax('+id+')"><p style="font-size:1.3em;font-weight:600" class="list-group-item-text">'+nombres+'</p><p class="list-group-item-text"><strong>CI:</strong> '+cis+' <strong> Caja: </strong> '+cajas+' <strong> COD: </strong> '+cod+'</p></a>');
              }
         }
    })
    function verAjax(val){
         small_error(".fila4_u",false);$("#buttonupdate").attr('disabled', true);
         $.ajax({
              url: '/Personal/ver/'+val,
              type: 'get',
              success:function(obj){
                   var data = JSON.parse(obj);
                   $('.unombre h5').text(data.nombre+" "+data.apellido);$('.uci').text(data.ci);$('.unombre p').text("CODIGO:"+data.id);
                   $('.uaccess').text(data.access==1 ? ("Con Acceso al Sistema"):("Sin Acceso al Sistema"));
                   $('.uciudad').text(data.ciudad=="lapaz" ? ("La Paz"):("Potosí"));
                   if (data.ciudad=="lapaz") {
                        if (data.caja==null) {
                            $('.ucaja').text("Sin Caja");
                       }else{
                            $('.ucaja').text(data.estado==1 ? ("Caja M"+data.id_caja):("Caja N"+data.id_caja));
                       }
                   }else{
                        if (data.caja==null) {
   					$('.ucaja').text("Sin Caja");
   				}else{
   					$('.ucaja').text(data.estado==1 ? ("Cajon "+data.id_caja):("Cajon R"+data.id_caja));
   				}
                   }

                   $('.uestado').text(data.updated_at==null ? ("No Fue Modificado"):("Modificado el: "+data.updated_at));
                   $('.uusuario').text(data.updated_user==null ? ("No Fue Modificado"):("Modificado por: "+data.editor));
              }
         });
    }
    function altaAjax(val){
         swal({
              title: "¿Estás seguro?",
              text: "Esta Seguro que quiere Realizar una copia de seguridad de la BASE DE DATOS?",
              type: "warning",
              showCancelButton: true,confirmButtonColor: "#24be66",
              confirmButtonText: "Realizar Backup!",
              closeOnConfirm: false
         },function(){
              $.ajax({
                   url: '/Index/backup',
                   type: 'get',
                   success:function(obj){
                        swal("Mensaje de Alerta!", obj , "success");
                   }
              });
         });
    }
</script>
