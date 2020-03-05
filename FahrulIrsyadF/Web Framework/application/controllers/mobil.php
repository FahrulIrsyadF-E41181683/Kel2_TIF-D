<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {
	
	public function warna(){		
		echo "Mobil itu berwarna " . $this->uri->segment('3');
		
	}

}