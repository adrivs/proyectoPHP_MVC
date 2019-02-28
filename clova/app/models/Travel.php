<?php

	class Travel{
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getTravels($id){
			$this->db->query('SELECT * FROM viaje WHERE id_guia = '.$id);
			$this->db->bind(':id_guia', $id);
			$results = $this->db->resultSet();

			return $results;
		}

		public function addTravel($data){
			$this->db->query('INSERT INTO viaje (inicio, final, hora, asistentes, dia, id_guia, descripcion) VALUES (:inicio, :final, :hora, :asistentes, :dia, :id_guia, :descripcion)');
			$this->db->bind(':inicio', $data['inicio']);
			$this->db->bind(':final', $data['final']);
			$this->db->bind(':hora', $data['hora']);
			$this->db->bind(':asistentes', $data['asistentes']);
			$this->db->bind(':dia', $data['dia']);
			$this->db->bind(':id_guia', $data['id_guia']);
			$this->db->bind(':descripcion', $data['descripcion']);


			// Realiza la query
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function getTravelById($id){
			$this->db->query('SELECT * FROM viaje WHERE id_viaje = :id');
			$this->db->bind(':id', $id);

			$row = $this->db->single();
			return $row;
		}

		public function updateTravel($data){
			$this->db->query('UPDATE viaje SET inicio = :inicio, final = :final, hora = :hora, asistentes = :asistentes, dia = :dia, descripcion = :descripcion WHERE id_viaje = :id_viaje');
			$this->db->bind(':id_viaje', $data['id_viaje']);
			$this->db->bind(':inicio', $data['inicio']);
			$this->db->bind(':final', $data['final']);
			$this->db->bind(':hora', $data['hora']);
			$this->db->bind(':asistentes', $data['asistentes']);
			$this->db->bind(':dia', $data['dia']);
			$this->db->bind(':descripcion', $data['descripcion']);


			// Realiza la query
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function deleteTravel($id){
			$this->db->query('DELETE FROM viaje WHERE id_viaje = :id_viaje');
			$this->db->bind(':id_viaje', $id);
			
			// Realiza la query
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}
	}