<?php


class RestController extends AppController {
    public $uses = array('Carro');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
 
 
    public function index()
    {
    	$carros = $this->Carro->find("all");

        $this->set(array(
            'carros' => $carros,
            '_serialize' => array('carros')
        ));
    }
}

?>