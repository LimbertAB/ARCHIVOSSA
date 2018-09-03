<?php if($session['tipo'] == 0){?>
	<div class="fab" data-target="#newpersonalModal" data-toggle="modal"> + </div>
<?php } ?>
<div class="row">
		<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DEL PERSONAL DE LA PAZ</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">ACTIVOS<span class="badge" style="background:red;margin-left:10px;color:#fff"><?php echo count($resultado["personal"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">RETIRADOS<span class="badge" style="background:red;margin-left:10px"><?php echo count($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tablepersonal" class="table table-striped table-condensed table-hover">
						<thead>
							<th width="7%">n°</th>
							<th width="10%">codigo</th>
							<th width="25%">nombres</th>
							<th width="30%">apellidos</th>
							<th width="8%">ci</th>
							<th width="10%">caja</th>
							<th width="10%">Opciones</th>
						</thead>
						<tbody>
							<?php for ($i=0; $i < count($resultado["personal"]); $i++) {?>
								<tr>
									<td><h5><?php echo $i+1?></h5></td>
									<td><h5><?php echo $resultado["personal"][$i]['codigo'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["personal"][$i]['nombre']));?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["personal"][$i]['apellido']));?></h5></td>
									<td><h5><?php echo $resultado["personal"][$i]['ci'];?></h5></td>
									<td><h5 style="color:#e00909"><?php echo ($resultado["personal"][$i]['caja']) == "" ? "Sin Caja" : $resultado["personal"][$i]['caja']." ".$resultado["personal"][$i]['id_caja'];?></h5></td>
									<td>
										<?php if($session['tipo'] == 0){?>
											<a data-target="#updatepersonalModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["personal"][$i]['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
											<a data-target="#retirarpersonalModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["personal"][$i]['id'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
										<?php } else{?>
											<a data-target="#verpersonalModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["personal"][$i]['id'];?>)"><button title="ver personal" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></a>
										<?php }?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(count($resultado["personal"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontró PERSONAL registrado.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="baja" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="7%">n°</th>
							<th width="10%">codigo</th>
							<th width="25%">nombres</th>
							<th width="30%">apellidos</th>
							<th width="8%">ci</th>
							<th width="10%">caja</th>
							<th width="10%">Opciones</th>
						</thead>
						<tbody>
							<?php for ($i=0; $i < count($resultado["bajas"]); $i++) {?>
								<tr>
									<td><h5><?php echo $i+1?></h5></td>
									<td><h5><?php echo $resultado["bajas"][$i]['codigo'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["bajas"][$i]['nombre']));?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["bajas"][$i]['apellido']));?></h5></td>
									<td><h5><?php echo $resultado["bajas"][$i]['ci'];?></h5></td>
									<td><h5> <?php echo $resultado["bajas"][$i]['caja']== "" ? "Sin Caja" :$resultado["bajas"][$i]['caja']." ".$resultado["bajas"][$i]['id_caja'];?></h5></td>
									<td>
										<?php if($session['tipo'] == 0){?>
											<a data-target="#updatepersonalModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["bajas"][$i]['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
											<a data-target="#habilitarpersonalModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["bajas"][$i]['id'];?>)"><button title="habilitar personal" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>
										<?php } else{?>
											<a data-target="#verpersonalModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["bajas"][$i]['id'];?>)"><button title="ver personal" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></a>
										<?php }?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(count($resultado["bajas"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontro Personal dado de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 	include 'modalnewpersonal.php';include 'modalverpersonal.php';
		include 'modalupdatepersonal.php';include 'modalretirarpersonal.php';include 'modalhabilitarpersonal.php';?>
<script>
   	var id_caja_u,id_personal_u,estado_u;
    $(document).ready(function(){

		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tablepersonal","No se encontraron Coincidencias de información del PERSONAL.");});

		$('#inputnombre,#inputnombre_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>3){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputapellido,#inputapellido_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>5){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputci,#inputci_u').keypress(function(e){yes_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputcodigo,#inputcodigo_u').keypress(function(e){yes_number(e);}).keyup(function(){if(parseInt($(this).val().trim())>0){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){$.ajax({url: '/Personal/crear',type: 'post',data:{nombre:$('#inputnombre').val(),apellido:$('#inputapellido').val(),codigo:$('#inputcodigo').val(),ci:$('#inputci').val(),id_caja:$('#selectcaja option:selected').val(),ciudad:"lapaz"},
		success:function(obj){
			$('#error_registro_codigo,#error_registro_ci').hide();
			if (obj=="ci") {
				$('#error_registro_ci').show();
			}else{
				if (obj=="codigo") {
					$('#error_registro_codigo').show();
				}else{
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/Personal/lapaz"; }, 1000);
				}
			}}});});

		$('#buttonretirar').click(function(){$.ajax({url: '/Personal/eliminar/'+id_personal_u,type: 'post',data:{id_caja:$('#selectretirar option:selected').val()},success:function(obj){if (obj=="false") {$('#error_registro').show();}else{swal("Mensaje de Alerta!", obj , "success");setInterval(function(){ window.location.href = "/Personal"; }, 1500);}}});});
		$('#buttonhabilitar').click(function(){$.ajax({url: '/Personal/alta/'+id_personal_u,type: 'post',data:{id_caja:$('#selecthabilitar option:selected').val()},success:function(obj){if (obj=="false") {$('#error_registro').show();}else{swal("Mensaje de Alerta!", obj , "success");setInterval(function(){ window.location.href = "/Personal"; }, 1500);}}});});

		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))&&($('.fila3').hasClass('has-success'))&&($('.fila4').hasClass('has-success'))) {
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success') && $('.fila3_u').hasClass('has-success') && $('.fila4_u').hasClass('has-success')){
					if(($('#inputnombre_u').attr('placeholder')!=$('#inputnombre_u').val().trim().toLowerCase()) ||
						($('#inputapellido_u').attr('placeholder')!=$('#inputapellido_u').val().trim().toLowerCase()) ||
						($('#inputci_u').attr('placeholder')!=$('#inputci_u').val()) ||
						($('#inputcodigo_u').attr('placeholder')!=$('#inputcodigo_u').val())
					){
						$("#buttonupdate").attr('disabled', false);
					}else{
						if (estado_u==0) {
							if($('#selectcajaretirado_u option:selected').val()!=id_caja_u){
								$("#buttonupdate").attr('disabled', false);
							}else{
								$("#buttonupdate").attr('disabled', true);
							}
						}else{
							if($('#selectcaja_u option:selected').val()!=id_caja_u){
								$("#buttonupdate").attr('disabled', false);
							}else{
								$("#buttonupdate").attr('disabled', true);
							}
						}
					}
				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		$('#buttonupdate').click(function(){
			var ciactual="";if($('#inputci_u').attr('placeholder')!=$('#inputci_u').val()){ciactual=$('#inputci_u').val();} //ver si cambio ci
			var codigoactual="";if($('#inputcodigo_u').attr('placeholder')!=$('#inputcodigo_u').val()){codigoactual=$('#inputcodigo_u').val();} //ver si cambio codigo
			var id_cajau;if (estado_u==0) {id_cajau=$('#selectcajaretirado_u option:selected').val();}else{id_cajau=$('#selectcaja_u option:selected').val();} //obtener idcaja
			$.ajax({
				url: '/Personal/editar/'+id_personal_u,
				type: 'post',
				data:{nombre:$('#inputnombre_u').val(),apellido:$('#inputapellido_u').val(),codigo:codigoactual,ci:ciactual,id_caja:id_cajau},
				success:function(obj){
					$('#error_update_codigo,#error_update_ci').hide();
					if (obj=="ci") {
						$('#error_update_ci').show();
					}else{
						if (obj=="codigo") {
							$('#error_update_codigo').show();
						}else{
							swal("Mensaje de Alerta!", obj , "success");
							setInterval(function(){ window.location.href = "/Personal/lapaz"; }, 1000);
						}
					}
				}
			});
		});
          $('#selectcaja_u').change(function(){function_validate("false");});
	     $('#selectcajaretirado_u').change(function(){function_validate("false");});
	     $('#selecthabilitar').change(function(){$("#buttonhabilitar").attr('disabled', false);});
	     $('#selectretirar').change(function(){$("#buttonretirar").attr('disabled', false);});
	});
	function updateAjax(val){
		small_error(".fila1_u",true);small_error(".fila2_u",true);small_error(".fila3_u",true);small_error(".fila4_u",true);$("#buttonupdate").attr('disabled', true);
		$.ajax({
			url: '/Personal/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				console.log(data);
				$('.unombre h5').html(data.nombre+"<br>"+data.apellido);$('.uci').text(data.ci);$('.unombre p').text("CODIGO:"+data.codigo);
				$('.uaccess').text(data.access==1 ? ("Con Acceso al Sistema"):("Sin Acceso al Sistema"));
				$('.uciudad').text("La Paz");
				if (data.caja==null) {
					$('.ucaja').text("Sin Caja");
				}else{
					$('.ucaja').text(data.estado==1 ? ("Caja M"+data.id_caja):("Caja N"+data.id_caja));
				}
				$('.uestado').text(data.updated_at==null ? ("No Fue Modificado"):("Modificado el: "+data.updated_at));
				$('.uusuario').text(data.updated_user==null ? ("No Fue Modificado"):("Modificado por: "+data.editor));
				$('#inputnombre_u').val(data.nombre.toLowerCase());$('#inputnombre_u').attr('placeholder',data.nombre.toLowerCase());
				$('#inputapellido_u').val(data.apellido.toLowerCase());$('#inputapellido_u').attr('placeholder',data.apellido.toLowerCase());
				$('#inputcodigo_u').val(data.codigo);$('#inputcodigo_u').attr('placeholder',data.codigo);
				$('#inputci_u').val(data.ci);$('#inputci_u').attr('placeholder',data.ci);
				if (data.estado==1) {
					$('.rowcajahabilitada').show();$('.rowcajaretirada').hide();
					$('#selectcaja_u option[value='+data.id_caja+']').attr('selected','selected');
					$("#selectcaja_u").selectpicker('refresh');

				}else{
					$('.rowcajahabilitada').hide();$('.rowcajaretirada').show();
					$('#selectcajaretirado_u option[value='+data.id_caja+']').attr('selected','selected');
					$("#selectcajaretirado_u").selectpicker('refresh');
				}

				$("#selectcaja_u").selectpicker('refresh');
				id_caja_u=data.id_caja;id_personal_u=data.id,estado_u=data.estado;
			}
		});
	}

</script>
