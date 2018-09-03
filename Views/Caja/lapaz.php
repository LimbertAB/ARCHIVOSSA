<?php if($session['tipo'] == 0){?>
	<div class="fab" data-target="#newcajalapazModal" data-toggle="modal"> + </div>
<?php } ?>
<div class="row">
		<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DEL CAJAS DE LA CIUDAD DE LA PAZ</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" estado="cajalapaz" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">ACTIVOS<span class="badge" style="background:red;margin-left:10px;color:#fff"><?php echo count($resultado["cajas"]);?></span></a></li>
	               <li role="presentation" estado="cajalapazretirado"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">RETIRADOS<span class="badge" style="background:red;margin-left:10px"><?php echo count($resultado["cajasretirados"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<?php for ($i=0; $i <count($resultado["cajas"]); $i++) {?>
					<?php $i%2==0 ? $color="#0d8990": $color="#484848";?>
						<div class="col-md-4 col-sm-6 col-xs-12 col-lg-3" type="button"  data-target="#updatecajaModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["cajas"][$i]['id'];?>,'cajalapaz')" style="border:2px solid #fff;cursor:pointer;background:<?php echo $color;?>">
							<div class="col-md-4 col-sm-4 col-xs-4" style="padding:0;margin:0">
								<img style="margin:20px 0 15px 0;padding:0" src="<?php echo URL;?>public/images/icons/64/box1.png">
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8" style="padding:0;margin:0">
								<h5 class="panel-title" style="color:#fff;font-size:1.3em;font-weight:200;margin:6px 0 0 5px"><?php echo $resultado["cajas"][$i]['nombre']." ".$resultado["cajas"][$i]['id']; ?></h5>
								<h1 style="color:#fff;margin:0 0 0px 5px;font-size:3em;font-weight:600"><?php echo $resultado["cajas"][$i]['personal'][0]['total'] ?></h1>
								<small style="font-size:1em;color:#dddddd">(personas)</small>
							</div>
						</div>
				<?php } ?>
			</div>
	          <div id="baja" role="tabpanel" class="tab-pane">
				<?php for ($i=0; $i <count($resultado["cajasretirados"]); $i++) {?>
					<?php $i%2==0 ? $color="#bd673e": $color="#484848";?>
						<div class="col-md-4 col-sm-6 col-xs-12 col-lg-3" type="button"  data-target="#updatecajaModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado["cajasretirados"][$i]['id'];?>,'cajalapazretirado')" style="border:2px solid #fff;cursor:pointer;background:<?php echo $color;?>">
							<div class="col-md-4 col-sm-4 col-xs-4" style="padding:0;margin:0">
								<img style="margin:20px 0 15px 0;padding:0" src="<?php echo URL;?>public/images/icons/64/box1.png">
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8" style="padding:0;margin:0">
								<h5 class="panel-title" style="color:#fff;font-size:1.3em;font-weight:200;margin:6px 0 0 5px"><?php echo $resultado["cajasretirados"][$i]['nombre']." ".$resultado["cajasretirados"][$i]['id']; ?></h5>
								<h1 style="color:#fff;margin:0 0 0px 5px;font-size:3em;font-weight:600"><?php echo $resultado["cajasretirados"][$i]['personal'][0]['total'] ?></h1>
								<small style="font-size:1em;color:#dddddd">(personas)</small>
							</div>
						</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php 	include 'modalnewcajalapaz.php';
		include 'modalupdatecaja.php';?>
<script>
	var id_caja_p,table_p;
    $(document).ready(function(){
		$('#btnregistrar').click(function(){$.ajax({url: '/Caja/crear',type: 'post',data:{tabla:$('#selectcaja option:selected').val()=="Caja M" ? ("cajalapaz"):("cajalapazretirado"),nombre:$('#selectcaja option:selected').val()},success:function(obj){if (obj=="false") {$('#error_registro').show();}else{swal("Mensaje de Alerta!", obj , "success");setInterval(function(){ window.location.href = "/Caja/lapaz"; }, 1000);}}});});
	});
	function updateAjax(val,table){
		table_p=table;
		$("#alert_empty").hide();$('#tablecaja').empty();
		$.ajax({
			url: '/Caja/verlapaz/exec?tabla='+table+"&id_caja="+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('.unombre h5').html(data.nombre+" "+data.id);$('.ucantidad').text("Personas: "+data.personal.length);$('.uestado').text(data.estado==1 ? ("Activo"):("Inactivo"));

				if (data.personal.length>0) {
					for (var i = 0; i < data.personal.length; i++) {
						$('#tablecaja').append('<tr><td style="text-align:left;padding-left:10px">'+parseInt(i+1)+'. '+data.personal[i].nombre+' '+data.personal[i].apellido+'</td></tr>');
					}
				}else {
					$("#alert_empty").show();
				}
				id_caja_p=data.id;
			}
		});
	}
	function pdfclick(){
	     window.open('/Caja/printpdf/exec?tabla='+table_p+'&id_caja='+id_caja_p, '_blank');
	}
	function bajaAjax(){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere eliminar la CAJA?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Eliminar Ahora!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '/Caja/eliminar/'+id_caja_p+'?tabla='+$("#myTabs li[class='active']").attr("estado"),
				type: 'get',
				success:function(obj){
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/Caja/lapaz"; }, 1000);
				}
			});
		});
	}
</script>
