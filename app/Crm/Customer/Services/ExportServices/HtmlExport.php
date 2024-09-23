<?php

Namespace Crm\Customer\Services\ExportServices;
use Crm\base\interfaces\ExportRepositoryInterface;
class HtmlExport implements ExportRepositoryInterface{
    public function export(array $data){
        dd("html format");
    }
}