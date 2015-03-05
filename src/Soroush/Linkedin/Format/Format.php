<?php

namespace Soroush\Linkedin\Format;


class Format
{
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function asPdf()
    {
        $pdf = new PdfStrategy();
        $pdf->get($this->data);
    }

    public function asJson()
    {

    }

    public function asXml()
    {

    }
}