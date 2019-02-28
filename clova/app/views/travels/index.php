<?php require APPROOT . '/views/repeat/header.php' ?>
<?php flash('travel_added');?>
	<div class="row">
		<div class="col-md-6">
			<h1>Tus recorridos</h1>
			<br />
		</div>
		<div class="col-md-6">
			<a href="<?php echo URLROOT; ?>/travels/add" class="btn btn-primary pull-right">Añadir recorrido</a>
		</div>
	</div>
	<?php foreach($data['travels'] as $travel) : ?>
		<?php 
			$comienzo = $travel->inicio;
			$fin = $travel->final;

			$urlComienzo = "http://www.mapquestapi.com/geocoding/v1/address?key=nKjvQkPyGxAbuIMRBxEBGkYqPEW4PtHy&location=$comienzo";
			$urlFin= "http://www.mapquestapi.com/geocoding/v1/address?key=nKjvQkPyGxAbuIMRBxEBGkYqPEW4PtHy&location=$fin";
			$jsonComienzo = file_get_contents($urlComienzo);
			$jsonFin = file_get_contents($urlFin);
			$arrayComienzo = json_decode($jsonComienzo, true);
			$arrayFin = json_decode($jsonFin, true);
			$resComienzo = $arrayComienzo["results"][0]["locations"][0]["latLng"];
			$resFin = $arrayFin["results"][0]["locations"][0]["latLng"];

			$xComienzo = $resComienzo["lat"];
			$yComienzo = $resComienzo["lng"];

			$xFin = $resFin["lat"];
			$yFin = $resFin["lng"];
		?>
		<div class="card card-body mb-3">
			<div class="row">
				<div class="col-md-6">
						<div class="row">
							<br/>
						<div class="col-md-3">
						<h5>
						Inicio 
						</h5>
							<span><?php echo $travel->inicio; ?> </span>
						</div>
						<div class="col-md-3">
						<h5>
						Final 
						</h5>
							<span><?php echo $travel->final; ?> </span>
						</div>
					</div><br />
					<div class="row">
						<div class="col-md-3">
						<h5>
						Hora 
						</h5>
							<span><?php echo $travel->hora; ?> </span>
						</div>
						<div class="col-md-3">
						<h5>
						Asistentes 
						</h5>
							<span>0/<?php echo $travel->asistentes; ?> </span>
						</div>
					</div><br />
					<div class="row">
						<div class="col-md-3">
						<h5>
						Dia
						</h5>
							<span><?php echo $travel->dia; ?> </span>
						</div>
						<div class="col-md-8">
						<h5>
						Descripción
						</h5>
							<span><?php echo $travel->descripcion; ?> </span>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-3">
							<a href="<?php echo URLROOT; ?>/travels/edit/<?php echo $travel->id_viaje?>" class="btn btn-dark btn-sm"><span style="color: white;">Editar</span> </a>
						</div>
						<div class="col-md-3">
							<form action="<?php echo URLROOT; ?>/travels/delete/<?php echo $travel->id_viaje?>" method="post">
								<input type="submit" value="Borrar" class="btn btn-danger btn-sm">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div id='<?php echo 'map'.$travel->id_viaje ?>' style='width: 500px; height: 300px;'></div>
					<script>
						mapboxgl.accessToken = 'pk.eyJ1IjoiYWRyaXZzIiwiYSI6ImNqbnVmMmJqYjB2cnozcHM1Y2o4dHc4Z3QifQ.FibwG1DRrJ2LTDQfAcy99A';
							var map = new mapboxgl.Map({
							container: '<?php echo 'map'.$travel->id_viaje ?>',
							style: 'mapbox://styles/mapbox/streets-v11',
							center: [<?php echo "$yComienzo,$xComienzo" ?>],
    						zoom: 10
						});

							 var geojson = {
							  type: 'FeatureCollection',
							  features: [{
							    type: 'Feature',
							    geometry: {
							      type: 'Point',
							      coordinates: [<?php echo "$yComienzo,$xComienzo" ?>]
							    },
							    properties: {
							      title: 'Mapbox',
							      description: 'Washington, D.C.'
							    }
							  },
							  {
							    type: 'Feature',
							    geometry: {
							      type: 'Point',
							      coordinates: [<?php echo "$yFin,$xFin" ?>]
							    },
							    properties: {
							      title: 'Mapbox',
							      description: 'San Francisco, California'
							    }
							  }]
							  }; 
							  
							// add markers to map
							geojson.features.forEach(function(marker) {
							// create a HTML element for each feature
							var el = document.createElement('div');
							el.className = 'marker';
							// make a marker for each feature and add to the map
							new mapboxgl.Marker(el)
								.setLngLat(marker.geometry.coordinates)
								.addTo(<?php echo 'map'.$travel->id_viaje ?>);
							});
					</script>
				</div>
			</div>
		</div>
	<?php endforeach;?>
<?php require APPROOT . '/views/repeat/footer.php'?>
