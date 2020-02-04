<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once 'assets/vendors/TCPDF/tcpdf.php';
	class PdfLib extends TCPDF{

		function __construct(){
			parent::__construct();
		}

		// Page footer
	    function Footer() {
	        $this->writeHTML('
	        	<h5 style="text-align:right;">By : <a href="">http://ahyaniayas.my.id</a></h5>
	        	');
	    }

	}
?>