<?php require APPROOT . '/views/repeat/header.php' ?>
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body bg-light mt-5">
				<?php flash('register_success'); ?>
				<h2> Iniciar sesión </h2>
				<form action="<?php echo URLROOT ?>/users/login" method='POST'>
					<div class="form-group">
						<label>Email: <sup>*</sup></label>
						<input type="text" name="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['email'] ?>">
						<span class="invalid-feedback"><?php echo $data['email_error'] ?></span>
						<br />
						<label>Contraseña: <sup>*</sup></label>
						<input type="password" name="contrasena" class="form-control <?php echo (!empty($data['contrasena_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['contrasena'] ?>">
						<span class="invalid-feedback"><?php echo $data['contrasena_error'] ?></span>
						<br />
						<div class="row">
							<div class="col">
								<input type="submit" class="btn btn-success btn-block" value="Entrar">
							</div>
							<div class="col">
								<a href="<?php echo URLROOT; ?>/users/register" class="btn btn-md btn-light btn-block">¿Sin cuenta? Regístrate </a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
<?php require APPROOT . '/views/repeat/footer.php' ?>
