<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @packge        CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author        Ardianta Pargo
 * @license        MIT License
 * @link        https://github.com/ardianta/codeigniter-dompdf
 * 
 */
require_once("./application/third_party/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class pdf {

    public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
    {
      $dompdf = new DOMPDF();
      $dompdf = new Dompdf(array('enable_remote' => true));
      $dompdf->loadHtml($html);
      $dompdf->setPaper($paper, $orientation);
      $dompdf->render();
      if ($stream) {
          $dompdf->stream($filename.".pdf", array("Attachment" => 0));
      } else {
          return $dompdf->output();
      }
    }
  }