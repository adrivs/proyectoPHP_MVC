<?php

	class Pages extends Controller{
		public function __construct(){
			if(isset($_SESSION['user_id'])){
				header("Location: http://localhost/clova/travels");
			}
		}

		public function index(){
			$data = [
				"title" => "Clover",
				"description" => "¿Estás buscando un guía que te enseñe lo que quieres? <br />
                                Registrate y no tardes en encontrar a tu guía."
			];
			$this->view('pages/index', $data);
		}

		
	}