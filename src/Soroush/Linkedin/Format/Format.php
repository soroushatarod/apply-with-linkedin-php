<?php

namespace Soroush\Linkedin\Format;


class Format
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }


    public function asPdf($fileName, $template = null, $outputHtml = false)
    {
        $pdf = new PdfStrategy();
        $fileName .= '.pdf';
        if (isset($template)) {
            $pdf->setTemplate($template);
        }

        $pdf->get($this->data);

        if ($outputHtml) {
            $pdf->outputHtml();
        } else {
            $pdf->outputFile($fileName);
        }

        return true;
    }

    /**
     * Get the linkedin application as JSON
     */
    public function asJson()
    {

    }

    /**
     * Get the linkedin application as XML
     */
    public function asXml()
    {

    }

}