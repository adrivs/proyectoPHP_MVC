<?php

	// Crea URL y carga los controladores
	//  --     /controlador/metodo/parametros     -- 

	class Core {
		protected $controladorActual = 'Pages';
		protected $metodoActual = 'index';
		protected $params = [];

		public function __construct(){
			//print_r($this->getUrl());
			$url = $this->getUrl();

			// Mirar en los controladores para el primer valor de la url (que es el controlador)

			if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
				// Si existe, poner como controlador
				$this->controladorActual = ucwords($url[0]);

				unset($url[0]);
			}

			require_once '../app/controllers/' . $this->controladorActual . '.php';

			$this->controladorActual = new $this->controladorActual;

			// Mira la segunda parte de la URL
			if(isset($url[1])){
				// Mira si el metodo existe
				if(method_exists($this->controladorActual, $url[1])){
					$this->metodoActual = $url[1];
					unset($url[1]);
				}
			}

			// Obtener parametros de la URL
			$this->params = $url ? array_values($url) : [];

			call_user_func_array([$this->controladorActual, $this->metodoActual], $this->params);
		}

		public function getUrl(){
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}