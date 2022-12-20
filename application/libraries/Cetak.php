<?php 

class Cetak {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function formLuring($konten,$filename,$data) {
		require_once 'vendor/autoload.php';		

		$mpdf = new \Mpdf\Mpdf([
			    'mode' => 'utf-8',
			    'format' => 'A4',
			    'orientation' => 'P',
			    'margin_left' => 20,
		    	'margin_right' => 10,
		    	'margin_top' => 10,
		    	'margin_bottom' => 10,
		    	'default_font_size' => 12,
		    	'default_font' => 'calibri'
			]
		);
		
		$content = $this->ci->load->view($konten,$data, true);
		// test($content);
		$mpdf->WriteHTML($content);
		$mpdf->Output($filename.".pdf","I");
		
	}

	function sertifikat($konten,$filename,$data) {
		require_once 'vendor/autoload.php';		

		$mpdf = new \Mpdf\Mpdf([
			    'mode' => 'utf-8',
			    'format' => [317.5,564.4],
			    'orientation' => 'L',
			    'margin_left' => 45,
		    	'margin_right' => 10,
		    	'margin_top' => 110,
		    	'margin_bottom' => 10,
		    	'default_font_size' => 12,
		    	'default_font' => 'calibri'
			]
		);
		
		$content = $this->ci->load->view($konten,$data, true);
		// test($content);
		$mpdf->WriteHTML($content);
		$mpdf->Output($filename.".pdf","I");
		
	}

	function exportToExcel ($konten,$filename,$data)
	{
		$content = $this->ci->load->view($konten,$data, true);
		// test($content);
		header("Content-Type: application/vnd.ms-excel");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
        header("Content-disposition: attachment; filename=\"".$filename.".xls\"");
		echo $content;
	}



}

?>
