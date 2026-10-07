<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		
	}

	public function index(){	
	$this->load->library('pdf');
	$folderPath = 'pdf/';
	$path = FCPATH . $folderPath;
		ini_set('memory_limit', '1024M');
		set_time_limit(0);
	//  generar un array con los elementos de la carpeta sap_import
		$elements = glob('C:/laragon/www/SAP_LISTA_PRECIOS_SCRIPT/sap_import/*');
		// contar el numero de elementos encontrados
		$count = count($elements);
		$Page = "pdfDownload";



		for ($i=0; $i < $count; $i++) { 



				 $elements[$i] = str_replace('C:/laragon/www/SAP_LISTA_PRECIOS_SCRIPT/sap_import/', '', $elements[$i]);
			     $data['elements'] = $elements[$i];
				 $html = $this->load->view('pages/'.$Page, $data, true);
				
				// // Definimos la ruta donde se guardará (ej: en la raíz o una carpeta 'pdfs/')
				 $nombreArchivo = $path . $elements[$i] . '.pdf';
				// // El tercer parámetro NULL evita que la librería haga el stream() y detenga el bucle
				//reemplazar .XML
				$nombreArchivo = str_replace('.XML', '', $nombreArchivo); 
				$this->pdf->createPDF($html, $nombreArchivo, NULL);

				echo "Archivo procesado: " . $elements[$i] . "<br>";


		
			// $route = 'C:/laragon/www/sap_generator_img/materiales';
		
			// $elements[$i] = str_replace('C:/laragon/www/SAP_LISTA_PRECIOS_SCRIPT/sap_import/', '', $elements[$i]);
			

			// $this->load->library('pdf'); 
			// // Por esto (pasando un array con la llave 'elements'):
			// $html = $this->load->view('pages/'.$Page, array('elements' => $elements[$i]), true);
			// //  $html = $this->load->view('pages/'.$Page,[$elements[$i]], true); 
			// $this->pdf->createPDF($html,'ListPrecio_'.$i.'.pdf', null); 	

				// Crear la carpeta materiales si no existe

		
		}







//  //Borramos la carpeta 		
// 		if(file_exists($route)){
// 			rmdir($route);
// 		}
       

// NO BORRAR-------------------------------------------------------------------
		// $Page = "index";
		// if (!file_exists(APPPATH.'views/pages/'.$Page.'.php')) {show_404();}
		
		// $this->load->view('pages/'.$Page);
//--------------------------------------------------------------------------------- 
	}

// NO BORRAR-------------------------------------------------------------------

    // public function pdfCreate() 
    // { 
    // 	$Page = "pdfDownload";

    //     $this->load->library('pdf'); 
    //     $html = $this->load->view('pages/'.$Page,[], true); 
    //     $this->pdf->createPDF($html, 'Lista_de_Precios_Wp.pdf'); 
    // } 

//--------------------------------------------------------------------------------- 
}


?>