<?php

	class Travels extends Controller{

		public function __construct(){
			if(!isset($_SESSION['user_id'])){
				header("Location: http://localhost/clova/users/login");
			}

			$this->travelModel = $this->model('Travel');
		}

		public function index(){
			$travels = $this->travelModel->getTravels($_SESSION['user_id']);
			$data = [
				'travels' => $travels
			];

			$this->view('travels/index', $data);
		}

		public function add(){

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$data = [
				'inicio' => trim($_POST['inicio']),
				'final' => trim($_POST['final']),
				'hora' => trim($_POST['hora']),
				'asistentes' => trim($_POST['asistentes']),
				'dia' => trim($_POST['dia']),
				'id_guia' => trim($_SESSION['user_id']),
				'descripcion' => trim($_POST['descripcion'])
			];

				if($this->travelModel->addTravel($data)){
					flash('travel_added', '¡Viaje añadido!');
					header("Location: http://localhost/clova/travels");
				}
			}

			$data = [
				'inicio' => '',
				'final' => '',
				'hora' => '',
				'asistentes' => '',
				'dia' => '',
				'descripcion' => ''
			];

			$this->view('travels/add', $data);
		}

		public function edit($id){

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$data = [
				'id_viaje' => $id,
				'inicio' => trim($_POST['inicio']),
				'final' => trim($_POST['final']),
				'hora' => trim($_POST['hora']),
				'asistentes' => trim($_POST['asistentes']),
				'dia' => trim($_POST['dia']),
				'id_guia' => trim($_SESSION['user_id']),
				'descripcion' => trim($_POST['descripcion'])
			];

				if($this->travelModel->updateTravel($data)){
					flash('travel_added', '¡Viaje actualizado!');
					header("Location: http://localhost/clova/travels");
				}
			} else {
				$travel = $this->travelModel->getTravelById($id);

				$data = [
					'id_viaje' => $id,
					'inicio' => $travel->inicio,
					'final' => $travel->final,
					'hora' => $travel->hora,
					'asistentes' => $travel->asistentes,
					'dia' => $travel->dia,
					'descripcion' => $travel->descripcion
			];

				$this->view('travels/edit', $data);
			}
		}

		public function delete($id){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if($this->travelModel->deleteTravel($id)){
					flash('travel_message', 'Viaje eliminado');
					header("Location: http://localhost/clova/travels");
				} else {
					die('E R R O R - Contacta con el admin del sitio web.');
				}
			} else{
				header("Location: http://localhost/clova/travels");
			}
		}
	}