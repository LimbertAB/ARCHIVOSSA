<div class="modal fade" id="updatepersonalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding-top:0;padding-bottom:0;z-index:20">
				<div class="row">
	                   	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 5px;z-index:100;position:absolute"><span aria-hidden="true">&times;</span></button>
	                   	<div class="col-md-4" height="100%" style="margin:0px;background:#0c2544;padding-top:15px;padding-left: 0;padding-right: 2px;z-index:-50;height: 490px;">
	                       	<img src="<?php echo URL;?>public/images/icons/64/engineer.png" alt="profile" class="center-block"  style="padding:10px;margin-top:0px">
	                       	<center class="unombre">
	                           	<h5  style="color: #f2fafd;margin-top:0;margin-bottom:0px;text-transform:uppercase;z-index:900"></h5>
							<p style="margin-bottom:15px;color:#bac746;font-weight: 700;">CODIGO:433</p>
						</center>
	                       	<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/big-id-card.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uci" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/key.png"  style="padding:15px 0 5px 0;margin-top:0px">
		                         <br><p class="uaccess" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/status.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uestado" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/manager.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uusuario" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
	                   	</div>
	                   	<div class="col-md-8">
	                       	<center><h3 style="margin-top:15px;color: #1cd2dc;font-weight: 700;">MODIFICAR PERSONA</h3></center>
					   	<form autocomplete="off">
	                            	<div class="form-group has-feedback has-success fila1_u" style="margin-bottom:20px">
	                                <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">NOMBRES</label>
	                                <input type="text" id="inputnombre_u" class="form-control" validate="false" toggle=".fila1_u">
	                                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
	                            	</div>
	                            	<div class="form-group has-feedback has-success fila2_u" style="margin-bottom:20px">
	                                <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">APELLIDOS</label>
	                                <input type="text"  id="inputapellido_u" class="form-control" validate="false" toggle=".fila2_u">
	                                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							</div>
							<div class="form-group has-feedback has-success fila3_u" style="margin-bottom:20px">
	                                <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CÓDIGO DE PERSONA</label>
	                                <input type="text"  id="inputcodigo_u" class="form-control" validate="false" toggle=".fila3_u">
	                                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							  <em style="color:#cf6666;display:none" id="error_update_codigo">El Código ya esta en uso!</em>
							</div>
							<div class="form-group has-feedback has-success fila4_u" style="margin-bottom:20px">
	                                <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CARNET DE IDENTIDAD</label>
	                                <input type="text"  id="inputci_u" class="form-control" validate="false" toggle=".fila4_u">
	                                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							  <em style="color:#cf6666;display:none" id="error_update_ci">El Numero de CI ya esta en uso!</em>
							</div>
							<div class="form-group rowcajahabilitada" style="margin-bottom:20px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CAJA</label>
								<div class="input-group">
								<select id="selectcaja_u" class="form-control selectpicker show-tick" data-live-search="true">
									<option value="0">Sin Caja</option>
									<?php for ($i=0; $i < count($resultado["cajas"]); $i++) {?>
										<option value="<?php echo $resultado["cajas"][$i]['id'];?>"><?php echo ucwords(strtolower($resultado["cajas"][$i]['nombre']."  ".$resultado["cajas"][$i]['id']))?></option>
									<?php } ?>
		                      		</select>
								<span class="input-group-addon glyphicon glyphicon-inbox"></span>
                                        </div>
	                            	</div>
							<div class="form-group rowcajaretirada" style="margin-bottom:20px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CAJA</label>
								<div class="input-group">
								<select id="selectcajaretirado_u" class="form-control selectpicker show-tick" data-live-search="true">
									<option value="0">Sin Caja</option>
									<?php for ($i=0; $i < count($resultado["cajasretirados"]); $i++) {?>
										<option value="<?php echo $resultado["cajasretirados"][$i]['id'];?>"><?php echo ucwords(strtolower($resultado["cajasretirados"][$i]['nombre']."  ".$resultado["cajasretirados"][$i]['id']))?></option>
									<?php } ?>
		                      		</select>
								<span class="input-group-addon glyphicon glyphicon-inbox"></span>
                                        </div>
	                            	</div>
	                            	<center>
	                                	<button class="btn btn-success" style="margin:10px 0 18px 0px" id="buttonupdate" type="button" disabled>Guardar</button>
	                            	</center>
						</form>
	                   	</div>
				</div>
               </div>
		</div>
	</div>
</div>
