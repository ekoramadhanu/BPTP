<?php
    defined('BASEPATH') OR exit('No direct script access allowed');        

    require_once('dompdf/autoload.inc.php');
    use Dompdf\Dompdf;
    
    class mypdf{        

        protected $ci;

        public function __construct(){   
                     
            $this->ci =& get_instance();    
        }
        
        public function generatePDF($view,$data=array(),$filename= 'Rekap',$size ='A4',$orientaton ='potrait'){
            $dompdf= new Dompdf();            
            $dompdf->loadHtml($view);
            $dompdf->setPaper($size, $orientaton);            
            $dompdf->render();
            $dompdf->stream($filename.".pdf",array("Attachment" => false));            
        }
    }
    
?>