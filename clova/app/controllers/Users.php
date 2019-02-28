<?php

	class Users extends Controller{
		public function __construct(){
			$this->userModel = $this->model('User');
		}

		public function register(){
			// Checkea el POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$data = [
					 	'nombre' => trim($_POST['nombre']),
						'apellidos' => trim($_POST['apellidos']),
						'email' => trim($_POST['email']),
						'contrasena' => trim($_POST['contrasena']),
						'confirm_contrasena' => trim($_POST['confirm_contrasena']),
						'nombre_error' => '',
						'apellidos_error' => '',
						'email_error' => '',
						'contrasena_error' => '',
						'confirm_contrasena_error' => ''
					];

					//Validaciones
					if(empty($data['email'])){
						$data['email_error'] = "Por favor, introduzca el email.";
					} else {
						// Checkea el email
						if($this->userModel->findUserByEmail($data['email'])){
						$data['email_error'] = "Ya existe una cuenta con este email";
						}
					}

					if(empty($data['nombre'])){
						$data['nombre_error'] = "Por favor, introduzca el nombre .";
					}

					if(empty($data['apellidos'])){
						$data['apellidos_error'] = "Por favor, introduzca los apellidos.";
					}

					if(empty($data['contrasena'])){
						$data['contrasena_error'] = "Por favor, introduzca la contraseña.";
					}

					if(empty($data['confirm_contrasena'])){
						$data['confirm_contrasena_error'] = "Por favor, vuelva a introducir la contraseña.";
					} else {
						if($data['contrasena'] != $data['confirm_contrasena']){
							$data['confirm_contrasena_error'] = "Las contraseñas no coinciden.";
						}
					}

					if(
						empty($data['email_error']) && empty($data['nombre_error']) && empty($data['apellidos_error']) && empty($data['contrasena_error']) && empty($data['confirm_contrasena_error'])) 
					{

						$data['contrasena'] = password_hash($data['contrasena'], PASSWORD_DEFAULT);

						// Registro
						if($this->userModel->register($data)){
							flash('register_success', 'Registrado con exito, puedes iniciar sesión.');
							header('Location: http://localhost/clova/users/login');
						} else {
							die('algo falló weo');
						}

					} else {
						$this->view('users/register', $data);
					}


			} else {
				$data = [
					'nombre' => '',
					'apellidos' => '',
					'email' => '',
					'contrasena' => '',
					'confirm_contrasena' => '',
					'nombre_error' => '',
					'apellidos_error' => '',
					'email_error' => '',
					'contrasena_error' => '',
					'confirm_contrasena_error' => ''

				];

				$this->view('users/register', $data);
			}
		}

		public function login(){
			// Checkea el POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$data = [
					'email' => trim($_POST['email']),
					'contrasena' => trim($_POST['contrasena']),
					'email_error' => '',
					'contrasena_error' => '',
				];

				if(empty($data['email'])){
					$data['email_error'] = "Por favor, introduzca el email.";
				}
				if(empty($data['contrasena'])){
					$data['contrasena_error'] = "Por favor, introduzca la contraseña.";
				}

				if($this->userModel->findUserByEmail($data['email'])){
					// Se ha encontrado el usuario
				}else{
					//No se ha encontrado el usuario por lo que... salta el error
					$data['email_error'] = 'Esta cuenta no existe.';
				}

				if(empty($data['email_error']) && empty($data['contrasena_error'])){
					$logged = $this->userModel->login($data['email'], $data['contrasena']);

					if($logged){
						// Crea sesión
						$this->createSession($logged);
					} else {
						$data['contrasena_error'] = 'Contraseña incorrecta.';
						$this->view('/users/login', $data);
					}


				} else {
					$this->view('users/login', $data);
				  }



			} else {
				$data = [
					'email' => '',
					'contrasena' => '',
					'email_error' => '',
					'contrasena_error' => '',
				];

				$this->view('users/login', $data);
			}
		}

		// Este user viene del modelo, ($row)
		public function createSession($user){
			$_SESSION['user_id'] = $user->id_guia;
			header('Location: http://localhost/clova/travels');

		}

		public function logout(){
			unset($_SESSION['user_id']);
			session_destroy();
			header('Location: http://localhost/clova/index');
		}

		public function isLogged(){
			if(isset($_SESSION['user_id'])){
				return true;
			} else {
				return false;
			}
		}
	}