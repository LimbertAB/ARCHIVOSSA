<div class="modal fade" id="newpersonalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#3fd2e0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff">REGISTRO DE NUEVO CHOFER</h4>
			</div>
			<div class="modal-body" style="margin:10px 40px 10px 40px">
				<form  class="form-horizontal" autocomplete="off">
					<div class="form-group  has-feedback has-error fila1">
						<label>Nombres</label>
						<input type="text" id="inputnombre" class="form-control" placeholder="Ejemplo: Pedro" validate=true toggle=".fila1">
						<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
					</div>
					<div class="form-group  has-feedback has-error fila2">
						<label>Apellidos</label>
						<input type="text"  id="inputapellido" class="form-control" placeholder="Ejemplo: Ticra Mamani" validate=true toggle=".fila2">
						<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					</div>
					<div class="form-group  has-feedback has-error fila3">
						<label>Código Persona</label>
						<input type="text" id="inputcodigo" required class="form-control" placeholder="Ejemplo: 422" validate=true toggle=".fila3">
						<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
						<em style="color:#cf6666;display:none" id="error_registro_codigo">El Código ya esta en uso!</em>
					</div>
					<div class="form-group  has-feedback has-error fila4">
						<label>Carnet de Identidad</label>
						<input type="text" id="inputci" required class="form-control" placeholder="Ejemplo: 5570422" validate=true toggle=".fila4">
						<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
						<em style="color:#cf6666;display:none" id="error_registro_ci">El Numero de CI ya esta en uso!</em>
					</div>
					<div class="form-group inputrow1">
						<label>Caja</label>
						<select id="selectcaja" class="form-control selectpicker show-tick" data-live-search="true">
							<option value="0">Sin Caja</option>
							<?php for ($i=0; $i < count($resultado["cajas"]); $i++) {?>
								<option value="<?php echo $resultado["cajas"][$i]['id'];?>"><?php echo ucwords(strtolower($resultado["cajas"][$i]['nombre']."  ".$resultado["cajas"][$i]['id']))?></option>
							<?php } ?>
                      		</select>
					</div>
					<center>
						<button class="btn btn-warning btn-lg" type="button" style="margin-bottom:15px" id="btnregistrar" disabled>REGISTRAR</button>
					</center>
				</form>
			</div>
		</div>
	</div>
</div>
