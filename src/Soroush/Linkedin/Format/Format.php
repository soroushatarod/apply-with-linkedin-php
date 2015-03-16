<?php

namespace Soroush\Linkedin\Format;


class Format
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function asPdf($template = null)
    {
        $pdf = new PdfStrategy();
        if (!is_null($template)) {
            $pdf->setTemplate($template);
        }
        $pdf->get($this->data);
        return $pdf;
    }

    public function asJson()
    {

    }

    public function asXml()
    {

    }
}