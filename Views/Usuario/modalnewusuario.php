<div class="modal fade" id="newusuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#3fd2e0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff">REGISTRO DE NUEVO USUARIO</h4>
			</div>
			<div class="modal-body" style="margin:0;padding:0">
				<form  class="form-horizontal" autocomplete="off">
					<div class="row"  style="margin-left:40px;margin-right:40px;margin-top:25px;margin-bottom:25px">
						<div class="form-group">
							<label class="col-sm-2 control-label">Persona</label>
							<div class="col-sm-10">
								<select id="selecttipo" class="form-control selectpicker show-tick">
									<option value=1>Usuario</option>
									<option value=1>Administrador</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Persona</label>
							<div class="col-sm-10">
								<select id="selectpersona" class="form-control selectpicker show-tick" data-live-search="true">
									<?php for ($i=0; $i < count($resultado["personas"]); $i++) {?>
										<option value="<?php echo $resultado["personas"][$i]['id'];?>"  data-subtext="<?php echo $resultado["personas"][$i]['ci'];?>"><?php echo ucwords(strtolower($resultado["personas"][$i]['nombre']))." ".ucwords(strtolower($resultado["personas"][$i]['apellido']));?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group has-feedback has-error fila1">
							<label class="col-sm-2 control-label">Contraseña</label>
							<div class="col-sm-10">
								<input type="password" id="inputpassword" autocomplete="false" class="form-control" placeholder="Minimo 5 caracteres" validate="true"  toggle=".fila1">
								<span toggle="#inputpassword" id="togglepassword" class="fa fa-fw fa-eye field-icon"></span>
							</div>
						</div>
						<center>
							<button class="btn btn-warning btn-lg" type="button" style="margin-bottom:15px" id="btnregistrar" disabled>REGISTRAR</button>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
