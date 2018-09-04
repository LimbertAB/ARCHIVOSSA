<?php if($session['tipo'] == 0){?>
	<div class="fab" data-target="#newusuarioModal" data-toggle="modal"> + </div>
<?php }else{?>
	<script>window.location.href = "/Principal";</script>
<?php }?>
<div class="row">
	<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DE USUARIOS</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">TODOS<span class="badge" style="background:red;margin-left:10px;color:#fff"><?php echo count($resultado["usuarios"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:red;margin-left:10px"><?php echo count($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tableusers" class="table table-striped table-condensed table-hover">
						<thead>
							<th width="7%">n°</th>
							<th width="12%">codigo</th>
							<th width="30%">nombres</th>
							<th width="35%">apellidos</th>
							<th width="10%">ci</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php for ($i=0; $i < count($resultado["usuarios"]); $i++) {?>
								<tr>
									<td><h5><?php echo $i+1?></h5></td>
									<td><h5><?php echo $resultado["usuarios"][$i]['id_persona'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["usuarios"][$i]['nombre']));?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["usuarios"][$i]['apellido']));?></h5></td>
									<td><h5><?php echo $resultado["usuarios"][$i]['ci'];?></h5></td>
									<td>
										<?php if ($session['id'] != $resultado["usuarios"][$i]['id'] && $session['tipo']==0) {?>
											<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["usuarios"][$i]['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
											<a  onclick="bajaAjax(<?php echo $resultado["usuarios"][$i]['id'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
										<?php }else{?>
											<em style="color:#313131">Sin Acción</em>
										<?php }?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(count($resultado["usuarios"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron USUARIOS registrados.
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
							<th width="12%">codigo</th>
							<th width="30%">nombres</th>
							<th width="35%">apellidos</th>
							<th width="10%">ci</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php for ($i=0; $i < count($resultado["bajas"]); $i++) {?>
								<tr>
									<td><h5><?php echo $i+1?></h5></td>
									<td><h5><?php echo $resultado["bajas"][$i]['id_persona'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["bajas"][$i]['nombre']));?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo  ucwords(strtolower($resultado["bajas"][$i]['apellido']));?></h5></td>
									<td><h5><?php echo $resultado["bajas"][$i]['ci'];?></h5></td>
									<td>
										<?php if ($session['tipo']==0) {?>
											<a  onclick="altaAjax(<?php echo $resultado["bajas"][$i]['id'];?>)"><button title="dar de alta usuario" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>
										<?php }else{?>
											<em style="color:#313131">Sin Acción</em>
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
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron usuarios dados de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 	include 'modalnewusuario.php';
		include 'modalupdateusuario.php';?>
<script>
   	var id_lugar_u,id_cargo_u,id_user_u,psw_u,id_tipo_u;
    $(document).ready(function(){

		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableusers","No se encontraron USUARIOS registrados.");});

		$('#inputpassword,#inputpassword_u').keyup(function(){if($(this).val().trim().length>4){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){
			$.ajax({
				url: '/Usuario/crear',
				type: 'post',
				data:{password:$('#inputpassword').val(),id_persona:$('#selectpersona option:selected').val(),tipo:$('#selecttipo option:selected').val()},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/Usuario"; }, 2000);
				}}});
		});

		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('#selectpersona option').length>0)){
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if ($('.fila1_u').hasClass('has-success') || $('#inputpassword_u').val()=="") {
					if($('.fila1_u').hasClass('has-success') || $('#selecttipo_u option:selected').val()!=id_tipo_u) {
						$("#buttonupdate").attr('disabled', false);
					}else{
						$("#buttonupdate").attr('disabled', true);
					}
				}else{
					$("#buttonupdate").attr('disabled', true);
				}
			}
		}
		//UPDATE usuario
		$('#buttonupdate').click(function(){
			$.ajax({
				url: '/Usuario/editar/'+id_user_u,
				type: 'post',
				data:{
					password:$('#inputpassword_u').val(),
					tipo:$('#selecttipo_u option:selected').val()
				},
				success:function(obj){
					if (obj=="false") {
						$('#error_update').show();
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/Usuario"; }, 1500);
					}
				}
			});
		});
		$('#selecttipo_u').change(function(){function_validate("false");});
	});
	function updateAjax(val){
		$("#buttonupdate").attr('disabled', true);small_error(".fila1_u",false);
		$.ajax({
			url: '/Usuario/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('.unombre h5').html(data.nombre+"<br>"+data.apellido);$('.uci').text(data.ci);
				$('#selecttipo_u option[value='+data.tipo+']').attr('selected','selected');
				$("#selecttipo_u").selectpicker('refresh');
				id_user_u=data.id;id_tipo_u=data.tipo;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de baja al Usuario?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Dar de Baja!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '/Usuario/eliminar/'+val,
				type: 'get',
				success:function(obj){
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/Usuario"; }, 1000);
				}
			});
		});
	}
	function altaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de alta al Usuario?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#24be66",
			confirmButtonText: "Dar de Alta!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '/Usuario/alta/'+val,
				type: 'get',
				success:function(obj){
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/Usuario"; }, 1000);
				}
			});
		});
	}
</script>
