<?php include "header.php"; ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Agregar paciente</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="../controller/paciente.controller.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre(s) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtnombre" id="txtnombre" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellidos<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtapellidos" id="txtapellidos" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento<span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtfecnacimiento" id="txtfecnacimiento" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="txtemail" id="txtemail">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Sexo: </label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="txtsexo" id="txtsexo" class="form-check-input" value="Masculino" required>Masculino
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="txtsexo" id="txtsexo" class="form-check-input" value="Femenino" required>Femenino
											</label>
										</div>
									</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>DNI <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtdni" id="txtdni" required>
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Direccion</label>
												<input type="text" class="form-control" name="txtdireccion" id="txtdireccion">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Provincia</label>
												<input type="text" class="form-control" name="txtprovincia" id="txtprovincia">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Distrito</label>
												<input type="text" class="form-control" name="txtdistrito" id="txtdistrito">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label>Ciudad/Localidad<span class="text-danger">*</span></label>
												<input type="text" class="form-control"  name="txtciudad" id="txtciudad" required="required">
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input class="form-control" type="text" name="txttelefono" id="txttelefono" required>
                                    </div>
                                </div>

                                <input type="hidden" name="foto" id="foto" value="./assets/img/user.jpg">
                                
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn" name="btnCrear" id="btnCrear">Crear paciente</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php include "footer.html"; ?>