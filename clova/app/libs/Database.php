<?php

	// Clase de la base de datos (PDO)
	// Conexion, prepare, bind y devuelve filas y resultados

	class Database {
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $name = DB_NAME;

		private $dataBaseHandler;
		private $statement;
		private $error;

		public function __construct(){
			$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			//Instancia PDO
			try {
				$this->dataBaseHandler = new PDO($dsn, $this->user, $this->pass, $options);
			} catch(PDOException $e){
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

		// Prepara la sentencia
		public function query($sql){
			$this->statement = $this->dataBaseHandler->prepare($sql);
		}

		// Bindea los valores
		public function bind($param, $value, $type = null){
			if(is_null($type)){
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->statement->bindValue($param, $value, $type);
		}

		// Ejecuta la sentencia ya preparada
		public function execute(){
			return $this->statement->execute();
		}

		// Obtiene el resultado como un array de objetos
		public function resultSet(){
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_OBJ);
		}

		// Obtiene un solo resultado (objeto)
		public function single(){
			$this->execute();
			return $this->statement->fetch(PDO::FETCH_OBJ);
		}

		// Obtiene el numero de rows
		public function rowCount(){
			return $this->statement->rowCount();
		}
	}