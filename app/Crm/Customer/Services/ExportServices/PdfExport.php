<?php

Namespace Crm\Customer\Services\ExportServices;
use Crm\base\interfaces\ExportRepositoryInterface;
class PdfExport implements ExportRepositoryInterface{
    public function export(array $data){
        dd("pdf format");
    }
}