<?php require APPROOT . '/views/repeat/header.php' ?>
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body bg-light mt-5">
				<h2> Únete como guía </h2>
				<form action="<?php echo URLROOT ?>/users/register" method='POST'>
					<div class="form-group">
						<label>Nombre: <sup>*</sup></label>
						<input type="text" name="nombre" class="form-control <?php echo (!empty($data['nombre_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['nombre']; ?>">
						<span class="invalid-feedback"><?php echo $data['nombre_error']; ?></span>
						<br />
						<label>Apellidos: <sup>*</sup></label>
						<input type="text" name="apellidos" class="form-control <?php echo (!empty($data['apellidos_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['apellidos']; ?>">
						<span class="invalid-feedback"><?php echo $data['apellidos_error']; ?></span>
						<br />
						<label>Email: <sup>*</sup></label>
						<input type="text" name="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['email']; ?>">
						<span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
						<br />
						<label>Contraseña: <sup>*</sup></label>
						<input type="password" name="contrasena" class="form-control <?php echo (!empty($data['contrasena_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['contrasena']; ?>">
						<span class="invalid-feedback"><?php echo $data['contrasena_error']; ?></span>
						<br />
						<label>Repite contraseña: <sup>*</sup></label>
						<input type="password" name="confirm_contrasena" class="form-control <?php echo (!empty($data['confirm_contrasena_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['confirm_contrasena']; ?>">
						<span class="invalid-feedback"><?php echo $data['confirm_contrasena_error']; ?></span>
						<br />
						<div class="row">
							<div class="col">
								<input type="submit" class="btn btn-success btn-block" value="Crear cuenta">
							</div>
							<div class="col">
								<a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">¿Tienes cuenta? Inicia sesión </a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
<?php require APPROOT . '/views/repeat/footer.php' ?>
