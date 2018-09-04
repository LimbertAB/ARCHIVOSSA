<div class="modal fade" id="vercajaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding-top:0;padding-bottom:0;z-index:20">
				<div class="row">
	                   	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 20px;top:15px;z-index:100;position:absolute"><span aria-hidden="true">&times;</span></button>
	                   	<div class="col-md-4" height="100%" style="margin:0px;background:#0c2544;padding-top:15px;padding-left: 0;padding-right: 2px;z-index:-50;height: 490px;">
	                       	<img src="<?php echo URL;?>public/images/icons/64/box5.png" alt="profile" class="center-block"  style="padding:10px;margin-top:0px">
	                       	<center class="unombre">
	                           	<h5  style="color: #f2fafd;margin-top:0;margin-bottom:0px;text-transform:uppercase;z-index:900"></h5>
							<p style="margin-bottom:15px;color:#bac746;font-weight: 700;">CODIGO:433</p>
						</center>
	                       	<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/team.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="ucantidad" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/status.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uestado" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">Activo</p>
	                       	</center>
	                   	</div>
	                   	<div class="col-md-8" style="overflow-y: auto;max-height:490px" >
	                       	<center><h3 style="margin-top:15px;color: #1cd2dc;font-weight: 700;">LISTA DE PERSONAS</h3></center>
						<table class="table  table-bordered" id="tablecaja">
						</table>
						<div class="row" id="alert_empty_caja"> <!-- SECTION EMPTY TABLE -->
						<div class="col-md-12">
							<div class="alert alert-error" role="alert">
								<strong>MENSAJE DE ALERTA!</strong> No se encontró persona en esta CAJA.
							</div>
						</div>
	                   	</div>
				</div>
               </div>
			<div class="modal-footer" style="padding:5px 0 5px 0">
				<input type="button" value="Reporte PDF" class="btn btn-sm btn-info" onclick="pdfclick()">
			</div>
		</div>
	</div>
</div>
