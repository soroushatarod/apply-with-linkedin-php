<?php

namespace Soroush\Linkedin\Format;


class PdfStrategy implements InterfaceFormats
{

    public function get($data)
    {
        $vars= array();
        $vars['firstName']  = 'soroush';
        extract($vars);
        ob_start();
        include('PdfLayout/Member.php');
        $content = ob_get_clean();
        $html2pdf = new \HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('linkedin-application.pdf');
        die();
    }
}