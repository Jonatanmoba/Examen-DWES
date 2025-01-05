<?php
class IndexController
{
	private $view;
	function __construct()
	{
		//Creamos una instancia de nuestro mini motor de plantillas
		$this->view = new View();
	}

	public function inicio(){
	
	
		
	$this->view->show("inicioView.php", array("errores" => array()));
		





	}
	public function consultaReservas()
	{


		//Incluye el modelo que corresponde
		require 'models/UsuarioModel.php';
		require 'models/ReservaModel.php';
		


		if (isset($_SESSION['logueado']))
			session_unset();

		$errores = array();
		if (isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "Aceptar") {

			if (!isset($_REQUEST['nif']) || empty($_REQUEST['nif'])) 
				$errores['nif'] = "*Error NIF";

			if (!isset($_REQUEST['telefono']) || empty($_REQUEST['telefono'])) {
					$errores['telefono'] = "*Error Teléfono";
				} elseif (!preg_match('/^\d{9}$/', $_REQUEST['telefono'])) { // Verifica que sea un teléfono de 9 dígitos
					$errores['telefono'] = "*Teléfono no válido";
				}
			

			

			if (empty($errores)) {
				$item = new ReservaModel();
				$citas = $item->getReservasUsuario($_REQUEST["nif"], $_REQUEST["telefono"]);
				if ($citas) {
					$this->view->show("consultasUsuariosView.php", array("citas" => $citas));

				} else {
					$this->view->show("consultasUsuariosView2.php", array());
				}
			}
		}

		$this->view->show("consultaView.php", array("errores" => $errores));
	}
	public function listarCitas(){
		require 'models/CitasModel.php';
		$citas  = new CitasModel();
		$todas= $citas->getAll();
		$this->view->show("CitasView.php", ['citas' => $todas]);
	}
	public function editarCitas() {
		require 'models/UsuarioModel.php';
		require 'models/CitasModel.php';
	
		$errores = array();
		$codigocita = $_REQUEST['codigo'];
	
		$item = new CitasModel();
		$cita = $item->getByCita($codigocita);
	
		$usuario = new UsuarioModel();
	
		if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'aceptar') {
			// Validación del DNI
			if (!isset($_REQUEST['dni']) || empty($_REQUEST['dni'])) {
				$errores['dni'] = "*Error DNI";
			}
	
			// Validación del nombre
			if (!isset($_REQUEST['nombre']) || empty($_REQUEST['nombre'])) {
				$errores['nombre'] = "*Error Nombre";
			}
	
			// Validación de los apellidos
			if (!isset($_REQUEST['apellidos']) || empty($_REQUEST['apellidos'])) {
				$errores['apellidos'] = "*Error Apellidos";
			}
	
			// Validación del teléfono
			if (!isset($_REQUEST['telefono']) || empty($_REQUEST['telefono'])) {
				$errores['telefono'] = "*Error Teléfono";
			} elseif (!preg_match('/^\d{9}$/', $_REQUEST['telefono'])) {
				$errores['telefono'] = "*Teléfono no válido";
			}
	
			// Validación del email
			if (!isset($_REQUEST['email']) || empty($_REQUEST['email'])) {
				$errores['email'] = "*Error Email";
			}
	
			// Si no hay errores, guarda los datos
			if (empty($errores)) {
				$usuario->setDni($_REQUEST['dni']);
				$usuario->setNombre($_REQUEST['nombre']);
				$usuario->setApellidos($_REQUEST['apellidos']);
				$usuario->setTelefono($_REQUEST['telefono']);
				$usuario->setEmail($_REQUEST['email']);
				$usuario->save();
				header("Location: index.php?controlador=index&accion=inicio");
			} else {
				$this->view->show("editarView.php", array("cita" => $cita, "errores" => $errores));
			}
		}
		elseif (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'cancelar') {
			header("Location: index.php?controlador=index&accion=inicio");
		}
	
		$this->view->show("editarView.php", array("cita" => $cita, "errores" => $errores));
	}
	
	


	
	

			
		}

	



 

 




 


