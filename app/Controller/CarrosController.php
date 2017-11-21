<?php
App::uses('AppController', 'Controller');

class CarrosController extends AppController {


	public $components = array('Flash', 'Session');
	

//=========================================================================


	public function index()
	{
		$carros = $this->Carro->find("all");

		$this->set("carros", $carros);
	}
	

//=========================================================================


	public function eliminar()
	{
		$this->layout='ajax';

		$carros = $this->Carro->find("all");

		foreach ($carros as $key => $carro)
		{
			$this->Carro->delete($carro["Carro"]["id"]);
		}
	}
	

//=========================================================================


	public function reescribir()
	{
		$this->layout='ajax';

		if ($this->request->is('post'))
		{
			$carros = $this->Carro->find("all");

			foreach ($carros as $key => $carro)
			{
				$this->Carro->delete($carro["Carro"]["id"]);
			}

			//Llama al codigo necesario
			include(WWW_ROOT.'/php/dom.php');

			//Inicializa objetos
			$html = new simple_html_dom();
			$carros = array(
				"fotos" => array(),
				"precios" => array(),
				"nombres" => array(),
				"anio" => array(),
				"transmision" => array(),
				"color" => array(),
				"puertas" => array(),
			);

			//Se especifica URL del DOM
			$html->load_file('http://www.avisosdeocasion.com/vehiculos-usados-y-nuevos.aspx?n=autos-chevrolet-usados-y-nuevos-nuevo-leon&PlazaBusqueda=2&Plaza=2&pagina=3&idvehiculo=1&Marcas=11');

			//Obtiene URL de las fotos
			foreach($html->find('img.imgfotoaviso') as $key =>$value)
			{
				array_push($carros["fotos"], trim($value->src));
			}

			//Obtiene precios y nombres
			foreach($html->find('a.tituloresult') as $key =>$value)
			{	
				if ($key % 2 == 0)
					array_push($carros["precios"], substr(trim($value->plaintext), 0, -2));
				else
					array_push($carros["nombres"], trim($value->plaintext));
			}

			//Obtiene año, transmision, color y numero de puertas
			$ref = 1;
			foreach($html->find('h3.ar12gris') as $key =>$value)
			{
				switch ($ref)
				{
					case 1:
						array_push($carros["anio"], trim($value->plaintext));
						$ref = 2;
						break;
					case 2:
						array_push($carros["transmision"], trim($value->plaintext));
						$ref = 3;
						break;
					case 3:
						array_push($carros["color"], trim($value->plaintext));
						$ref = 4;
						break;
					case 4:
						array_push($carros["puertas"], trim($value->plaintext));
						$ref = 1;
						break;
				}
			}

			//Guarda en la BDD
			foreach ($carros["fotos"] as $key => $value)
			{
				$datos["foto"] = $carros["fotos"][$key];
				$datos["precio"] = $carros["precios"][$key];
				$datos["nombre"] = $carros["nombres"][$key];
				$datos["anio"] = $carros["anio"][$key];
				$datos["transmision"] = $carros["transmision"][$key];
				$datos["color"] = $carros["color"][$key];
				$datos["puertas"] = $carros["puertas"][$key];
				
				$this->Carro->create();
				$this->Carro->save($datos);
			}
		}

		$carros = $this->Carro->find("all");

		$this->set("carros", $carros);
	}

}
