<?php

namespace Soroush\Linkedin\Format;


class Format
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }


    /**
     * Download or Display members application as PDF
     *
     * @param string $fileName The pdf filename, if not given, it will be members first name and last name
     * @param string $template  Template to use, if not given will use frameworks template
     * @param bool   $outputHtml    TRUE will display PDF in browser, FALSE will save PDF
     * @return bool
     *
     * @throws \Exception
     */
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

}