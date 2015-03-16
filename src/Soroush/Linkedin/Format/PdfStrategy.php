<?php

namespace Soroush\Linkedin\Format;


class PdfStrategy implements InterfaceFormats
{
    /**
     * @var string the PDF template style
     */
    protected $template = 'template-1.php';

    public function get($data)
    {
        $vars = array();
        $vars = (array)$data;
        extract($vars);
        ob_start();
        $layout = self::getTemplate();
        if (!include('PdfTemplates/' . $layout)) {
            throw new \Exception('Template not found');
        }
        $content = ob_get_clean();
        $html2pdf = new \HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('linkedin-application.pdf');
        die();
    }


    /**
     * Gets the current template
     *
     * @return string The template variation to use
     */
    protected function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set the template to be used
     *
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}