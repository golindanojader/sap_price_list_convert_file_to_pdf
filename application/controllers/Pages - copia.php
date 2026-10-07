<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){


		$Page = "pdfDownload";

        $this->load->library('pdf'); 
        $html = $this->load->view('pages/'.$Page,[], true); 
        $this->pdf->createPDF($html, 'Lista_de_Precios_Wp.pdf'); 


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