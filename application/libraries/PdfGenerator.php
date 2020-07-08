<?php
// defined('BASEPATH') or exit('No direct script access allowed');

// require_once("./application/third_party/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

class Pdfgenerator extends Dompdf
{


    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }

    protected function ci()
    {
        return get_instance();
    }

    public function load_view($view)
    {
        $html = $this->ci()->load->view($view, TRUE);
        $this->load_html($html);
        // Render the PDF
        $this->render();
        // Output the generated PDF to Browser
        $this->stream($this->filename);
    }
}
