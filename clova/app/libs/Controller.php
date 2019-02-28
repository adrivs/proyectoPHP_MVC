<?php

	// Controlador principal. Carga los modelos y las vistas

	class Controller {
		// Modelo
		public function model($model){
			// Requiere el archivo del modelo
			require_once '../app/models/' . $model . '.php';
			// Instancia el modelo
			return new $model();
		}

		//Vista
		public function view($view, $data = []){
			// Mira si la vista existe
			if(file_exists('../app/views/' . $view . '.php')){
				require_once '../app/views/' . $view . '.php';
			} else {
				// Si la vista no existe
				die('E R R O R - Contacta con el admin del sitio web.');
			}
		}
	}