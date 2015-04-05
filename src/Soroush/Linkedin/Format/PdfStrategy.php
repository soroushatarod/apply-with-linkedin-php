<?php
/**
 * This class handles the generation of pdfs
 *
 * @author Soroush Atarod <soroush.atarod@outlook.com>
 */
namespace Soroush\Linkedin\Format;


class PdfStrategy implements InterfaceFormats
{
    /**
     * @var string the PDF template style
     */
    protected $template = 'template-1.php';

    /**
     * @var \HTML2PDF
     */
    protected $html2pdf;

    public function __construct()
    {
        $this->html2pdf = new \HTML2PDF('P', 'A4', 'fr');
        $this->html2pdf->setDefaultFont('Arial');
    }

    /**
     * Converts the linkedin data into pdf
     *
     * @param $data Linkekin data
     * @return PdfStrategy
     * @throws \Exception
     */
    public function get($data)
    {
        $vars = array('profile'=>$data);
        extract($vars);
        ob_start();
        $layout = self::getTemplate();
        if (!include('PdfTemplates/' . $layout)) {
            throw new \Exception('Template not found');
        }
        $content = ob_get_clean();
        $this->html2pdf->writeHTML($content, isset($_GET['vuehtml']));
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

    /**
     * Displays the pdf on browser
     * @throws \HTML2PDF_exception
     */
    public function outputHtml()
    {
        echo $this->html2pdf->Output('linkedin-application.pdf');
    }

    /**
     * Saves the pdf
     *
     * @param $name  Name of the file with location to save the pdf
     * @throws \HTML2PDF_exception
     */
    public function outputFile($name)
    {
        $this->html2pdf->Output($name, 'F');
    }



}