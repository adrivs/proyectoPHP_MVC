<?php require APPROOT . '/views/repeat/header.php' ?>
			<a href="<?php echo URLROOT; ?>/travels" class="btn btn-light"><i class="fa fa-backward"></i> Volver</a>
			<div class="card card-body bg-light mt-5">
				<h2> Edita el recorrido </h2>
				<form action="<?php echo URLROOT ?>/travels/edit/<?php echo $data['id_viaje'] ?>" method='POST'>
					<div class="form-group">
						<label>Inicio: </label>
						<input required type="text" name="inicio" class="form-control" value="<?php echo $data['inicio'] ?>">
						<br />
						<label>Final: </label>
						<input required type="text" name="final" class="form-control" value="<?php echo $data['final'] ?>">
						<br />
						<label>Hora: </label>
						<input required type="time" name="hora" class="form-control" value="<?php echo $data['hora'] ?>">
						<br />
						<label>Asistentes: </label>
						<input required type="number" name="asistentes" class="form-control" value="<?php echo $data['asistentes'] ?>">
						<br />
						<label>Dia: </label>
						<input required type="date" name="dia" class="form-control" value="<?php echo $data['dia'] ?>">
						<br />
						<label>Descripción: </label>
						<input required type="text" name="descripcion" class="form-control" value="<?php echo $data['descripcion'] ?>">
						<br />
					</div>
					<input type="submit" class="btn btn-success" value="Finalizar">
				</form>
			</div>
<?php require APPROOT . '/views/repeat/footer.php' ?>
