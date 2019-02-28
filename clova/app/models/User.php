<?php
	
	class User{
		private $db;

		public function __construct(){
			$this->db = new Database;
		}


		public function register($data){
			$this->db->query('INSERT INTO guia (nombre, apellidos, email, contrasena) VALUES (:nombre, :apellidos, :email, :contrasena)');
			$this->db->bind(':nombre', $data['nombre']);
			$this->db->bind(':apellidos', $data['apellidos']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':contrasena', $data['contrasena']);

			// Realiza la query
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function login($email, $contrasena){
			$this->db->query('SELECT * FROM guia WHERE email = :email');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			$hashed_contrasena = $row->contrasena;
			//Checkea si la contraseña pasada y la que ya está en la base de datos coinciden.
			if(password_verify($contrasena, $hashed_contrasena)){
				return $row;
			} else {
				return false;
			}
		}


		public function findUserByEmail($email){
			$this->db->query('SELECT * FROM guia WHERE email = :email');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			if($this->db->rowCount() > 0){
				return true;
			} else {
				return false;
			}
		}
	}